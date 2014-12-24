<?php

namespace JR\Framework\Application;

/**
 * Description of ILinkGenerator.
 * 
 * @author	RebendaJiri
 * @package JR\Framework
 */
interface ILinkGenerator
{
	/**
	 * Generates link to specified destination using optional arguments.
	 * 
	 * @param string
	 * @param array|mixed
	 * @return string
	 */
	function link($destination, $args = array());
}