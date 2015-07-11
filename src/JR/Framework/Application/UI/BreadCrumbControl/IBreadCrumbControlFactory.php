<?php

namespace JR\Framework\Application\UI\BreadCrumbControl;

/**
 * Description of IBreadCrumbControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IBreadCrumbControlFactory
{
	/**
	 * @return BreadCrumbControl
	 */
	function create();
}