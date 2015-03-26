<?php

namespace App\Controller;

use App\Model\Article;

/**
 * Controller for test, dont't care about.
 */
class ArticlesController extends AppController
{

	public function view()
	{
		print_r($this->Request->data());
	}
}

?>