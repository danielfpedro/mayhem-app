<?php

namespace App\Controller;

use App\Model\Article;

/**
 * Controller for test, dont't care about.
 */
class ArticlesController extends AppController
{

	function __construct()
	{
		$this->Article = new Article;
	}

	public function add($id = null){

		return "Estou em " . __FUNCTION__;
	}
	public function view($id = null){
		return "Estou em " . __FUNCTION__;
	}
	public function edit($id = null){
		return "Estou em " . __FUNCTION__;
	}
	public function delete($id = null){
		return "Estou em " . __FUNCTION__;
	}

	public function index()
	{
		$this->Article
			->select
				->cols(['title', 'text']);

		print_r($this->Article->select->__toString());

		$this->Article->newQuery();
		
		$this->Article
			->select
				->cols(['title']);

		print_r($this->Article->select->__toString());

		return [];
	}
}

?>