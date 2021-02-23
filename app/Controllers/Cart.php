<?php namespace App\Controllers;

use App\Models\AddressUserModel;
use App\Models\CouponModel;
use App\Models\CustomerModel;
use App\Models\OrdersDetailModel;
use App\Models\OrdersModel;
use App\Models\PropertiesDetailModel;
use App\Models\PropertiesModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\SettingsModel;
use App\Models\SizeModel;
use App\Models\TagModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;
use App\Models\ProductTagModel;
use App\Models\UsersModel;

class Cart extends BaseController
{
	public function index()
	{
		helper(['filesystem', 'cookie']);
		$modelProduct = new ProductModel();
		$modelCategory = new CategoryModel();
		$modelProductSize = new ProductSizeModel();
		$modelProductColor = new ProductColorModel();
		$cookie = get_cookie('cart');
		$arrCC = [];
		$arrCC = explode(',', $cookie);
		$listOrder = $modelProduct->whereIn('id', $arrCC)->findAll();
		$data['temp'] = 'order/index';
		$data['menu'] = $modelCategory->where('parent', '0')->findAll();;
		$data['menuactive'] = 'ttt';
		$data['listCart'] = session('cart');
		$data['title'] = 'Cart';
		$data['cart'] = session('cart');
		$data['arrFavourite'] = explode(',', get_cookie('favourite'));
		$data['listOrder'] = $listOrder;
		$data['user'] = session('user');
		echo view('layout_product', $data);
		//	session()->destroy('cart');

	}


	public function listcart()
	{
		helper('cookie');
		$quantity = $this->request->getPost('quantity');
		$loca = $this->request->getPost('loca');
		$listCart = session('cart');

		if ($quantity) {
			$listCart[$loca]['quantity'] = $quantity;
			//session()->destroy('cart');
			session()->set(['cart' => $listCart]);
		}


		echo json_encode($listCart);

	}

	public function addcart()
	{
		helper('cookie');
		$modelPro = new ProductModel();
		$id = $this->request->getPost('id');
		$size = $this->request->getPost('size');
		$color = $this->request->getPost('color');
		$front = $this->request->getPost('front');
		$back = $this->request->getPost('back');
		$quantity = $this->request->getPost('quantity');
		if ($quantity) {
			if ($quantity <= 0) {
				$quantity = 1;
			}
		} else {
			$quantity = 1;
		}
		if ($id) {
			$info = $modelPro->find($id);
			if ($info) {
				$info['size_od'] = $size;
				$info['color_od'] = $color;
				$info['front'] = $front;
				$info['back'] = $back;
				$info['quantity'] = $quantity;
				//	session()->set(['cart' => '']);
				if (!session('cart')) {
					$arrCC[] = $info;
					session()->set(['cart' => $arrCC]);

				} else {
					$arrCC = session('cart');
					$arrCC[] = $info;
					session()->set(['cart' => $arrCC]);

				}

				echo json_encode(count($arrCC));
			}
		}
	}

	public function uncart()
	{
		$id = $this->request->getPost('id');
		$arrCC = session('cart');
		array_splice($arrCC, $id, 1);
		session()->set(['cart' => $arrCC]);
		echo json_encode(1);
	}

	public function favourite()
	{
		$id = $this->request->getPost('id');
		$modelProduct = new ProductModel();
		$cookie = get_cookie('favourite');
		if (!$cookie) {
			$arrCC = [];
		} else {
			$arrCC = explode(',', $cookie);
		}

		if (!in_array($id, $arrCC)) {
			$arrCC[] = $id;
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'favourite',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);
		} else {
			$pos = array_search($id, $arrCC);
			unset($arrCC[$pos]);
			$text = implode(',', $arrCC);
			set_cookie([
				'name' => 'favourite',
				'value' => $text,
				'expire' => 1000000,
				'httponly' => false
			]);

		}

