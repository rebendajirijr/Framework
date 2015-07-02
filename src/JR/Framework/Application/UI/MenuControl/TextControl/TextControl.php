<?php

namespace JR\Framework\Application\UI\MenuControl\TextControl;

use JR\Framework\Application\UI\MenuControl\Control;

/**
 * Description of TextControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class TextControl extends Control
{
	/** @var TextItem */
	private $textItem;
	
	/**
	 * @param TextItem $textItem
	 */
	public function __construct(TextItem $textItem)
	{
		parent::__construct();
		
		$this->textItem = $textItem;
	}
	
	/**
	 * @return TextItem
	 */
	public function getTextItem()
	{
		return $this->textItem;
	}
}