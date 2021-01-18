<?php

namespace App\Controllers;

class Download extends BaseController
{

	public function file()
	{
		$path = urldecode($this->request->getVar('name'));
		$filepath = WRITEPATH . 'uploads/' . $path;
		if (!file_exists($filepath)) {
			throw new \Exception("File $filepath does not exist");
		}
		if (!is_readable($filepath)) {
			throw new \Exception("File $filepath is not readable");
		}
		http_response_code(200);

		header('Content-Length: ' . filesize($filepath));
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$fileinfo = pathinfo($filepath);
		header('Content-Type: ' . finfo_file($finfo, $filepath));
		header('fileName: ' . basename($fileinfo['basename']));
		finfo_close($finfo);
		header('Content-Disposition: attachment; filename="' . basename($fileinfo['basename']) . '"'); // feel free to change the suggested filename
		ob_clean();
		flush();
		readfile($filepath);
		//echo 'hello';
	}

	public function image()
	{
		$path = $this->request->getVar('name');
		$filepath = $checkpath = WRITEPATH . 'uploads/' . $path;
		if (!file_exists($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/noimg.jpg';
		}
		if (!is_readable($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/noimg.jpg';
		}
		http_response_code(200);
		header('Content-Length: ' . filesize($filepath));
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$fileinfo = pathinfo($filepath);
		header('Content-Type: ' . finfo_file($finfo, $filepath));
		finfo_close($finfo);
		header('Content-Disposition: attachment; filename="' . basename($fileinfo['basename']) . '"'); // feel free to change the suggested filename
		ob_clean();
		flush();
		readfile($filepath);
	}

	public function avatar()
	{
		$path = $this->request->getVar('name');
		$filepath = $checkpath = WRITEPATH . 'uploads/' . $path;
		if (!file_exists($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/noavt.png';
		}
		if (!is_readable($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/noavt.png';
		}
		http_response_code(200);
		header('Content-Length: ' . filesize($filepath));
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$fileinfo = pathinfo($filepath);
		header('Content-Type: ' . finfo_file($finfo, $filepath));
		finfo_close($finfo);
		header('Content-Disposition: attachment; filename="' . basename($fileinfo['basename']) . '"'); // feel free to change the suggested filename
		ob_clean();
		flush();
		readfile($filepath);
	}

	public function product($pro, $id, $type, $name)
	{

		$filepath = $checkpath = WRITEPATH . 'uploads/' . $pro . '/' . $id . '/' . $type . '/' . $name;
		if (!file_exists($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/img-not-found.png';
		}
		if (!is_readable($checkpath)) {
			$filepath = WRITEPATH . 'uploads/default/img-not-found.png';
		}
		http_response_code(200);
		header('Content-Length: ' . filesize($filepath));
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$fileinfo = pathinfo($filepath);
		header('Content-Type: ' . finfo_file($finfo, $filepath));
		finfo_close($finfo);
		header('Content-Disposition: attachment; filename="' . basename($fileinfo['basename']) . '"'); // feel free to change the suggested filename
		ob_clean();
		flush();
		readfile($filepath);
	}
	//--------------------------------------------------------------------

}