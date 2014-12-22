<?php

namespace JR\Framework\Application\UI;

use Nette,
	Nette\Application,
	Nette\Application\UI\InvalidLinkException,
	Nette\Application\UI\PresenterComponent,
	Nette\Http,
	C4P\Framework\Application\ILinkGenerator,
	C4P\Framework\Application\UI\RequestFactory;

/**
 * Description of LinkGenerator.
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class LinkGenerator extends Nette\Object implements ILinkGenerator
{
	/** @var string */
	const MODE_LINK = 'link',
		  MODE_FORWARD = 'forward';
	
	/** @var Application\IRouter */
	private $router;

	/** @var Http\Url */
	private $refUrl;

	/** @var RequestFactory */
	private $requestFactory;

	/** @var Application\Request */
	private $lastCreatedRequest;

	public function __construct(Application\IRouter $router, Http\Url $refUrl, RequestFactory $requestFactory)
	{
		$this->router = $router;
		$this->refUrl = $refUrl;
		$this->requestFactory = $requestFactory;
	}

	/**
	 * @return Application\Request
	 */
	public function getLastCreatedRequest()
	{
		return $this->lastCreatedRequest;
	}

	/*
	 * @inheritdoc
	 */
	public function link($destination, $args = array())
	{
		if (!is_array($args)) {
			$args = func_get_args();
			array_shift($args);
		}

		return $this->createLink($destination, $args);
	}

	/**
	 * @param string
	 * @param array
	 * @param PresenterComponent
	 * @param string
	 * @param bool
	 * @return string|NULL
	 * @throws InvalidLinkException
	 */
	public function createLink($destination, array $args, PresenterComponent $context = NULL, $mode = self::MODE_LINK, $absoluteUrl = FALSE)
	{
		$this->lastCreatedRequest = NULL;

		// fragment
		$a = strpos($destination, '#');
		if ($a === FALSE) {
			$fragment = '';
		} else {
			$fragment = substr($destination, $a);
			$destination = substr($destination, 0, $a);
		}

		// URL scheme
		$a = strpos($destination, '//');
		if ($a === FALSE) {
			$scheme = FALSE;
		} else {
			$scheme = substr($destination, 0, $a);
			$destination = substr($destination, $a + 2);
		}

		$this->lastCreatedRequest = $this->requestFactory->createRequest($destination, $args, $context, $mode);

		if ($mode === self::MODE_FORWARD || $mode === 'test') {
			return NULL;
		}

		// CONSTRUCT URL
		$url = $this->router->constructUrl($this->lastCreatedRequest, $this->refUrl);
		if ($url === NULL) {
			unset($args[Presenter::ACTION_KEY]);
			$params = urldecode(http_build_query($args, NULL, ', '));
			$presenter = $this->lastCreatedRequest->getPresenterName();
			$requestArgs = $this->lastCreatedRequest->getParameters();
			$action = $requestArgs[Presenter::ACTION_KEY];
			throw new InvalidLinkException("No route for $presenter:$action($params)");
		}
		
		// make URL relative if possible
		if ($mode === self::MODE_LINK && $scheme === FALSE && !$absoluteUrl) {
			$hostUrl = $this->refUrl->getHostUrl();
			if (strncmp($url, $hostUrl, strlen($hostUrl)) === 0) {
				$url = substr($url, strlen($hostUrl));
			}
		}

		return $url . $fragment;
	}
}