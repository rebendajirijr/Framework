<?php

namespace JR\Framework\Application\UI\MenuControl;

use Nette;
use Nette\Utils\Validators;

/**
 * Description of Item.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
abstract class BaseItem extends Nette\Object
{
	/** @var string */
	private $name;
	
	/** @var int */
	private $order = 0;
	
	public function __construct($name)
	{
		$this->setName($name);
	}
	
	/**
	 * @param string $name
	 * @return self
	 */
	public function setName($name)
	{
		Validators::assert($name, 'string');
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @param int $order
	 * @return self
	 */
	public function setOrder($order)
	{
		$this->order = (int) $order;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getOrder()
	{
		return $this->order;
	}
}