<?php

namespace JR\Framework\Application\UI\MenuControl\HeaderControl;

/**
 * Description of IHeaderContent.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface IHeaderContent
{
	/**
	 * @return string|Html
	 */
	function getHtml();
}