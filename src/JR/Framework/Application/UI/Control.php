<?php

namespace JR\Framework\Application\UI;

use Nette\Application\UI\Control as NetteControl;
use Nette\Reflection\ClassType;
use Nette\FileNotFoundException;

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
	 * @throws FileNotFoundException If no appropriate template file not found.
	 */
	protected function getTemplateFile()
	{
		if ($this->templateFile !== NULL) {
			$this->template->setFile($this->templateFile);
			return;
		} else {
			$files = $this->formatTemplateFiles();
			foreach ($files as $file) {
				if (is_file($file)) {
					return $file;
				}
			}
		}
		
		if (!$this->template->getFile()) {
			$declaringClass = $this->getReflection()->getMethod('formatTemplateFiles')->getDeclaringClass();
			throw new FileNotFoundException('Missing template file for ' . get_class($this) . ' component. Check ' . $declaringClass . '::formatTemplateFiles() method to find out possible directories where template file is expected.');
		}
	}
	
	/**
	 * Formats control template file names.
	 * 
	 * @return array
	 */
	protected function formatTemplateFiles()
	{
		$files = [];
		
		$class = $this->getReflection();
		while ($class->isSubclassOf('JR\Framework\Application\UI\Control')) {
			$className = $class->getShortName();	
			$dir = dirname($class->getFileName());
			
			array_push($files, $dir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $className . '.latte');
			
			$class = ClassType::from($class->getParentClass()->getName());
		}
		return $files;
	}
}