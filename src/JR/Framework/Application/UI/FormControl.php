<?php

namespace JR\Framework\Application\UI;

/**
 * FormControl implementation.
 *
 * @author	RebendaJiri
 * @package	JR\Framework
 */
class FormControl extends Control
{
	/** @var IFormFactory */
	private $formFactory;
	
	/**
	 * Sets factory for underlying form.
	 * 
	 * @param IFormFactory $formFactory
	 * @return self
	 */
	public function setFormFactory(IFormFactory $formFactory)
	{
		$this->formFactory = $formFactory;
		return $this;
	}
	
	/**
	 * @return Form
	 */
	public function getForm()
	{
		return $this['form'];
	}
	
	/**
	 * Returns associated factory of underlying form.
	 * 
	 * @return IFormFactory
	 */
	protected function getFormFactory()
	{
		if ($this->formFactory === NULL) {
			$this->formFactory = new FormFactory();
		}
		return $this->formFactory;
	}
	
	/*
	 * @inheritdoc
	 */
	protected function createTemplate()
	{
		$template = parent::createTemplate();
		$template->form = $template->_form = $this->getForm();
		return $template;
	}
	
	/**
	 * Creates underlying form component instance.
	 * 
	 * @return Form
	 */
	protected function createComponentForm($name)
	{
		$form = $this->getFormFactory()->create($this, $name);
		if ($this->getTranslator() !== NULL) {
			$form->setTranslator($this->getTranslator());
		}
		return $form;
	}
}