<?php

namespace App\Controller;

class ArticlesController extends AppController
{
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
	public function index($id = null){
		return ["Estou em " . __FUNCTION__];
	}
}

?>