<?php 
namespace Routex\method;

use Routex\method\parserTrait;

class post
{	

	use parserTrait;

	public function __construct($rowUrl, $view)
	{
		$this->resolveUrl($rowUrl);
		$this->getView($view);
	}
}