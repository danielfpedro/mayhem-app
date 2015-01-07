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
		// $select = $this->Article
		// 	->select
		// 	->cols(['title', 'text'])
		// 	->where('title = :q')
		// 	->bindValues(['q'=> 'título do post']);

		$data = ['id' => 41, 'title' => 'loren ipdddddadasdsaum', 'text' => 'loren text'];

		$update = $this->Article->update($data);
		echo $update->rowCount();

		// return true;
	}
}

?>