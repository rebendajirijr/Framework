<?php

namespace JR\Framework\Application\Responses;

use Nette,
	Nette\Application\IResponse,
	Goodby\CSV\Export\Standard\Exporter;

/**
 * CSV response.
 * 
 * @author	RebendaJiri
 * @package	JR\Framework
 * 
 * @property-read string $name
 * @property-read string $contentType
 */
class CsvResponse extends Nette\Object implements IResponse
{
	/** @var string */
	const CHARSET_UTF_8 = 'UTF-8';
	
	/** @var string */
	const CHARSET_WIN_1250 = 'iso-8859-2';
	
	/** @var string */
	const CONTENT_TYPE_TEXT_CSV = 'text/csv';
	
	/** @var Exporter */
	private $exporter;

	/** @var mixed */
	private $data;
	
	/** @var string */
	private $name;

	/** @var string */
	private $charset;

	/** @var string */
	private $contentType;
	
	public function __construct(Exporter $exporter, $data, $name, $charset = self::CHARSET_UTF_8, $contentType = self::CONTENT_TYPE_TEXT_CSV)
	{
		$this->exporter = $exporter;
		$this->data = $data;
		$this->name = $name;
		$this->charset = $charset;
		$this->contentType = $contentType;
	}

	/**
	 * Returns the file name.
	 * 
	 * @return string
	 */
	final public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the MIME content type of a downloadable content.
	 * 
	 * @return string
	 */
	final public function getContentType()
	{
		return $this->contentType;
	}

	/**
	 * Sends response to output.
	 * @return void
	 */
	public function send(Nette\Http\IRequest $httpRequest, Nette\Http\IResponse $httpResponse)
	{
		$httpResponse->setContentType($this->contentType, $this->charset);
		$httpResponse->setHeader('Content-Disposition', 'attachment; filename="' . $this->name . '"');
		
		// MS-Excel UTF-8 byte order mark hack
		if ($this->charset == self::CHARSET_UTF_8) {
			//echo chr(0xEF) . chr(0xBB) . chr(0xBF);
		}
		$this->exporter->export('php://output', $this->data);
	}
}