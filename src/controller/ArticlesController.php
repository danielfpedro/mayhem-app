<?php

namespace App\Controller;

use App\Model\Article;

use Aura\SqlQuery\QueryFactory;
use PDO;

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

		$query = $this->Article->newQuery();
		$query->cols(['title', 'text']);

		$articles = $this->Article->findOne($query);

		print_r($articles);

		return [];
	}
}

?>