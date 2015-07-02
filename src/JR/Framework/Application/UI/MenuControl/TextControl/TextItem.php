<?php

namespace JR\Framework\Application\UI\MenuControl\TextControl;

use Nette\Utils\Html;
use Nette\Utils\Validators;
use JR\Framework\InvalidArgumentException;
use JR\Framework\Application\UI\MenuControl\BaseItem;

/**
 * Description of TextItem.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class TextItem extends BaseItem
{
	/** @var string|Html */
	private $text;
	
	/**
	 * @param Html $text
	 * @return self
	 * @throws InvalidArgumentException
	 */
	public function setText($text)
	{
		if (!Validators::is($text, 'string')) {
			if (!$text instanceof Html) {
				throw new InvalidArgumentException("Text must be either string or instance of Nette\Utils\Html, '" . gettype($text) . "' given.");
			}
		}
		$this->text = $text;
		return $this;
	}
	
	/**
	 * @return string|Html
	 */
	public function getText()
	{
		return $this->text;
	}
}