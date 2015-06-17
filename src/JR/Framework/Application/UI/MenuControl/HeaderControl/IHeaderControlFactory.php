<?php

namespace JR\Framework\Application\UI\MenuControl\HeaderControl;

/**
 * Description of IHeaderControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IHeaderControlFactory
{
	/**
	 * @return HeaderControl
	 */
	function create();
}