<?php

namespace JR\Framework\Application\UI;

use Nette,
	Nette\ComponentModel\IContainer;

/**
 * Description of FormFactory
 *
 * @author	RebendaJiri
 * @package JR\Framework
 */
class FormFactory extends Nette\Object implements IFormFactory
{
	/*
	 * @inheritdoc
	 */
	public function createForm(IContainer $parent = NULL, $name = NULL)
	{
		$form = new Form($parent, $name);
		return $form;
	}
}