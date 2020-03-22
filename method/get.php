<?php 
namespace Routex\method;

use Routex\method\parserTrait;

class get
{	

	use parserTrait;

	public function __construct($rowUrl, $view)
	{
		$this->resolveUrl($rowUrl);
		$this->getView($view);
	}
}