<?php

namespace App\Transformers;

use App\Contracts\TransformerInterface;

class UserTransformer implements TransformerInterface  
{
	public function transform(array $data)
	{
		return [
			'userId'    => (int)$data['id'],
			'firstName' => $data['first_name'],
			'lastName'  => $data['last_name'],
			'email'     => $data['email']
		];
	}
}