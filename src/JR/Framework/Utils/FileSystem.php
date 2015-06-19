<?php

namespace JR\Framework\Utils;

use Nette;
use Nette\DirectoryNotFoundException;
use Nette\Utils\Finder;

/**
 * Description of FileSystem.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class FileSystem extends Nette\Object
{
	/**
	 * @param string $dir
	 * @return array
	 * @throws DirectoryNotFoundException
	 */
	public static function findAllSubdirectories($dir)
	{
		if (!is_dir($dir)) {
			throw new DirectoryNotFoundException("Directory '$dir' not found.");
		}
		return array_keys(iterator_to_array(Finder::findDirectories('*')->in($dir)));
	}
}