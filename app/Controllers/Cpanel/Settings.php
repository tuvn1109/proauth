<?php

namespace App\Controllers\Cpanel;

use App\Models\CategoryModel;
use App\Models\EmailModel;
use App\Models\SettingsModel;

class Settings extends CpanelController
{
	public function index()
	{
		if (session('user')) {
			//return redirect()->to('/');
			$model = new EmailModel();
			$model_setting = new SettingsModel();
			$list = $model_setting->where('type', 'homepage')
				->findAll();
			$data['title'] = 'Setting Email';
			$data['data'] = $list;
			$data['menu'] = 'homesetting';
			$data['temp'] = 'cpanel/settings/home';
			echo view('cpanel/layout', $data);

		} else {
			echo view('signin');
		}
	}

	public function home()
	{
		$modelSetting = new SettingsModel();
		$modelCategory = new CategoryModel();
		$list = $modelSetting->where('type', 'homepage')
			->findAll();
		$listCategory = $modelCategory->findAll();


		$data['title'] = 'Home page setting';
		$data['data'] = $list;
		$data['listcategory'] = $listCategory;
		$data['menu'] = 'homesetting';
		$data['temp'] = 'cpanel/settings/home';
		echo view('cpanel/layout', $data);
	}


	public function banner()
	{
		$modelStting = new SettingsModel();

		$banner = $modelStting->where('type', 'bannerads')
			->findAll();
		$data['title'] = 'Banner setting';
		$data['banner'] = $banner;
		$data['menu'] = 'bannersetting';
		$data['temp'] = 'cpanel/settings/banner';
		echo view('cpanel/layout', $data);
	}
	
	public function email()
	{
			//return redirect()->to('/');
			$model_setting = new SettingsModel();
			$list = $model_setting->where('type', 'email')
				->findAll();
			$data['title'] = 'Setting Email';
			$data['menu'] = 'email';
			$data['data'] = $list;
			$data['temp'] = 'cpanel/settings/email';
			echo view('cpanel/layout', $data);
	}


	public function updatehome()
	{
		$modelSetting = new SettingsModel();
		$list = $modelSetting->where('type', 'homepage')->findAll();


		foreach ($list as $val):
			$postVal = $this->request->getPost($val['filed']);
			$image = $this->request->getFile($val['filed']);


			if (gettype($image) == 'object') {
				// echo $val['filed'] . "---là ảnh " . '<br>';
				if ($image->isValid() && !$image->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/homepage')) {
						mkdir(WRITEPATH . 'uploads/homepage', 0777, TRUE);
					}

					$image->move(WRITEPATH . 'uploads/homepage');


					$data[] = [
						'filed' => $val['filed'],
						'value' => 'homepage/' . $image->getName(),
					];
				}
			} else {
				//	echo $val['filed'] . '-- text' . '<br>';
				if ($val['filed'] == 'section_category1_type') {
					$filter = json_encode($this->request->getPost('section_category1_type'));
					$data[] = [
						'filed' => $val['filed'],
						'value' => $filter,
					];
				}elseif ($val['filed'] == 'section_category2_type') {
					$filter = json_encode($this->request->getPost('section_category2_type'));
					$data[] = [
						'filed' => $val['filed'],
						'value' => $filter,
					];
				} else {
					$data[] = [
						'filed' => $val['filed'],
						'value' => $postVal,
					];

				}
			}
		endforeach;

		$modelSetting->updateBatch($data, 'filed');

	}

	public function updatebanner()
	{
		$modelSetting = new SettingsModel();
		$list = $modelSetting->where('type', 'bannerads')->findAll();
		foreach ($list as $val):
			$postVal = $this->request->getPost($val['filed']);
			$image = $this->request->getFile($val['filed']);
			if (gettype($image) == 'object') {
				// echo $val['filed'] . "---là ảnh " . '<br>';
				if ($image->isValid() && !$image->hasMoved()) {
					//$newName = $img->getRandomName();
					if (!is_dir(WRITEPATH . 'uploads/banner')) {
						mkdir(WRITEPATH . 'uploads/banner', 0777, TRUE);
					}
					$image->move(WRITEPATH . 'uploads/banner');
					$data[] = [
						'filed' => $val['filed'],
						'value' => 'banner/' . $image->getName(),
					];
				}
			} else {
				//	echo $val['filed'] . '-- text' . '<br>';
				$data[] = [
					'filed' => $val['filed'],
					'value' => $postVal,
				];
			}
		endforeach;

		$modelSetting->updateBatch($data, 'filed');

	}

	public function updateemail()
	{
		$modelStting = new SettingsModel();
		$list = $modelStting->where('type', 'email')->findAll();
		foreach ($list as $val):
			$postVal = $this->request->getPost($val['filed']);

			$data[] = [
				'filed' => $val['filed'],
				'value' => $postVal,
			];

		endforeach;
		$a = $modelStting->updateBatch($data, 'filed');

	}


	//--------------------------------------------------------------------

}
