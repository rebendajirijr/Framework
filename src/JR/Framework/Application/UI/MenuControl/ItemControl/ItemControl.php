<?php

namespace JR\Framework\Application\UI\MenuControl\ItemControl;

use Nette\InvalidStateException;
use Nette\ComponentModel\IComponent;
use JR\Framework\Application\UI\Control;

/**
 * Description of ItemControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class ItemControl extends Control
{
	/** @var Item */
	private $item;
	
	/**
	 * @param Item $item
	 */
	public function __construct(Item $item)
	{
		parent::__construct();
		
		$this->item = $item;
	}
	
	/**
	 * @return Item
	 */
	public function getItem()
	{
		return $this->item;
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