<?php

namespace JR\Framework\Application\UI\MenuControl\HeaderControl\HeaderContent;

use Nette\Http\Url;
use Nette\Utils\Html;

/**
 * Description of AnchorImageHeaderContent.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class AnchorImageHeaderContent extends AnchorHeaderContent
{
	/** @var string|Url */
	private $src;
	
	/**
	 * @param string|Url $url
	 * @param string|Url $src
	 * @param array $anchorAttributes
	 */
	public function __construct($url, $src, $anchorAttributes = [])
	{
		$this->src = $src;
		
		parent::__construct($url, $this->createImageHtml(), $anchorAttributes);
	}
	
	/**
	 * @return Html
	 */
	protected function createImageHtml()
	{
		return Html::el('img')->src($this->src);
	}
}