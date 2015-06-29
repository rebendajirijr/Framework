<?php

namespace JR\Framework\Application\UI\MenuControl\ItemControl;

use Nette;
use Nette\Http\Url;
use Nette\Utils\Html;
use Nette\Utils\Validators;
use Nette\InvalidStateException;
use Nette\ComponentModel\IComponent;
use JR\Framework\Application\UI\Control;
use JR\Framework\InvalidArgumentException;

/**
 * Description of ItemControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class ItemControl extends Control
{
	/** @var string|Html */
	private $title;
	
	/** @var string|Url|Html */
	private $link;
	
	/** @var bool */
	private $enabled = TRUE;
	
	/**
	 * @param string|Html $title
	 */
	public function __construct($title, $link, $enabled = TRUE)
	{
		parent::__construct();
		
		$this->setTitle($title);
		$this->setLink($link);
		
		if ($enabled) {
			$this->enable();
		} else {
			$this->disable();
		}
	}
	
	/**
	 * @param string|Html $title
	 * @return self
	 */
	public function setTitle($title)
	{
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
	 * @param string|URL|Html $link
	 * @return self
	 */
	public function setLink($link)
	{
		if (is_string($link)) {
			Validators::assert($link, 'url');
		} else if (!($link instanceof Url || $link instanceof Html)) {
			throw new InvalidArgumentException("Link must be string or instance of Nette\Http\Url or Nette\Utils\Html, instance of '" . gettype($link) . "' given.");
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
	
	/**
	 * @return self
	 */
	public function enable()
	{
		$this->enabled = TRUE;
		return $this;
	}
	
	/**
	 * @return self
	 */
	public function disable()
	{
		$this->enabled = FALSE;
		return $this;
	}
	
	/**
	 * @return bool
	 */
	public function isEnabled()
	{
		return $this->enabled;
	}
	
	/*
	 * @inheritdoc
	 */
	protected function validateChildComponent(IComponent $child)
	{
		parent::validateChildComponent($child);
		
		if (!$child instanceof ItemControl) {
			throw new InvalidStateException('Child must be instance of JR\Framework\Application\UI\MenuControl\ItemControl\ItemControl, instance of ' . get_class($child) . ' given.');
		}
	}
}