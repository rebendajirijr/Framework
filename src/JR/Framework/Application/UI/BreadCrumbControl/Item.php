<?php

namespace JR\Framework\Application\UI\BreadCrumbControl;

use Nette;
use Nette\Http\Url;
use Nette\Utils\AssertionException;
use Nette\Utils\Html;
use Nette\Utils\Validators;
use JR\Framework\InvalidArgumentException;

/**
 * Description of Item.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class Item extends Nette\Object
{
	/** @var string|Html */
	private $title;
	
	/** @var string|Url|Html */
	private $link;
	
	/**
	 * @param string|Html
	 * @param string|Url|Html
	 * @throws InvalidArgumentException
	 */
	public function __construct($title, $link)
	{
		$this->setTitle($title);
		$this->setLink($link);
	}
	
	/**
	 * @param string|Html
	 * @return self
	 * @throws InvalidArgumentException
	 */
	public function setTitle($title)
	{
		if (!is_string($title) && !$title instanceof Html) {
			throw new InvalidArgumentException("Title must be either string or instance of Nette\Utils\Html, '" . gettype($title) . "' given.");
		}
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string|Html
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	/**
	 * @param string|Url|Html
	 * @return self
	 * @throws AssertionException
	 * @throws InvalidArgumentException
	 */
	public function setLink($link)
	{
		if (is_string($link)) {
			Validators::assert($link, 'url');
		} else if (!$link instanceof Url && !$link instanceof Html) {
			throw new InvalidArgumentException("Link must be string or instance of Nette\Utils\Html or Nette\Http\Url, '" . gettype($link) . "' given.");
		}
		$this->link = $link;
		return $this;
	}
	
	/**
	 * @return string|Url|Html
	 */
	public function getLink()
	{
		return $this->link;
	}
}