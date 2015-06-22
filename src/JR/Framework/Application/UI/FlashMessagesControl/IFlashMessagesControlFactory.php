<?php

namespace JR\Framework\Application\UI\FlashMessagesControl;

/**
 * Description of IFlashMessagesControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IFlashMessagesControlFactory
{
	/**
	 * @return FlashMessagesControl
	 */
	function create();
}