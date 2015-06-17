<?php

namespace JR\Framework\Application\UI\MenuControl\HeaderControl\Content;

use Nette;
use Nette\Http\Url;
use Nette\Utils\Html;
use JR\Framework\Application\UI\MenuControl\HeaderControl\IHeaderContent;

/**
 * Description of AnchorHeaderContent.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class AnchorHeaderContent extends Nette\Object implements IHeaderContent
{
	/** @var array */
	public static $defaultAnchorAttributes = [
		'class' => 'navbar-brand',
	];
	
	/** @var string|Url */
	private $url;
	
	/** @var string|Html */
	private $html;
	
	/** @var array */
	private $anchorAttributes = array();
	
	/**
	 * @param string|Url $url
	 * @param string|Html $html
	 */
	public function __construct($url, $html, $anchorAttributes = [])
	{
		$this->setUrl($url);
		$this->setHtml($html);
		$this->setAnchorAttributes($anchorAttributes);
	}
	
	/**
	 * @param string|Url $url
	 * @return self
	 */
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}
	
	/**
	 * @param string|Html $html
	 * @return self
	 */
	public function setHtml($html)
	{
		$this->html = $html;
		return $this;
	}
	
	/**
	 * @param array $anchorAttributes
	 * @return self
	 */
	public function setAnchorAttributes(array $anchorAttributes = [])
	{
		$anchorAttributes = static::$defaultAnchorAttributes + $anchorAttributes;
		$this->anchorAttributes = $anchorAttributes;
		return $this;
	}
	
	/*
	 * @inheritdoc
	 */
	public function getHtml()
	{
		return $this->createHtml();
	}
	
	/**
	 * @return Html
	 */
	protected function createHtml()
	{
		$el = Html::el('a')
			->href($this->url)
			->addAtributes($this->anchorAttributes)
			->setHtml($this->html);
		return $el;
	}
}