<?php

namespace JR\Framework\Application\UI\PaginatorControl;

/**
 * Description of IPaginatorControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IPaginatorControlFactory
{
	/**
	 * @return PaginatorControl
	 */
	function create();
}