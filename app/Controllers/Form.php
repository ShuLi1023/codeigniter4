<?php namespace App\Controllers;

use CodeIgniter\Validation\Rules;

class Form extends BaseController
{
	public function index()
	{
		helper(['form']);

		$data = [];
		$data['categories'] = [
			'Student',
			'Teacher',
			'Principle'
		];

		
		if($this->request->getMethod() == 'post') {
			$rules = [
				'email' => [
					'rules' => 'required|valid_email',
					'label' => 'Email address',
					'errors' => [
						'required' => 'Hey, Email address is a required field',
						'valid_email' => 'Oh, man, Pls add a valid email'
					]
				],
				'password' => 'required|min_length[8]',
				'category' => 'in_list[Student,Teacher]',
				'date' => [
					'rules' => 'required|check_date',
					'label' => 'Date',
					'errors' => [
						'check_date' => 'You can not add a date before today'
					]
				]
			];

			if($this->validate($rules)) {
				//Then do database insertion
				//login user
				return redirect()->to('/form/success');
			}else{
				$data['validation'] = $this -> validator;
			}
	
		}

		//if($_POST){
		//	echo '<pre>';
		//	 print_r($_POST);
		//	echo '<pre>';
		//}

		return view('form',$data);
	}

	function success(){
		return 'Hey, You have passed the validation. Congrats';
	}


}
