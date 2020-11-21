<?php

namespace App\Controllers\Cpanel;

use App\Models\EmailModel;
use App\Models\SettingsModel;

class Email extends CpanelController
{
	public function index()
	{
			//return redirect()->to('/');
			$model = new EmailModel();
			$model_setting = new SettingsModel();
			$list = $model_setting->where('type', 'email')
				->findAll();
			$data['title'] = 'Setting Email';
			$data['menu'] = 'email';
			$data['data'] = $list;
			$data['temp'] = 'cpanel/email/index';
			echo view('cpanel/layout', $data);
	}

	public function updateemail()
	{
		$model_setting = new SettingsModel();
		$list = $model_setting->where('type', 'email')->findAll();
		foreach ($list as $val):
			$postVal = $this->request->getPost($val['filed']);

			$data[] = [
				'filed' => $val['filed'],
				'value' => $postVal,
			];

		endforeach;
		$a = $model_setting->updateBatch($data, 'filed');
		echo "<pre>";
		print_r($a);
		echo "</pre>";

	}
	//--------------------------------------------------------------------

}
