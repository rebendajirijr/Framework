<?php

namespace JR\Framework\Application\UI;

use Nette\ComponentModel\IContainer;

/**
 * Declares method for creating form.
 * 
 * @author	RebendaJiri
 * @package JR\Framework
 */
interface IFormFactory
{
	/**
	 * Creates form.
	 * 
	 * @param IContainer $parent
	 * @param string|NULL $name
	 * @return Form
	 */
	function createForm(IContainer $parent = NULL, $name = NULL);
}