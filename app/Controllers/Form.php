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
				//'email' => [
				//	'rules' => 'required|valid_email',
				//	'label' => 'Email address',
				//	'errors' => [
				//		'required' => 'Hey, Email address is a required field',
				//		'valid_email' => 'Oh, man, Pls add a valid email'
				//	]
				//],
				//'password' => 'required|min_length[8]',
				//'category' => 'in_list[Student,Teacher]',
				//'date' => [
				//	'rules' => 'required|check_date',
				//	'label' => 'Date',
				//	'errors' => [
				//		'check_date' => 'You can not add a date before today'
				//	]
				//	],

				'theFile' => [
					'rules' => 'uploaded[theFile.0]|max_size[theFile,1024]',//|ext_in[theFile,jpg]|is_image[theFile]|max_dims[theFile,100,50]
					'label' => 'The File'
				]
			];

			if($this->validate($rules)) {

				//$file = $this->request->getFile('theFile');
				//echo $file->getName();
				//exit();
				//if($file->isValid() && !$file->hasMoved()){
				//	$file->move('./uploads/images','testName.'.$file->getExtension());//$file->getRandomName()
				//}

				$files = $this->request->getFiles();
				foreach($files['theFile'] as $file) {
					if($file->isValid() && !$file->hasMoved()){
						echo $file->getName().'- Real name<br>';
						$file->move('./uploads/images/multiple');
						echo $file->getName().'- New name<br> <hr>';

					}
				}

				exit();
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
