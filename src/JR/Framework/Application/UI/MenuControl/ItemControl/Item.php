<?php

namespace JR\Framework\Application\UI\MenuControl\ItemControl;

use Nette;
use Nette\Http\Url;
use Nette\Utils\Html;
use Nette\Utils\Validators;
use JR\Framework\InvalidArgumentException;
use JR\Framework\Application\UI\MenuControl\BaseItem;

/**
 * Description of Item.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class Item extends BaseItem
{	
	/** @var string|Html */
	private $title;
	
	/** @var string|Url|Html */
	private $link;
	
	/** @var bool */
	private $enabled = TRUE;
	
	/** @var Item[] */
	private $children = [];
	
	public function __construct($name, $title, $link, $enabled = TRUE)
	{
		parent::__construct($name);
		
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
	 * @throws InvalidArgumentException If link is not string or instance of Url or Html.
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
	
	/**
	 * @param Item $item
	 * @return self
	 */
	public function addChild(Item $item)
	{
		$this->children[$item->getName()] = $item;
		return $this;
	}
	
	/**
	 * @return Item[]
	 */
	public function getChildren()
	{
		return $this->children;
	}
}