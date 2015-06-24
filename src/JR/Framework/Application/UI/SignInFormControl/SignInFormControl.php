<?php

namespace JR\Framework\Application\UI\SignInFormControl;

use Nette\Forms\Controls\SubmitButton;
use Nette\Security\IAuthenticator;
use Nette\Security\AuthenticationException;
use JR\Framework\Application\UI\Form;
use JR\Framework\Application\UI\FormControl;

/**
 * Description of SignInFormControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class SignInFormControl extends FormControl
{
	/** @var IAuthenticator */
	private $authenticator;
	
	/**
	 * @param IAuthenticator $authenticator
	 */
	public function __construct(IAuthenticator $authenticator)
	{
		parent::__construct();
		
		$this->authenticator = $authenticator;
	}
	
	/**
	 * @param SubmitButton $submitButton
	 * @return void
	 */
	public function submitSignInClicked(SubmitButton $submitButton)
	{
		$form = $submitButton->getForm();
		$values = $form->getValues();
		
		try {
			$this->authenticator->authenticate([
				'email' => $values->email,
				'password' => $values->password,
			]);
		} catch (AuthenticationException $e) {
			$form->addError('controls.signInFormControl.invalidCredentialsErrorMessage');
			return FALSE;
		}
	}
	
	/*
	 * @inheritdoc
	 */
	protected function createComponentForm($name)
	{
		$form = parent::createComponentForm($name);
		$form->addText('email', 'controls.signInFormControl.email.label', NULL, 255)
			->setRequired('controls.signInFormControl.email.required')
			->addRule(Form::EMAIL, 'controls.signInFormControl.email.invalid');
		$form->addPassword('password', 'controls.signInFormControl.password.label', NULL, 32)
			->setRequired('controls.signInFormControl.password.required');
		$form->addSubmit('submitSignIn', 'controls.signInFormControl.submitSignIn.caption')
			->onClick[] = $this->submitSignInClicked;
		return $form;
	}
}