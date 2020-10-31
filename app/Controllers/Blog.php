<?php namespace App\Controllers;

use App\Controllers\Admin\Shop as AdminShop;

class Blog extends BaseController
{
	public function index()
	{
		$data = [
			//'meta_title' => 'Codeigniter 4 Blog',
			'title' => 'This is a Blog'
		];

		$posts = ['Tile 1','Tile 2', 'Tile 3'];
		$data['posts'] = $posts;
	
		return view('blog', $data);

	}

	public function post(){
		$data = [
			'meta_title' => 'Codeigniter 4 Post page',
			'title' => 'This is a also Blog'
		];

		return view('single_post',$data);
	}

}
