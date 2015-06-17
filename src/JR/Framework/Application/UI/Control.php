<?php

namespace JR\Framework\Application\UI;

use Nette\Application\UI\Control as NetteControl;

/**
 * Description of Control.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
abstract class Control extends NetteControl
{
	/** @var string */
	private $templateFile;
	
	/**
	 * @param string $templateFile
	 * @return self
	 */
	public function setTemplateFile($templateFile)
	{
		$this->templateFile = $templateFile;
		return $this;
	}
	
	/**
	 * Renders itself.
	 * 
	 * @return void
	 */
	public function render()
	{
		$this->template->setFile($this->getTemplateFile());
		$this->template->render();
	}
	
	/**
	 * Returns template file name.
	 * 
	 * @return string
	 */
	protected function getTemplateFile()
	{
		$className = $this->getReflection()->getName();
		return __DIR__ . '/templates/' . $className . '.latte';
	}
}