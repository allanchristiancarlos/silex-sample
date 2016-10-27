<?php

namespace App\Controllers;

use Silex\Application;
use App\Contracts\TransformerInterface;

class BaseController 
{
	protected $transformer;

	public function __construct(TransformerInterface $transformer)
	{
		$this->transformer = $transformer;
	}

	public function transform(array $data, TransformerInterface $transformer)
	{
		return $transformer->transform($data);
	}

	public function transformItems(array $items, TransformerInterface $transformer)
	{
		$data = [];

		foreach ($items as $item) {
			$data[] = $transformer->transform($item);
		}

		return $data;
	}
}