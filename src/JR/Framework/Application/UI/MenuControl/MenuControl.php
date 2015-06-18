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
	
	public function injectHeaderControlFactory(IHeaderControlFactory $headerControlFactory)
	{
		$this->headerControlFactory = $headerControlFactory;
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