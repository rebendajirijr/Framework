<?php

namespace JR\Framework\Application\UI\PaginatorControl;

use Nette\Utils\Paginator;
use JR\Framework\Application\UI\Control;

/**
 * Description of PaginatorControl.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class PaginatorControl extends Control
{
	/**
	 * @persistent
	 * @var int
	 */
	public $page = 1;
	
	/** @var array */
	public $onShowPage;
	
	/** @var Paginator */
	protected $paginator;
	
	/** @var bool */
	private $useAjax = TRUE;
	
	/*
	 * @inheritdoc
	 */
	protected function createTemplate()
	{
		$tpl = parent::createTemplate();
		$tpl->steps = $this->getSteps();
		$tpl->paginator = $this->getPaginator();
		$tpl->useAjax = $this->useAjax;
		return $tpl;
	}
	
	/**
	 * @param int
	 */
	public function handleShowPage($page)
	{
		$this->onShowPage($this, $page);
	}
	
	/**
	 * @return self
	 */
	public function enableAjax()
	{
		$this->useAjax = TRUE;
		return $this;
	}
	
	/**
	 * @return self
	 */
	public function disableAjax()
	{
		$this->useAjax = FALSE;
		return $this;
	}
	
	/**
	 * @return Utils\Paginator
	 */
	public function getPaginator()
	{
		if ($this->paginator === NULL) {
			$this->paginator = new Paginator;
		}
		return $this->paginator;
	}
	
	/**
	 * @return array
	 */
	public function getSteps()
	{
		// Get Nette paginator
		$paginator = $this->getPaginator();
		// Get actual paginator page
		$page = $paginator->page;
		if ($paginator->pageCount < 2) {
			$steps = [$page];
		} else {
			$arr = range(max($paginator->firstPage, $page - 3), min($paginator->lastPage, $page + 3));
			$count = 4;
			$quotient = ($paginator->pageCount - 1) / $count;
			for ($i = 0; $i <= $count; $i++) {
				$arr[] = round($quotient * $i) + $paginator->firstPage;
			}
			sort($arr);
			$steps = array_values(array_unique($arr));
		}
		return $steps;
	}
	
	/*
	 * @inheritdoc
	 */
	public function loadState(array $params)
	{
		parent::loadState($params);
		$this->getPaginator()->page = $this->page;
	}
}