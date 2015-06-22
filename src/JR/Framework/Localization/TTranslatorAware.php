<?php

namespace JR\Framework\Localization;

use Nette\Localization\ITranslator;

/**
 * Description of TTranslatorAware.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
trait TTranslatorAware
{
	/** @var ITranslator */
	private $translator;
	
	/**
	 * @param ITranslator $translator
	 * @return void
	 */
	public function injectTranslator(ITranslator $translator)
	{
		$this->translator = $translator;
	}
	
	/**
	 * @return ITranslator
	 */
	public function getTranslator()
	{
		return $this->translator;
	}
}