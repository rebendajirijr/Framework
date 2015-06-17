<?php

namespace JR\Framework\Application\UI\MenuControl;

use JR\Framework\Application\UI\Control;
use JR\Framework\Application\UI\MenuControl\HeaderControl;
use JR\Framework\Application\UI\MenuControl\HeaderControl\IHeaderControlFactory;

/**
 * Description of MenuControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class MenuControl extends Control
{
	/** @var IHeaderControlFactory */
	private $headerControlFactory;
	
	/**
	 * @param Item[] $items
	 */	
	public function __construct(array $items = array())
	{
		parent::__construct();
		
		$this->items = $items;
	}
	
	public function setHeaderControlFactory(IHeaderControlFactory $headerControlFactory)
	{
		$this->headerControlFactory = $headerControlFactory;
	}
	
	public function setItemControlFactory(IItemControlFactory $itemControlFactory)
	{
		$this->itemControlFactory = $itemControlFactory;
	}
	
	/**
	 * @param bool $recursive
	 * @return ItemControl
	 */
	public function getItems($recursive = FALSE)
	{
		return $this->getComponents($recursive, 'JR\Framework\Application\UI\MenuControl\ItemControl\ItemControl');
	}
	
	/**
	 * @return IHeaderControlFactory
	 */
	protected function getHeaderControlFactory()
	{
		return $this->headerControlFactory;
	}
	
	/**
	 * @param string $name
	 * @return HeaderControl
	 */
	protected function createComponentHeaderControl($name)
	{
		return $this->getHeaderControlFactory()->create();
	}
}