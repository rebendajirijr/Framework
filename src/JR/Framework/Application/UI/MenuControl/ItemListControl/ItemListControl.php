<?php

namespace JR\Framework\Application\UI\MenuControl\ItemListControl;

use JR\Framework\Application\UI\MenuControl\Control;
use JR\Framework\Application\UI\MenuControl\ItemControl\ItemControl;

/**
 * Description of ItemListControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class ItemListControl extends Control
{
	/**
	 * @param bool $recursive
	 * @return ItemControl[]
	 */
	public function getItemControls($recursive = FALSE)
	{
		return $this->getComponents($recursive, 'JR\Framework\Application\UI\MenuControl\ItemControl\ItemControl');
	}
	
	// TODO: validate child components
}