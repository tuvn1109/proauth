<?php

namespace App\Controllers\Cpanel;

use App\Models\EmailModel;

class Email extends CpanelController
{
	public function index()
	{
		if (session('user')) {
			//return redirect()->to('/');
			$model = new EmailModel();
			$infoEmail = $model->getInfoEmail();
			$data['title'] = 'Setting Email';
			$data['data'] = $infoEmail;
			$data['temp'] = 'cpanel/email';
			echo view('cpanel/layout', $data);

		} else {
			echo view('signin');
		}
	}

	public function updateemail()
	{
		$model = new EmailModel();
		$id = 1;
		$data = [
			'email' => $this->request->getPost('email'),
			'password' => $this->request->getPost('password'),
			'subject' => $this->request->getPost('subject'),
		];

		$model->update($id, $data);
	}
	//--------------------------------------------------------------------

}
