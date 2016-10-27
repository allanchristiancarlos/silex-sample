<?php

namespace App\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Transformers\UserTransformer;

class UserController extends BaseController
{
	public function __construct()
	{
		parent::__construct(new UserTransformer());
	}

	public function getAll(Request $request, Application $app)
	{
		$items = $app['db']->fetchAll('SELECT * FROM `users`');

		return $app->json($this->transformItems($items, $this->transformer));
	}	

	public function get($id, Application $app)
	{
		$sql = "SELECT * FROM `users` WHERE id = ? LIMIT 1";
		$stmt = $app['db']->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$item = $stmt->fetch();

		return $app->json($this->transform($item, $this->transformer));
	}

	public function post()
}