		echo json_encode($cookie);
	}

	//--------------------------------------------------------------------
	public function usecoupon()
	{
		$model = new CouponModel();
		$coupon = $this->request->getPost('coupon');
		$amount = $this->request->getPost('amount');
		$info = $model->where('code', $coupon)->first();
		$cart = session('cart');

		$total = 0;
		foreach ($cart as $val):
			if ($val['sale'] == 'yes') {
				$price = $val['price_sale'];
			} else {
				$price = $val['price'];
			}
			$total += $price;
		endforeach;


		if ($coupon == 'cancel') {
			$return = [
				'code' => 'coupou_cancel',
				'msg' => 'Successfully',
				'stt' => true,
				'data' => ['discount' => 0, 'afterDiscount' => $total]
			];

			echo json_encode($return);
			return;
		}


		$today = date('Y-m-d');
		if ($info) {
			if ($info['expiration_date'] >= $today) {


				$discount = $total * $info['discount'] / 100;
				$af_Discount = $total - $discount;

				$return = [
					'code' => 'coupou_success',
					'msg' => 'Successfully',
					'stt' => true,
					'data' => ['discount' => $discount, 'afterDiscount' => $af_Discount]
				];
			} else {
				$return = [
					'code' => 'coupou_success',
					'msg' => 'Coupon code is expired',
					'stt' => false,
				];
			}
		} else {
			$return = [
				'code' => 'coupou_success',
				'msg' => 'Coupon code is not available',
				'stt' => false,
			];
		}

		echo json_encode($return);
	}


	public function insert()
	{

		helper('filesystem');
		$orderMD = new OrdersModel();
		$orderDetailMD = new OrdersDetailModel();
		$customerMD = new CustomerModel();
		$userModel = new UsersModel();
		$userAddressModel = new AddressUserModel();
		$fullname = $this->request->getPost('fullname');
		$phone = $this->request->getPost('phone');
		$email = $this->request->getPost('email');
		$country = $this->request->getPost('country');
		$city = $this->request->getPost('city');
		$postalcode = $this->request->getPost('postalcode');
		$ship = $this->request->getPost('shipping_method');
		$type_ship = $this->request->getPost('type_ship_address');
		$address = $this->request->getPost('address');
		$paymethod = $this->request->getPost('radiopaymethod');
		$test = session('cart');
		$user = session('user');

		if (!$user) {
			$dataUser = [
				'username' => $email,
				'password' => 1234,
				'fullname' => $fullname,
				'phone' => $phone,
				'email' => $email,
				'country' => $country,
				'city' => $city,
				'postalcode' => $postalcode,
				'address' => $address,
				'status' => 'active',
				'role' => 'user',

			];
			$idCustom = $userModel->insert($dataUser);

			$addressUser = [
				'cus_id' => $idCustom,
				'country' => $country,
				'city' => $city,
				'postalcode' => $postalcode,
				'address' => $address,
			];

			$userAddressModel->insert($addressUser);
			$addresTexT = $country . '&nbsp;' . $city . '&nbsp;' . $postalcode . '&nbsp;' . $address;
		} else {
			// type_ship_address
			$idCustom = $user['id'];
			if ($type_ship == 'new') {
				$countryN = $this->request->getPost('country_new');
				$cityN = $this->request->getPost('city_new');
				$postalcodeN = $this->request->getPost('postalcode_new');
				$addressN = $this->request->getPost('address_new');

				$addressNEW = [
					'cus_id' => $idCustom,
					'country' => $countryN,
					'city' => $cityN,
					'postalcode' => $postalcodeN,
					'address' => $addressN,
				];
				$userAddressModel->insert($addressNEW);
				$addresTexT = $countryN . '&nbsp;' . $cityN . '&nbsp;' . $postalcodeN . '&nbsp;' . $addressN;

			} else {
				$idAddress = $this->request->getPost('idaddress');
				$infoAddress = $userAddressModel->find($idAddress);

				$addresTexT = $infoAddress['country'] . '&nbsp;' . $infoAddress['city'] . '&nbsp;' . $infoAddress['postalcode'] . '&nbsp;' . $infoAddress['address'];

			}


		}


		$dataOrder = [
			'order_cus' => $idCustom,
			'order_status' => 'New',
			'order_code' => $idCustom . date('Ymd') . date('is'),
			'order_date' => date('Y-m-d H:i:s'),
			'order_shipping' => $ship,
			'order_address' => $addresTexT,
			'order_payment_method' => $paymethod,
			//'order_date' => date(),
		];
		$idOrder = $orderMD->insert($dataOrder);
		$listCart = session('cart');

		$total = 0;
		$i = 0;
		foreach ($listCart as $val):
			$i++;

			if ($val['sale'] == 'yes') {
				$price = $val['price_sale'];
			} else {
				$price = $val['price'];
			}

			$image_parts = explode(";base64,", $val['front']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseFront = base64_decode($image_parts[1]);
			$fileFront = WRITEPATH . '/uploads/order/' . $idOrder . '/front' . $i . '.' . $image_type;
			$pathFront = '/order/' . $idOrder . '/front' . $i . '.' . $image_type;
			$image_parts = explode(";base64,", $val['back']);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_baseBack = base64_decode($image_parts[1]);

			$fileBack = WRITEPATH . '/uploads/order/' . $idOrder . '/back' . $i . '.' . $image_type;
			$pathBack = '/order/' . $idOrder . '/back' . $i . '.' . $image_type;


			if (!is_dir(WRITEPATH . 'uploads/order/' . $idOrder)) {
				mkdir(WRITEPATH . 'uploads/order/' . $idOrder, 0777, TRUE);
			}
			file_put_contents($fileFront, $image_baseFront);
			file_put_contents($fileBack, $image_baseBack);

			$total += $price;
			$dataOrderDetail = [
				'order_id' => $idOrder,
				'order_detail_size' => $val['size_od'],
				'order_detail_color' => $val['color_od'],
				'order_detail_price' => $price,
				'order_detail_image_front' => $pathFront,
				'order_detail_image_back' => $pathBack,
				'product_id' => $val['id'],
			];
			$orderDetailMD->insert($dataOrderDetail);

		endforeach;

		$upTotalPrice = [
			'order_price' => $total,
		];
		$orderMD->update($idOrder, $upTotalPrice);

// EMAIL;;;;
		$model_setting = new SettingsModel();
		$SendEmail = \Config\Services::email();
		$infoEMAIL = $model_setting->where('type', 'email')
			->findAll();
		// setting
		$fromEmail = '';
		foreach ($infoEMAIL as $key => $val) {
			if ($val['filed'] != 'subject') {
				$config[$val['filed']] = $val['value'];
			}
			if ($val['filed'] == 'SMTPUser') {
				$fromEmail = $val['value'];
			}
		}
		$config['mailPath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf8';
		$config['wordWrap'] = true;
		$SendEmail->initialize($config);


		$body = '<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

  <head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
      td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
  <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen">
    <style>
      .hover-underline:hover {
        text-decoration: underline !important;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }

      @keyframes ping {

        75%,
        100% {
          transform: scale(2);
          opacity: 0;
        }
      }

      @keyframes pulse {
        50% {
          opacity: .5;
        }
      }

      @keyframes bounce {

        0%,
        100% {
          transform: translateY(-25%);
          animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
        }

        50% {
          transform: none;
          animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }
      }

      @media (max-width: 600px) {
        .sm-px-24 {
          padding-left: 24px !important;
          padding-right: 24px !important;
        }

        .sm-py-32 {
          padding-top: 32px !important;
          padding-bottom: 32px !important;
        }

        .sm-w-full {
          width: 100% !important;
        }
      }
    </style>
  </head>

  <body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased;">
    <div style="display: none;">This is an invoice for your purchase on undefined. Please submit payment by undefined</div>
    <div role="article" aria-roledescription="email" aria-label="" lang="en">
      <table style="font-family: Montserrat; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
          <td align="center" style="--bg-opacity: 1; background-color: #eceff1; background-color: #eceff1; font-family: Montserrat" bgcolor="#eceff1">
            <table class="sm-w-full" style="font-family: Montserrat; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">
              <tr>
                <td class="sm-py-32 sm-px-24" style="font-family: Montserrat; padding: 48px; text-align: center;" align="center">
                  <a href="https://1.envato.market/vuexy_admin">
                    <img src="https://hello.lifestud.io//upload/setting/general/LIFE_RED.png" width="155" alt="Vuexy Admin" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                  </a>
                </td>
              </tr>
              <tr>
                <td align="center" class="sm-px-24" style="font-family: Montserrat;">
                  <table style="font-family: Montserrat; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                      <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; background-color: #ffffff; border-radius: 4px; font-family: Montserrat; font-size: 14px; line-height: 24px; padding: 48px; text-align: left; --text-opacity: 1; color: #626262;" align="left">
                        <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">Hey</p>
                        <p style="font-weight: 700; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: #ff5850;">'.$fullname.'!</p>
                        <p style="margin: 0 0 24px;">
                          Thanks for using Life Ecom. This is an invoice for your recent purchase.
                        </p>
                        <table style="font-family: Montserrat; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td style="font-family: Montserrat">
                              <h3 style="font-weight: 700; font-size: 12px; margin-top: 0; text-align: left;">#'.$idCustom . date('Ymd') . date('is').'</h3>
                            </td>
                            <td style="font-family: Montserrat">
                              <h3 style="font-weight: 700; font-size: 12px; margin-top: 0; text-align: right;">
                                '.date('Y-m-d').'
                              </h3>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2" style="font-family: Montserrat">
                              <table style="font-family: Montserrat; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                  <th align="left" style="padding-bottom: 8px;">
                                    <p>Description</p>
                                  </th>
                                  <th align="right" style="padding-bottom: 8px;">
                                    <p>Amount</p>
                                  </th>
                                </tr>
                                <tr>
                                  <td style="font-family: Montserrat; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;" width="80%">
                                    Vuexy - Vuejs, React, HTML
                                  </td>
                                  <td align="right" style="font-family: Montserrat; font-size: 14px; text-align: right; width: 20%;" width="20%">$32.00</td>
                                </tr>
                                <tr>
                                  <td style="font-family: Montserrat; font-size: 14px; padding-top: 10px; padding-bottom: 10px; width: 80%;" width="80%">
                                    Frest – Admin Dashboard 
                                  </td>
                                  <td align="right" style="font-family: Montserrat; font-size: 14px; text-align: right; width: 20%;" width="20%">$24.00</td>
                                </tr>
                                <tr>
                                  <td style="font-family: Montserrat,sans-serif; width: 80%;" width="80%">
                                    <p align="right" style="font-weight: 700; font-size: 14px; line-height: 24px; margin: 0; padding-right: 16px; text-align: right;">
                                      Total
                                    </p>
                                  </td>
                                  <td style="font-family: Montserrat; width: 20%;" width="20%">
                                    <p align="right" style="font-weight: 700; font-size: 14px; line-height: 24px; margin: 0; text-align: right;">
                                      $56.00
                                    </p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <table align="center" style="font-family: Montserrat; margin-left: auto; margin-right: auto; text-align: center; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td align="right" style="font-family: Montserrat">
                              <table style="font-family: Montserrat; margin-top: 24px; margin-bottom: 24px;" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                  <td align="right" style="mso-padding-alt: 16px 24px; --bg-opacity: 1; background-color: #f37061;border-radius: 4px; font-family: Montserrat">
                                    <a href="#" style="display: block; font-weight: 600; font-size: 14px; line-height: 100%; padding: 16px 24px; --text-opacity: 1; color: #ffffff;text-decoration: none;">Pay Invoice &rarr;</a>
                                  </td>
                                </tr>
                            </td>
                          </tr>
                         </table>
                           </td>
        </tr>
      </table>
     </div>
  </body>
</html>';

		$a = '<table align="center" style="font-family: Montserrat; margin-left: auto; margin-right: auto; text-align: center; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td align="right" style="font-family: Montserrat">
                              <table style="font-family: Montserrat; margin-top: 24px; margin-bottom: 24px;" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                  <td align="right" style="mso-padding-alt: 16px 24px; --bg-opacity: 1; background-color: #7367f0; background-color: rgba(115, 103, 240, var(--bg-opacity)); border-radius: 4px; font-family: Montserrat" bgcolor="rgba(115, 103, 240, var(--bg-opacity))">
                                    <a href="https://example.com" style="display: block; font-weight: 600; font-size: 14px; line-height: 100%; padding: 16px 24px; --text-opacity: 1; color: #ffffff; color: rgba(255, 255, 255, var(--text-opacity)); text-decoration: none;">Pay Invoice &rarr;</a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <p style="font-size: 14px; line-height: 24px; margin-top: 6px; margin-bottom: 20px;">
                          If you have any questions about this invoice, simply reply to this email or reach out to our
                          <a href="{{support_url}}">support team</a> for help.
                        </p>
                        <p style="font-size: 14px; line-height: 24px; margin-top: 6px; margin-bottom: 20px;">
                          Cheers,
                          <br>The PixInvent Team
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td style="font-family: Montserrat; height: 20px;" height="20"></td>
              </tr>
              <tr>
                <td style="font-family: Montserrat; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1; color: rgba(236, 239, 241, var(--text-opacity));">
                  <p align="center" style="cursor: default; margin-bottom: 16px;">
                    <a href="https://www.facebook.com/pixinvents" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="images/facebook.png" width="17" alt="Facebook" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                    &bull;
                    <a href="https://twitter.com/pixinvents" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="images/twitter.png" width="17" alt="Twitter" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                    &bull;
                    <a href="https://www.instagram.com/pixinvents" style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity)); text-decoration: none;"><img src="images/instagram.png" width="17" alt="Instagram" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                  </p>
                  <p style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity));">
                    Use of our service and website is subject to our
                    <a href="https://pixinvent.com/" class="hover-underline" style="--text-opacity: 1; color: #7367f0; color: rgba(115, 103, 240, var(--text-opacity)); text-decoration: none;">Terms of Use</a> and
                    <a href="https://pixinvent.com/" class="hover-underline" style="--text-opacity: 1; color: #7367f0; color: rgba(115, 103, 240, var(--text-opacity)); text-decoration: none;">Privacy Policy</a>.
                  </p>
                </td>
              </tr>
              <tr>
                <td style="font-family: Montserrat" height="16"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>';
		// send mail
		$SendEmail->setFrom($fromEmail);
		$SendEmail->setTo($email);
		$SendEmail->setSubject('TKS FOR BUY ');
		$SendEmail->setMessage($body);
		$SendEmail->send();

		// END EMAIL
		unset($_SESSION['cart']);
		echo json_encode($idCustom . date('Ymd') . date('is'));
	}

}
