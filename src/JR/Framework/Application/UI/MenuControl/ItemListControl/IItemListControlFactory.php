<?php

namespace JR\Framework\Application\UI\MenuControl\ItemListControl;

/**
 * Description of IItemListControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IItemListControlFactory
{
	/**
	 * @return ItemListControl
	 */
	function create();
}