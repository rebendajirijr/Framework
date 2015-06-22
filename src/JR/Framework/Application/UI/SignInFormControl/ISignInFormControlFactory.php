<?php

namespace JR\Framework\Application\UI\SignInFormControl;

/**
 * Description of ISignInFormControlFactory.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
interface ISignInFormControlFactory
{
	/**
	 * @return SignInFormControl
	 */
	function create();
}