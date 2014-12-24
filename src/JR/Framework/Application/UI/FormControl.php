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
	
	/**
	 * Creates underlying form component instance.
	 * 
	 * @return Form
	 */
	protected function createComponentForm($name)
	{
		$form = $this->getFormFactory()->createForm($this, $name);
		if ($this->getTranslator() !== NULL) {
			$form->setTranslator($this->getTranslator());
		}
		return $form;
	}
	
	/*
	 * @inheritdoc
	 */
	public function render()
	{
		$template = $this->template;
		$template->form = $template->_form = $this->getForm();
		return $template->render();
	}
	
	/**
	 * @return Form
	 */
	protected function getForm()
	{
		return $this['form'];
	}
}