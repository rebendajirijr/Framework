<?php

namespace JR\Framework\Application\UI;

use Nette\Application\UI\Presenter as NettePresenter;
use JR\Framework\Localization\TTranslatorAware;

/**
 * Description of Presenter.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
abstract class Presenter extends NettePresenter
{
	use TTranslatorAware;
}