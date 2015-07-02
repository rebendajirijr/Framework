<?php

namespace JR\Framework\Application\UI\MenuControl\ItemControl;

/**
 * Description of IItemControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IItemControlFactory
{
	/**
	 * @param Item $item
	 * @return ItemControl
	 */
	function create(Item $item);
}