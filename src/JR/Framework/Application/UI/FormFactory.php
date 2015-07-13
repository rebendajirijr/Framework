<?php

namespace JR\Framework\Application\UI;

use Nette,
	Nette\ComponentModel\IContainer;

/**
 * Description of FormFactory
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class FormFactory extends Nette\Object implements IFormFactory
{
	/*
	 * @inheritdoc
	 */
	public function create()
	{
		$form = new Form();
		return $form;
	}
}