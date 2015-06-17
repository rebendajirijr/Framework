<?php

namespace JR\Framework\Application\UI\MenuControl\HeaderControl;

use JR\Framework\Application\UI\Control;

/**
 * Description of HeaderControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class HeaderControl extends Control
{
	/** @var IHeaderContent */
	private $headerContent;
	
	/**
	 * @param IHeaderContent $headerContent
	 */
	public function __construct(IHeaderContent $headerContent)
	{
		parent::__construct();
		
		$this->headerContent = $headerContent;
	}
	
	/**
	 * @param IHeaderContent $headerContent
	 * @return void
	 */
	public function setHeaderContent(IHeaderContent $headerContent)
	{
		$this->headerContent = $headerContent;
	}
	
	/*
	 * @inheritdoc
	 */
	protected function createTemplate()
	{
		$tpl = parent::createTemplate();
		$tpl->headerContent = $this->headerContent;
		return $tpl;
	}
}