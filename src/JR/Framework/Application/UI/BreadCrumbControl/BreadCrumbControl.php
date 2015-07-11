<?php

namespace JR\Framework\Application\UI\BreadCrumbControl;

use JR\Framework\Application\UI\Control;

/**
 * Description of BreadCrumbControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class BreadCrumbControl extends Control
{
	/** @var Item[] */
	private $items = [];
	
	public function addItem(Item $item)
	{
		$this->items[] = $item;
	}
	
	public function getItems()
	{
		return $this->items;
	}
}