<?php

namespace JR\Framework\Application\UI\PaginatorControl\DI;

use Nette\DI\CompilerExtension;
use Nette\Utils\Validators;

/**
 * Description of PaginatorControlExtension.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class PaginatorControlExtension extends CompilerExtension
{
	/** @var array */
	public $defaults = [
		'itemsPerPage' => 1,
	];
	
	/*
	 * @inheritdoc
	 */
	public function loadConfiguration()
	{
		$container = $this->getContainerBuilder();
		
		$config = $this->validateConfig($this->defaults);
		
		Validators::assert($config['itemsPerPage'], 'int');
		$itemsPerPage = $config['itemsPerPage'];
		
		$container->addDefinition($this->prefix('paginatorControl'))
			->setImplement('JR\Framework\Application\UI\PaginatorControl\IPaginatorControlFactory')
			->addSetup('?->getPaginator()->itemsPerPage = ?', [
				'@self',
				$itemsPerPage,
			]);
	}
}