<?php

namespace JR\Framework\Model\LeanMapper;

use LeanMapper\Entity as LeanMapperEntity;

/**
 * Description of Entity.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
abstract class Entity extends LeanMapperEntity
{
	/**
	 * @return NULL
	 */
	public function serialize()
	{
		return NULL;
	}
	
	/**
	 * @param string $serialized
	 * @return NULL
	 */
	public function unserialize($serialized)
	{
		return NULL;
	}
	
	/**
	 * Sets trimmed string to NULL if empty.
	 * 
	 * @param string $str
	 * @return string|NULL
	 */
	protected function nullEmptyString($str)
	{
		$str = Strings::trim($str);
		if ($str == '') {
			return NULL;
		}
		return $str;
	}
}