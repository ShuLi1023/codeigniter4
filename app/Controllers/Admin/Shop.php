<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Shop extends BaseController
{
	public function index()
	{
		echo '<h2>This is an Admin shop Area</h2>';
	}

	public function product($type,$product_id)
	{
		echo '<h2>This is a Admin product</h2>';
		//return view('product');
	}


	//--------------------------------------------------------------------

}