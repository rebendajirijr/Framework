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
	 * @return ItemControl
	 */
	function create();
}