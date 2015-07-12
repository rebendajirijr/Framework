<?php

namespace JR\Framework\Application\UI;

use Nette\ComponentModel\IContainer;

/**
 * Declares method for creating form.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IFormFactory
{
	/**
	 * Creates form.
	 * 
	 * @param IContainer
	 * @param string|NULL
	 * @return Form
	 */
	function create(IContainer $parent = NULL, $name = NULL);
}