<?php namespace App\Controllers;

use App\Models\EmailModel;
use App\Models\ForgetpassModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
	private function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}


	public function index()
	{


		if (session('user')) {
			return redirect()->to('/');
		} else {
			$data['temp'] = 'auth/signin/index';
			$data['title'] = 'Signin';
			echo view('auth/signin/index', $data);

		}
	}


	public function forgetPass()
	{
		$model = new EmailModel();
		$model_users = new UsersModel();
		$model_forget = new ForgetpassModel();

		$infoEmail = $model->getInfoEmail();
		$email = \Config\Services::email();

		$toEmail = $this->request->getPost('email');
		$infoNhan = $model_users->getUserByEmail($toEmail);

		$code = $this->generateRandomString();
		$link = base_url('/auth/resetpass/' . $code);

		// setting
		$config['protocol'] = 'smtp';
		$config['SMTPHost'] = 'smtp.gmail.com';
		$config['SMTPUser'] = $infoEmail['email'];
		$config['SMTPPass'] = $infoEmail['password'];
		$config['mailPath'] = '/usr/sbin/sendmail';
		$config['mailType'] = 'html';
		$config['SMTPPort'] = '587';
		$config['charset'] = 'utf8';
		$config['wordWrap'] = true;
		$email->initialize($config);

		// body

		$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light dark" />
    <meta name="supported-color-schemes" content="light dark" />
    <title></title>
    <style type="text/css" rel="stylesheet" media="all">
    /* Base ------------------------------ */

    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
    body {
      width: 100% !important;
      height: 100%;
      margin: 0;
      -webkit-text-size-adjust: none;
    }

    a {
      color: #3869D4;
    }

    a img {
      border: none;
    }

    td {
      word-break: break-word;
    }

    .preheader {
      display: none !important;
      visibility: hidden;
      mso-hide: all;
      font-size: 1px;
      line-height: 1px;
      max-height: 0;
      max-width: 0;
      opacity: 0;
      overflow: hidden;
    }
    /* Type ------------------------------ */

    body,
    td,
    th {
      font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
    }

    h1 {
      margin-top: 0;
      color: #333333;
      font-size: 22px;
      font-weight: bold;
      text-align: left;
    }

    h2 {
      margin-top: 0;
      color: #333333;
      font-size: 16px;
      font-weight: bold;
      text-align: left;
    }

    h3 {
      margin-top: 0;
      color: #333333;
      font-size: 14px;
      font-weight: bold;
      text-align: left;
    }

    td,
    th {
      font-size: 16px;
    }

    p,
    ul,
    ol,
    blockquote {
      margin: .4em 0 1.1875em;
      font-size: 16px;
      line-height: 1.625;
    }

    p.sub {
      font-size: 13px;
    }
    /* Utilities ------------------------------ */

    .align-right {
      text-align: right;
    }

    .align-left {
      text-align: left;
    }

    .align-center {
      text-align: center;
    }
    /* Buttons ------------------------------ */

    .button {
      background-color: #3869D4;
      border-top: 10px solid #3869D4;
      border-right: 18px solid #3869D4;
      border-bottom: 10px solid #3869D4;
      border-left: 18px solid #3869D4;
      display: inline-block;
      color: #FFF;
      text-decoration: none;
      border-radius: 3px;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
      -webkit-text-size-adjust: none;
      box-sizing: border-box;
    }

    .button--green {
      background-color: #22BC66;
      border-top: 10px solid #22BC66;
      border-right: 18px solid #22BC66;
      border-bottom: 10px solid #22BC66;
      border-left: 18px solid #22BC66;
    }

    .button--red {
      background-color: #FF6136;
      border-top: 10px solid #FF6136;
      border-right: 18px solid #FF6136;
      border-bottom: 10px solid #FF6136;
      border-left: 18px solid #FF6136;
    }

    @media only screen and (max-width: 500px) {
      .button {
        width: 100% !important;
        text-align: center !important;
      }
    }
    /* Attribute list ------------------------------ */

    .attributes {
      margin: 0 0 21px;
    }

    .attributes_content {
      background-color: #F4F4F7;
      padding: 16px;
    }

    .attributes_item {
      padding: 0;
    }
    /* Related Items ------------------------------ */

    .related {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .related_item {
      padding: 10px 0;
      color: #CBCCCF;
      font-size: 15px;
      line-height: 18px;
    }

    .related_item-title {
      display: block;
      margin: .5em 0 0;
    }

    .related_item-thumb {
      display: block;
      padding-bottom: 10px;
    }

    .related_heading {
      border-top: 1px solid #CBCCCF;
      text-align: center;
      padding: 25px 0 10px;
    }
    /* Discount Code ------------------------------ */

    .discount {
      width: 100%;
      margin: 0;
      padding: 24px;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
      border: 2px dashed #CBCCCF;
    }

    .discount_heading {
      text-align: center;
    }

    .discount_body {
      text-align: center;
      font-size: 15px;
    }
    /* Social Icons ------------------------------ */

    .social {
      width: auto;
    }

    .social td {
      padding: 0;
      width: auto;
    }

    .social_icon {
      height: 20px;
      margin: 0 8px 10px 8px;
      padding: 0;
    }
    /* Data table ------------------------------ */

    .purchase {
      width: 100%;
      margin: 0;
      padding: 35px 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .purchase_content {
      width: 100%;
      margin: 0;
      padding: 25px 0 0 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .purchase_item {
      padding: 10px 0;
      color: #51545E;
      font-size: 15px;
      line-height: 18px;
    }

    .purchase_heading {
      padding-bottom: 8px;
      border-bottom: 1px solid #EAEAEC;
    }

    .purchase_heading p {
      margin: 0;
      color: #85878E;
      font-size: 12px;
    }

    .purchase_footer {
      padding-top: 15px;
      border-top: 1px solid #EAEAEC;
    }

    .purchase_total {
      margin: 0;
      text-align: right;
      font-weight: bold;
      color: #333333;
    }

    .purchase_total--label {
      padding: 0 15px 0 0;
    }

    body {
      background-color: #F4F4F7;
      color: #51545E;
    }

    p {
      color: #51545E;
    }

    p.sub {
      color: #6B6E76;
    }

    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #F4F4F7;
    }

    .email-content {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }
    /* Masthead ----------------------- */

    .email-masthead {
      padding: 25px 0;
      text-align: center;
    }

    .email-masthead_logo {
      width: 94px;
    }

    .email-masthead_name {
      font-size: 16px;
      font-weight: bold;
      color: #A8AAAF;
      text-decoration: none;
      text-shadow: 0 1px 0 white;
    }
    /* Body ------------------------------ */

    .email-body {
      width: 100%;
      margin: 0;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }

    .email-body_inner {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      background-color: #FFFFFF;
    }

    .email-footer {
      width: 570px;
      margin: 0 auto;
      padding: 0;
      -premailer-width: 570px;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }

    .email-footer p {
      color: #6B6E76;
    }

    .body-action {
      width: 100%;
      margin: 30px auto;
      padding: 0;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
      text-align: center;
    }

    .body-sub {
      margin-top: 25px;
      padding-top: 25px;
      border-top: 1px solid #EAEAEC;
    }

    .content-cell {
      padding: 35px;
    }
    /*Media Queries ------------------------------ */

    @media only screen and (max-width: 600px) {
      .email-body_inner,
      .email-footer {
        width: 100% !important;
      }
    }

    @media (prefers-color-scheme: dark) {
      body,
      .email-body,
      .email-body_inner,
      .email-content,
      .email-wrapper,
      .email-masthead,
      .email-footer {
        background-color: #333333 !important;
        color: #FFF !important;
      }
      p,
      ul,
      ol,
      blockquote,
      h1,
      h2,
      h3 {
        color: #FFF !important;
      }
      .attributes_content,
      .discount {
        background-color: #222 !important;
      }
      .email-masthead_name {
        text-shadow: none !important;
      }
    }

    :root {
      color-scheme: light dark;
      supported-color-schemes: light dark;
    }
    </style>
    <!--[if mso]>
    <style type="text/css">
      .f-fallback  {
        font-family: Arial, sans-serif;
      }
    </style>
  <![endif]-->
  </head>
  <body>
    <span class="preheader">Use this link to reset your password. The link is only valid for 24 hours.</span>
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
      <tr>
        <td align="center">
          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
              <td class="email-masthead">
                <a href="https://example.com" class="f-fallback email-masthead_name">
                FORGET PASSWORD
              </a>
              </td>
            </tr>
            <!-- Email Body -->
            <tr>
              <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <!-- Body content -->
                  <tr>
                    <td class="content-cell">
                      <div class="f-fallback">
                        <h1>Hi ' . $infoNhan['fullname'] . ',</h1>
                        <p>You recently requested to reset your password for your [Product Name] account. Use the button below to reset it. <strong>This password reset is only valid for the next 24 hours.</strong></p>
                        <!-- Action -->
                        <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td align="center">
                              <!-- Border based button
           https://litmus.com/blog/a-guide-to-bulletproof-buttons-in-email-design -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                <tr>
                                  <td align="center">
                                    <a href="' . $link . '" class="f-fallback button button--green" target="_blank">Reset your password</a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <p>If you did not request a password reset, please ignore this email or <a href="{{support_url}}">contact support</a> if you have questions.</p>
                        <p>Thanks,
                          <br>The [Product Name] Team</p>
                        <!-- Sub copy -->
                        <table class="body-sub" role="presentation">
                          <tr>
                            <td>
                              <p class="f-fallback sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                              <p class="f-fallback sub">' . $link . '</p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td class="content-cell" align="center">
                      <p class="f-fallback sub align-center">&copy; 2019 [Product Name]. All rights reserved.</p>
                      <p class="f-fallback sub align-center">
                        [Company Name, LLC]
                        <br>033 62 19199
                        <br>Suite 1234
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>';
		// send mail
		$email->setFrom($infoEmail['email']);
		$email->setTo($toEmail);
		$email->setSubject($infoEmail['subject']);
		$email->setMessage($body);
		$email->send();


		$model_forget->where('email', $toEmail)->set(['action' => 1])->update();

		$timeNow = new Time('now', 'Asia/Ho_Chi_Minh', 'vi_VN');
		$dataLOG = [
			'email' => $toEmail,
			'time' => $timeNow,
			'created_at' => $timeNow,
			'action' => 0,
			'code' => $code,
		];
		$model_forget->insert($dataLOG);


	}

	public function resetpass()
	{
		$model_forget = new ForgetpassModel();

		$url = current_url(true);
		$code = $url->getSegment(3);
		$infoRS = $model_forget->getInfoForget($code);

		$data['data'] = $infoRS;
		$data['data']['check'] = 1;
		if (!$infoRS) {
			$data['data']['check'] = 0;
		}
		$data['data']['code'] = $code;
		echo view('resetpass', $data);


	}

	public function submitreset()
	{
		$model_forget = new ForgetpassModel();
		$model_users = new UsersModel();
		$email = $this->request->getPost('email');
		$idForget = $this->request->getPost('idforget');
		$password = $this->request->getPost('password');
		$infoUser = $model_users->getUserByEmail($email);

		$data = [
			'password' => $password,
		];
		$model_users->update($infoUser['Id'], $data);


		$dataF = [
			'action' => 1,
		];
		$model_forget->update($idForget, $dataF);
		echo json_encode(1);
	}


	public function submitsignin()
	{
		$model = new UsersModel();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		if ($username && $password) {
			$checkUser = $model->getUserByUsername($username, $password);
			if ($checkUser) {
				session()->set(['user' => $checkUser]);
				$JSON = [
					'stt' => true,
					'msg' => 'Logged in successfully',
					'error' => 0,
				];
			} else {
				$JSON = [
					'stt' => false,
					'msg' => 'Account or password incorrect',
					'error' => 0,
				];
			}
		} else {
			$JSON = [
				'stt' => false,
				'msg' => 'Error',
				'error' => 1,
			];
		}
		echo json_encode($JSON);
	}

	public function signup()
	{
		echo view('auth/signup/index');
	}


	public function submitsignup()
	{
		$model = new UsersModel();
		$fullname = $this->request->getPost('fullname');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$email = $this->request->getPost('email');
		$phone = $this->request->getPost('phone');


		if ($fullname && $username && $password && $email && $phone) {
			$checkUser = $model->getUserByName($username);

			if ($checkUser) {
				$JSON = [
					'stt' => false,
					'error' => 1,
				];
			} else {
				$data = [
					'fullname' => $fullname,
					'username' => $username,
					'password' => $password,
					'email' => $email,
					'phone' => $phone,
				];
				$id = $model->insert($data);

				$dataSS = [
					'id' => $id,
					'fullname' => $fullname,
					'username' => $username,
					'email' => $email,
					'phone' => $phone,
				];
				session()->set(['user' => $dataSS]);

				$JSON = [
					'stt' => true,
					'error' => 0,
				];
			}
		} else {
			$JSON = [
				'stt' => false,
				'error' => 0,
			];
		}
		echo json_encode($JSON);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------

}
