<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirana_API extends CI_Controller{

  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    header('Content-Type: application/json');
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
    $this->load->model('API_Model');
  }

/************************************************** Customer ***********************************/

  // SignUp
  public function signup(){
    $otp = mt_rand(100000, 999999);
    $customer_ref_by = $_REQUEST['customer_ref_by'];
    $customer_ref_by = str_replace("KBC-000", "", $customer_ref_by);
    $customer_mobile = $_REQUEST['customer_mobile'];
    $exist = $this->User_Model->check_duplication('',$customer_mobile,'customer_mobile','customer');
    if($exist > 0){
      $response["status"] = FALSE;
      $response["msg"] = "Mobile Number Exist";
    } else{
      $save_data = array(
        'customer_fname' => $_REQUEST['customer_fname'],
        'customer_lname' => $_REQUEST['customer_lname'],
        'customer_mobile' => $_REQUEST['customer_mobile'],
        'customer_email' => $_REQUEST['customer_email'],
        'customer_password' => $_REQUEST['customer_password'],
        'customer_ref_by' => $customer_ref_by,
        'otp' => $otp,
      );
      $this->session->set_userdata($save_data);

      $mobile_no = $_REQUEST['customer_mobile'];
      $msg = "Welcome to kiranabhara.com. OTP: ".$otp."";
      $sms_result = $this->Website_Model->send_sms($mobile_no, $msg);

      $response["status"] = TRUE;
      $response["msg"] = "OTP Sent";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


  // Verify SignUp OTP.. Save SignUp Data.. Save User Refferal Points..
  public function check_signup_otp(){
    $user_otp = $_REQUEST['otp'];
    $session_otp = $this->session->userdata('otp');

    if($session_otp == $user_otp){
      $customer_ref_by = $this->session->userdata('customer_ref_by');
      $ref_cust_info = $this->User_Model->get_info_arr_fields('customer_id','customer_id', $customer_ref_by, 'customer');
      if($ref_cust_info){
        $save_data['customer_ref_by'] = $customer_ref_by;
      }
      $save_data = array(
        'customer_fname' => $this->session->userdata('customer_fname'),
        'customer_lname' => $this->session->userdata('customer_lname'),
        'customer_mobile' => $this->session->userdata('customer_mobile'),
        'customer_email' => $this->session->userdata('customer_email'),
        'customer_password' => $this->session->userdata('customer_password'),
        'customer_date' => date('d-m-Y h:i:s A'),
        'customer_addedby' => 0,
      );
      $customer_id = $this->User_Model->save_data('customer', $save_data);

      // Add Refferel Points...
      if($ref_cust_info){
        $save_point_data = array(
          'customer_id' => $customer_ref_by,
          'point_add_type' => 2,
          'point_add_ref_id' => $customer_id,
          'point_add_cnt' => 5,
          'point_add_date' => date('d-m-Y'),
          'point_add_time' => date('h:i:s A'),
        );
        $point_add_id = $this->User_Model->save_data('point_add', $save_point_data);
      }

      $response["status"] = TRUE;
      $response["msg"] = "Valid OTP. Signup Successfull";
    } else{
      $response["status"] = FALSE;
      $response["msg"] = "Invalid OTP";
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // SignIn...
  public function sign_in(){
    $mobile_no = $_REQUEST['mobile_no'];
    $password = $_REQUEST['password'];

    $login = $this->Website_Model->check_login($mobile_no, $password);
    if($login == null){
      $response["status"] = FALSE;
      $response["msg"] = "Invalid Mobile No. or Password";
    } else{
      $response["status"] = TRUE;
      $response["msg"] = "Login Successfull";
      $response["customer_id"] = $login[0]['customer_id'];
      $response["customer_fname"] = $login[0]['customer_fname'];
      $response["customer_lname"] = $login[0]['customer_lname'];
      // $response["customer_details"] = $login[0];
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Forgot Password...
  public function forgot_password(){
    $mobile_no = $_REQUEST['mobile_no'];
    $member_info = $this->User_Model->get_info_arr2_fields('customer_id,customer_mobile', 'customer_mobile', $mobile_no, '', '', '', '', 'customer');
    if($member_info){
      $otp = mt_rand(100000, 999999);
      $this->session->set_userdata('for_pass_otp', $otp);

      $msg = "You requested for forgot password on kiranabhara.com. \nOTP: ".$otp."";
      $sms_result = $this->Website_Model->send_sms($mobile_no, $msg);

      $response["status"] = TRUE;
      $response["customer_id"] = $member_info[0]['customer_id'];
      $response["msg"] = "OTP sms sent for Reset Password";
    } else{
      $response["status"] = FALSE;
      $response["msg"] = "Invalid Mobile No.";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Check Forgot Password OTP...
  public function check_forgot_password_otp(){
    $otp = $_REQUEST['otp'];
    $for_pass_otp = $this->session->userdata('for_pass_otp');

    if($otp == $for_pass_otp){
      $response["status"] = TRUE;
      $response["msg"] = "Valid OTP. Reset Your Password";
    } else{
      $response["status"] = FALSE;
      $response["msg"] = "Invalid OTP";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Change Password...
  public function change_password(){
    $customer_id = $_REQUEST['customer_id'];
    $new_password = $_REQUEST['new_password'];

    $up_data['customer_password'] = $new_password;
    $this->User_Model->update_info('customer_id', $customer_id, 'customer', $up_data);

    $response["status"] = TRUE;
    $response["msg"] = "Password Changed Successfuly";
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/********************************************* Get List ****************************************/
  // Country List...
  public function country_list(){
    $country_list = $this->User_Model->get_list2('country_name','ASC','country');
    $response["status"] = TRUE;
    $response["country_list"] = $country_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // State List by Country...
  public function state_list(){
    $country_id = $_REQUEST['country_id'];
    $state_list = $this->User_Model->get_list_by_id2('state_id, country_id, state_name','country_id',$country_id,'state');
    $response["status"] = TRUE;
    $response["state_list"] = $state_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // City(District) List by State...
  public function city_list(){
    $state_id = $_REQUEST['state_id'];
    $city_list = $this->User_Model->get_list_by_id2('district_id as city_id , state_id, district_name as city_name','state_id',$state_id,'district');
    $response["status"] = TRUE;
    $response["city_list"] = $city_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Area List... Added by Admin as Tahsil for Pincode...
  public function area_list(){
    $area_list = $this->User_Model->get_list_by_id2('tahsil_id  as area_id, tahsil_name as area_name','tahsil_status',1,'tahsil');
    $response["status"] = TRUE;
    $response["area_list"] = $area_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Pincode List By Area (tahsil_id)...
  public function pincode_list(){
    $area_id = $_REQUEST['area_id'];
    $pincode_list = $this->User_Model->get_list_by_id2('tahsil_pincode_area as pincode_area , tahsil_pincode_no as pincode_no','tahsil_id',$area_id,'tahsil_pincode');
    $response["status"] = TRUE;
    $response["pincode_list"] = $pincode_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*********************************************** Product *****************************************/
  // Brand List...
  public function brand_list(){
    $brand_list = $this->User_Model->get_list_by_id2('manufacturer_id, manufacturer_name, manufacturer_img','manufacturer_status',1,'manufacturer');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/manufacturer/';
    $response["brand_list"] = $brand_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Main Category List...
  public function main_category_list(){
    $main_category_list = $this->User_Model->get_list_by_id_fields('category_id, category_name, category_img','category_status',1,'is_main',1,'','','category_name','ASC','category');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/category/';
    $response["main_category_list"] = $main_category_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Sub Category List...
  public function sub_category_list(){
    $main_category_id = $_REQUEST['main_category_id'];
    $sub_category_list = $this->User_Model->get_list_by_id_fields('category_id, category_name, category_img','category_status',1,'is_main',0,'main_category_id',$main_category_id,'category_name','ASC','category');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/category/';
    $response["sub_category_list"] = $sub_category_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Brand...
  public function product_list_by_brand(){
    $brand_id = $_REQUEST['brand_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'manufacturer_id',$brand_id,'','','product_name','ASC','product');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/product/';
    $response["product_list"] = $product_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Main Category...
  public function product_list_by_main_category(){
    $main_category_id = $_REQUEST['main_category_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'main_category_id',$main_category_id,'','','product_name','ASC','product');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/product/';
    $response["product_list"] = $product_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Main Category...
  public function product_list_by_sub_category(){
    $sub_category_id = $_REQUEST['sub_category_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'category_id',$sub_category_id,'','','product_name','ASC','product');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/product/';
    $response["product_list"] = $product_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product Attribute...
  public function product_attribute(){
    $product_id = $_REQUEST['product_id'];
    $product_info = $this->User_Model->get_info_arr_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_id', $product_id, 'product');
    $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id ','ASC','product_attribute');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/product/';
    $response["product_info"] = $product_info[0];
    $response["product_attribute_list"] = $product_attribute_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Featured Product List...
  public function featured_product_list(){
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'is_feature',1,'','','product_name','ASC','product');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/product/';
    $response["product_list"] = $product_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product main categorywise its subcategory and brand list
  public function brand_list_by_category(){
    $main_category_id = $_REQUEST['main_category_id'];
    $brand_list = $this->Website_Model->get_brand_category($main_category_id);
    $sub_category_list = $this->User_Model->get_list_by_id('main_category_id',$main_category_id,'category_status',1,'category_name','ASC','category');
    $response["status"] = TRUE;
    $response["brand_img_path"] = base_url().'assets/images/manufacturer/';
    $response["category_img_path"] = base_url().'assets/images/category/';
    $response["brand_list"] = $brand_list;
    $response["sub_category_list"] = $sub_category_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************** App Dynamic Contents ********************************************/

  public function banners_list(){
    $banners_list = $this->User_Model->get_list_by_id_fields('*','slider_status',1,'','','','','slider_id','ASC','slider');
    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/slider/';
    $response["banners_list"] = $banners_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************** User Interactions **************************************************/
  // Check Available Pincode...
  public function check_pincode(){
    $pincode = $_REQUEST['pincode'];
    $check_pin = $this->User_Model->check_duplication('',$pincode,'tahsil_pincode_no','tahsil_pincode');
    if($check_pin > 0){
      $response["status"] = TRUE;
      $response["msg"] = 'Valid Pincode';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Invalid Pincode';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*********************************************** Customer *******************************************************/
  // Customer Profile...
  public function profile(){
    $customer_id = $_REQUEST['customer_id'];
    $fields = "customer_id, customer_fname, customer_lname, customer_dob, customer_gender, customer_mobile, customer_email, customer_password, customer_address, customer_city, customer_pin, customer_img, customer_loyalty_no, customer_credit_lim, customer_status, customer_ref_by, customer_addedby, customer_date";
    $customer_info = $this->User_Model->get_info_arr2_fields($fields, 'customer_id', $customer_id, '', '', '', '', 'customer');

    $response["status"] = TRUE;
    $response["img_path"] = base_url().'assets/images/customer/';
    $response["customer_info"] = $customer_info[0];
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Active Membership Details...
  public function active_membership_details(){
    $customer_id = $_REQUEST['customer_id'];
    $today = date('d-m-Y');
    $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $customer_id, 'cust_mem_status', 1, '', '', 'cust_membership');
    if($cust_mem_info && strtotime($cust_mem_info[0]['cust_mem_end_date']) > strtotime($today)){
      $response["status"] = TRUE;
      $response["msg"] = 'Active Membership Available';
      $response['active_membership_details'] = $cust_mem_info[0];
    } else{
      $response["status"] = FALSE;
      $response['msg'] = 'Membership Unavailable';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*********************************************** Order *********************************************************/

  // Upload Booklet Orders...
  public function upload_booklet_order(){
    $customer_id = $_REQUEST['customer_id'];
    if(isset($_FILES['order_upl_img']['name'])){
      $time = date('dmYHi');
      $image_name = 'order_'.$customer_id.'_'.$time;
      $config['upload_path'] = 'assets/images/orders/';
      $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xsl';
      $config['file_name'] = $image_name;
      $filename = $_FILES['order_upl_img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      $this->upload->initialize($config);
      if ($this->upload->do_upload('order_upl_img')){
        $save_data['order_upl_img'] = $image_name.'.'.$ext;
        $save_data['customer_id'] = $customer_id;
        $save_data['order_upl_date'] = date('d-m-Y h:i:s A');
        $this->User_Model->save_data('order_upl', $save_data);
        $this->session->set_flashdata('upload_success','success');
        $response["status"] = TRUE;
        $response["msg"] = "Order Uploaded";
      }
      else{
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('upload_error',$this->upload->display_errors());
        $response["status"] = FALSE;
        $response["msg"] = $error;
      }
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Image Not Selected';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Customer Order List...
  public function customer_order_list(){
    $customer_id = $_REQUEST['customer_id'];
    $order_list = $this->User_Model->get_list_by_id('customer_id',$customer_id,'','','order_id','DESC','order_tbl');
    $response["status"] = TRUE;
    $response["customer_order_list"] = $order_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }
  // Order Details - Product List.
  public function customer_order_details_list(){
    $order_id = $_REQUEST['order_id'];
    $order_details_list = $this->User_Model->get_list_by_id('order_id',$order_id,'','','order_pro_id ','ASC','order_pro');
    $response["status"] = TRUE;
    $response["order_details_list"] = $order_details_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Track Order...
  public function order_tracking(){
    $order_id = $_REQUEST['order_id'];
    $order_status_info = $this->User_Model->get_info_arr_fields('order_status','order_id', $order_id, 'order_tbl');
    $order_status_id = $order_status_info[0]['order_status'];
    $order_status_info2 = $this->User_Model->get_info_arr_fields('order_status_name','order_status_id', $order_status_id, 'order_status');
    $order_status_name = $order_status_info2[0]['order_status_name'];

    $response["status"] = TRUE;
    $response["order_id"] = $order_id;
    $response["order_status_id"] = $order_status_id;
    $response["order_status_name"] = $order_status_name;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/******************************************* Wallet ***************************************************/

  public function wallet_balance(){
    $customer_id = $_REQUEST['customer_id'];
    $point_add_cnt = $this->User_Model->get_sum('','point_add_cnt','customer_id',$customer_id,'','','point_add');
    $point_use_cnt = $this->User_Model->get_sum('','point_use_cnt','customer_id',$customer_id,'','','point_use');

    $wallet_bal_point = $point_add_cnt - $point_use_cnt;

    $response["status"] = TRUE;
    $response["wallet_balance"] = $wallet_bal_point;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Wallet Activity...
  public function wallet_activity(){
    $customer_id = $_REQUEST['customer_id'];
    $from_date = $_REQUEST['from_date'];
    $to_date = $_REQUEST['to_date'];

    $wallet_add_activity_list = $this->Website_Model->point_add_list_by_date($customer_id,$from_date,$to_date);
    foreach ($wallet_add_activity_list as $add_list) {
      $point_add_type_id = $add_list->point_add_type;
      if($point_add_type_id == 1){ $add_list->point_add_type = 'Wallet Fund';  }
      elseif ($point_add_type_id == 2) { $add_list->point_add_type = 'Customer Refference Reward'; }
      elseif ($point_add_type_id == 3) { $add_list->point_add_type = 'Order 999+ Reward'; }
    }

    $wallet_use_activity_list = $this->Website_Model->point_use_list_by_date($customer_id,$from_date,$to_date);

    $response["status"] = TRUE;
    $response["wallet_add_activity_list"] = $wallet_add_activity_list;
    $response["wallet_use_activity_list"] = $wallet_use_activity_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Save Wallet Data....
  public function save_wallet_data(){
    $customer_id = $_REQUEST['customer_id'];
    $razorpay_payment_id = $_REQUEST['razorpay_payment_id'];
    $razorpay_order_id = $_REQUEST['razorpay_order_id'];
    $wallet_add_amount = $_REQUEST['wallet_fund_amount'];

    $save_wallet_data = array(
      'customer_id' => $customer_id,
      'wallet_add_amount' => $wallet_add_amount,
      'razorpay_payment_id' => $razorpay_payment_id,
      'razorpay_order_id' => $razorpay_order_id,
      'wallet_add_date' => date('d-m-Y'),
      'wallet_add_time' => date('h:i:s A'),
    );
    $wallet_add_id = $this->User_Model->save_data('wallet_add', $save_wallet_data);

    $save_point_data = array(
      'customer_id' => $customer_id,
      'point_add_type' => 1,
      'point_add_ref_id' => $wallet_add_id,
      'point_add_cnt' => $wallet_add_amount,
      'point_add_date' => date('d-m-Y'),
      'point_add_time' => date('h:i:s A'),
    );
    $point_add_id = $this->User_Model->save_data('point_add', $save_point_data);

    $response["status"] = TRUE;
    $response["msg"] = 'Wallet Amount Added Successfully';
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************************************************************************************/

  // // Request Product View/Save...
  public function request_product(){
    $save_data['req_product_name'] = $_REQUEST['req_product_name'];
    $save_data['req_product_person'] = $_REQUEST['req_product_person'];
    $save_data['req_product_email'] = $_REQUEST['req_product_email'];
    $save_data['req_product_mobile'] = $_REQUEST['req_product_mobile'];
    $save_data['req_product_msg'] = $_REQUEST['req_product_msg'];
    $save_data['req_product_date'] = date('d-m-Y h:i:s A');
    $this->User_Model->save_data('req_product', $save_data);
    //
    $response["status"] = TRUE;
    $response["msg"] = "Order Uploaded";
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Become Resller...
  public function become_reseller(){
    $save_data['reseller_reg_name'] = $_REQUEST['reseller_reg_name'];
    $save_data['reseller_reg_addr'] = $_REQUEST['reseller_reg_addr'];
    $save_data['reseller_reg_gender'] = $_REQUEST['reseller_reg_gender'];
    $save_data['reseller_reg_mob'] = $_REQUEST['reseller_reg_mob'];
    $save_data['reseller_reg_email'] = $_REQUEST['reseller_reg_email'];
    $save_data['reseller_reg_date'] = date('d-m-Y h:i:s A');

    $this->User_Model->save_data('reseller_reg', $save_data);

    $response["status"] = TRUE;
    $response["msg"] = "Become Resller Data Saved Successfuly";
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Offers List...
  public function offers_list(){
    $offers_list = $this->User_Model->get_list_by_id3('offer_status',1,'','','','','offer_id','DESC','offer');
    $response["status"] = TRUE;
    $response["offers_list"] = $offers_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


/********************************************* Admin ***********************************/

  public function membership_scheme_list(){
    $membership_scheme_list = $this->Website_Model->membership_scheme_list();
    $response["status"] = TRUE;
    $response["membership_scheme_list"] = $membership_scheme_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function membership_scheme_details(){
    $mem_sch_id = $_REQUEST['mem_sch_id'];
    $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
    if($membership_info){
      $membership_details_list = $this->User_Model->get_list_by_id2('*','mem_sch_id',$mem_sch_id,'mem_sch_details');
      $membership_info[0]['membership_details_list'] = $membership_details_list;

      $response["status"] = TRUE;
      $response["membership_scheme_details"] = $membership_info[0];
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Invalid mem_sch_id';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*************************************** Use Coupon & Redeem Point *******************************/
  // Apply Coupon.. Check Valid Coupon...
  public function apply_coupon(){
    $customer_id = $_REQUEST['customer_id'];
    $coupon_code = $_REQUEST['coupon_code'];
    $cart_total = $_REQUEST['order_total_amount'];
    $today = date('d-m-Y');

    $coupon_info = $this->User_Model->get_info_arr('coupon_code', $coupon_code, 'coupon');
    if($coupon_info){
      $coupon_used_count = $this->User_Model->get_count('coupon_used_id','coupon_id',$coupon_info[0]['coupon_id'],'customer_id',$customer_id,'','','coupon_used');
      if($coupon_info[0]['coupon_status'] == 0 ){
        $response["status"] = FALSE;
        $response["msg"] = 'Invalid Coupon Code';
      } elseif ( strtotime($coupon_info[0]['coupon_exp_date']) < strtotime($today)) {
        $response["status"] = FALSE;
        $response["msg"] = 'This Coupon Code is Expired';
      } elseif ($cart_total > $coupon_info[0]['coupon_max_spend'] || $cart_total < $coupon_info[0]['coupon_min_spend']) {
        $response["status"] = FALSE;
        $response["msg"] = 'Cart Amount is Out of Range';
      } elseif ($coupon_used_count >= $coupon_info[0]['limit_per_user']) {
        $response["status"] = FALSE;
        $response["msg"] = 'This Coupon Usage is Expired';
      } else{
        $response["status"] = TRUE;
        $response['msg'] = 'Coupon Applied Successfully';
        $response['coupon_id'] = $coupon_info[0]['coupon_id'];
        $response['coupon_code'] = $coupon_info[0]['coupon_code'];
        $response['coupon_amt'] = $coupon_info[0]['coupon_amt'];
      }
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Invalid Coupon Code';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Save Used Coupon...
  public function save_used_coupon(){
    $save_data['order_id'] = $_REQUEST['order_id'];
    $save_data['customer_id'] = $_REQUEST['customer_id'];
    $save_data['coupon_id'] = $_REQUEST['coupon_id'];
    $save_data['coupon_code'] = $_REQUEST['coupon_code'];
    $save_data['coupon_used_dis_amt'] = $_REQUEST['coupon_used_dis_amt'];
    $save_data['coupon_used_date'] = date('d-m-Y');
    $save_data['coupon_used_time'] = date('h:i:s A');

    $coupon_info = $this->User_Model->get_info_arr2_fields('coupon_used_id', 'order_id', $save_data['order_id'], 'customer_id', $save_data['customer_id'], 'coupon_id', $save_data['coupon_id'], 'coupon_used');
    if($coupon_info){
      $response["status"] = FALSE;
      $response["msg"] = 'Coupon Not Saved. Already used for this Order';
    } else{
      $coupon_used_id = $this->User_Model->save_data('coupon_used', $save_data);
      if($coupon_used_id){
        $response["status"] = TRUE;
        $response["msg"] = 'Coupon Saved Successfully';
      } else{
        $response["status"] = FALSE;
        $response["msg"] = 'Coupon Not Saved';
      }
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Save Redeem Points...
  public function save_redeem_point(){
    $save_data['customer_id'] = $_REQUEST['customer_id'];
    $save_data['order_id'] = $_REQUEST['order_id'];
    $save_data['point_use_cnt'] = $_REQUEST['wallet_used_points'];
    $save_data['point_use_date'] = date('d-m-Y');
    $save_data['point_use_time'] = date('h:i:s A');

    $redeem_info = $this->User_Model->get_info_arr2_fields('point_use_id', 'customer_id', $save_data['customer_id'], 'order_id', $save_data['order_id'], '', '', 'point_use');
    if($redeem_info){
      $response["status"] = FALSE;
      $response["msg"] = 'Redeem Point Not Saved. Already used for this Order';
    } else{
      $point_use_id  = $this->User_Model->save_data('point_use', $save_data);
      if($point_use_id){
        $response["status"] = TRUE;
        $response["msg"] = 'Redeem Point Saved Successfully';
      } else{
        $response["status"] = FALSE;
        $response["msg"] = 'Redeem Point Not Saved';
      }
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/******************************************** Order & Payment ***********************************/

  public function get_razorpay_order_id(){
    $final_payment_amt = $_REQUEST['final_payment_amount'];
    $total = ($final_payment_amt*100);
    $key_id = RAZOR_KEY_ID;
    $key_Secret = RAZOR_KEY_SECRET;
    $currency = 'INR';

    $this->load->view('Website/razorpay-php/Razorpay.php');
    $api = new Razorpay\Api\Api($key_id, $key_Secret);

    $orderData = [
        'receipt'         => 3456,
        'amount'          => $total,
        'currency'        => $currency,
        'payment_capture' => 1
    ];
    $razorpayOrder = $api->order->create($orderData);
    $razorpayOrderId = $razorpayOrder['id'];

    if($razorpayOrderId){
      $response["status"] = TRUE;
      $response["msg"] = 'RazorpayOrderId Generated Successfully';
      $response["razorpayOrderId"] = $razorpayOrderId;
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'razorpayOrderId not generated';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }




  public function save_order_product(){
    $order_pro_data['order_id'] = $_REQUEST['order_id'];
    $order_pro_data['product_id'] = $_REQUEST['product_id'];
    $order_pro_data['pro_attri_id'] = $_REQUEST['pro_attri_id'];
    $order_pro_data['order_pro_name'] = $_REQUEST['order_pro_name'];
    $order_pro_data['order_pro_weight'] = $_REQUEST['order_pro_weight'];
    $order_pro_data['order_pro_tot_weight'] = $_REQUEST['order_pro_tot_weight'];
    $order_pro_data['order_pro_unit'] = $_REQUEST['order_pro_unit'];
    $order_pro_data['order_pro_mrp'] = $_REQUEST['order_pro_mrp'];
    $order_pro_data['order_pro_price'] = $_REQUEST['order_pro_price'];
    $order_pro_data['order_pro_dis_per'] = $_REQUEST['order_pro_dis_per'];
    $order_pro_data['order_pro_dis_amt'] = $_REQUEST['order_pro_dis_amt'];
    $order_pro_data['order_pro_gst_per'] = $_REQUEST['order_pro_gst_per'];
    $order_pro_data['order_pro_gst_amt'] = $_REQUEST['order_pro_gst_amt'];
    $order_pro_data['order_pro_qty'] = $_REQUEST['order_pro_qty'];
    $order_pro_data['order_pro_basic_amt'] = $_REQUEST['order_pro_basic_amt'];
    $order_pro_data['order_pro_amt'] = $_REQUEST['order_pro_amt'];
    $order_pro_data['order_pro_date'] = date('d-m-Y h:i:s A');

    $order_pro_id = $this->User_Model->save_data('order_pro', $order_pro_data);
    if($order_pro_id){
      $response["status"] = TRUE;
      $response["msg"] = 'Order Product Saved Successfully';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Order Product Not Saved';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function save_order(){
    $order_data['customer_id'] = $_REQUEST['customer_id'];
    $order_data['order_cust_fname'] = $_REQUEST['customer_fname'];
    $order_data['order_cust_lname'] = $_REQUEST['customer_lname'];
    $order_data['order_cust_addr'] = $_REQUEST['customer_address'];
    $order_data['order_cust_city'] = $_REQUEST['customer_city'];
    $order_data['order_cust_pin'] = $_REQUEST['customer_pin'];
    $order_data['order_cust_mob'] = $_REQUEST['customer_mobile'];
    $order_data['order_cust_email'] = $_REQUEST['customer_email'];

    $order_data['order_amount'] = $_REQUEST['order_amount']; //$cart_total-$gst_amt; // GST is Inclusive...
    $order_data['order_gst'] = $_REQUEST['total_gst_amount'];
    $order_data['order_shipping_amt'] = $_REQUEST['order_shipping_amt'];
    $order_data['order_total_amount'] = $_REQUEST['order_total_amount'];//$cart_total + $shipping_amt;

    $order_data['order_date'] = date('d-m-Y');
    $order_data['payment_status'] = $_REQUEST['payment_status'];
    $order_data['order_added_date'] = date('d-m-Y h:i:s A');
    $order_data['order_addedby'] = 0;

    $order_data['order_no'] = $this->User_Model->get_count_no('order_no', 'order_tbl');

    $order_id = $this->User_Model->save_data('order_tbl', $order_data);

    if($order_id){
      // Add/Save Reward Points if Shop >= 999...
      $response["status"] = TRUE;
      $response["msg"] = 'Order Saved Successfully';

      $cart_total = $order_data['order_amount'] + $order_data['order_gst'];
      if($cart_total >= 999){
        $save_point_add['customer_id'] = $order_data['customer_id '];
        $save_point_add['point_add_type'] = 3;
        $save_point_add['point_add_ref_id'] = $order_id;
        $save_point_add['point_add_cnt'] = 5;
        $save_point_add['point_add_date'] = date('d-m-Y');
        $save_point_add['point_add_time'] = date('h:i:s A');
        $this->User_Model->save_data('point_add', $save_point_add);
        $response["reward_point"] = '5 Reward Points Saved';
      }
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Order Not Saved';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }



/***************************************** Techinal User ***********************************/
  public function add_customer(){
    $save_data['customer_fname'] = $_REQUEST['customer_fname'];
    $save_data['customer_lname'] = $_REQUEST['customer_lname'];
    $save_data['customer_dob'] = $_REQUEST['customer_dob'];
    $save_data['customer_gender'] = $_REQUEST['customer_gender'];
    $save_data['customer_mobile'] = $_REQUEST['customer_mobile'];
    $save_data['customer_email'] = $_REQUEST['customer_email'];
    $save_data['customer_password'] = $_REQUEST['customer_password'];
    $save_data['customer_address'] = $_REQUEST['customer_address'];
    $save_data['customer_city'] = $_REQUEST['customer_city'];
    $save_data['customer_pin'] = $_REQUEST['customer_pin'];
    $save_data['customer_loyalty_no'] = $_REQUEST['customer_loyalty_no'];
    $save_data['customer_credit_lim'] = $_REQUEST['customer_credit_lim'];
    $save_data['customer_addedby'] = $_REQUEST['customer_addedby'];
    $save_data['customer_date'] = date('d-m-Y h:i:s A');

    $check_mob = $this->User_Model->check_duplication('',$save_data['customer_mobile'],'customer_mobile','customer');
    if($check_mob > 0){
      $response["status"] = FALSE;
      $response["msg"] = 'Mobile Number Exist';
    } else{
      $customer_id = $this->User_Model->save_data('customer', $save_data);
      if($customer_id){
        $response["status"] = TRUE;
        $response["msg"] = 'Customer Saved Successfully';
      } else{
        $response["status"] = FALSE;
        $response["msg"] = 'Customer Not Saved';
      }
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Customer Outstanding Amount...
  public function outstanding_amount(){
    $customer_id = $_REQUEST['customer_id'];
    $total_order_amount = $this->User_Model->get_sum('','order_total_amount','customer_id',$customer_id,'','','order_tbl');
    $total_receipt_amount = $this->User_Model->get_sum('','receipt_amt','customer_id',$customer_id,'','','receipt');
    $outstanding_amount = $total_order_amount - $total_receipt_amount;

    $response["status"] = TRUE;
    $response["outstanding_amount"] = $outstanding_amount;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Add Receipt
  public function add_receipt(){
    $save_data['receipt_no'] = $this->User_Model->get_count_no('receipt_no', 'receipt');
    $save_data['receipt_date'] = $_REQUEST['receipt_date'];
    $save_data['customer_id'] = $_REQUEST['customer_id'];
    $save_data['outstanding_amt'] = $_REQUEST['outstanding_amt'];
    $save_data['receipt_amt'] = $_REQUEST['receipt_amt'];
    $save_data['receipt_desc'] = $_REQUEST['receipt_desciption'];
    if( $save_data['receipt_amt'] > $_REQUEST['outstanding_amt']){
      $response["status"] = FALSE;
      $response["msg"] = 'Invalid Recept Amount. Receipt Not Saved';
    } else{
      $receipt_id = $this->User_Model->save_data('receipt', $save_data);
      if($receipt_id){
        $response["status"] = TRUE;
        $response["msg"] = 'Receipt Saved Successfully';
      } else{
        $response["status"] = FALSE;
        $response["msg"] = 'Receipt Not Saved';
      }
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

// Add Employee Cash...
  public function add_employee_cash(){
    $user_mobile = $_REQUEST['employee_mobile_no'];
    $save_data['employee_cash_date'] = $_REQUEST['employee_cash_date'];
    $save_data['employee_cash_amt'] = $_REQUEST['employee_cash_amt'];
    $save_data['employee_cash_desc'] = $_REQUEST['employee_cash_description'];
    $save_data['employee_cash_addedby'] = $_REQUEST['employee_cash_addedby'];
    $save_data['employee_cash_added_date'] = date('d-m-Y h:i:s A');

    $user_info = $this->User_Model->get_info_arr2_fields('user_id', 'user_mobile', $user_mobile, 'role_id !=', '1', '', '', 'user');
    if($user_info){
      $save_data['employee_user_id'] = $user_info[0]['user_id'];
      $receipt_id = $this->User_Model->save_data('employee_cash', $save_data);
      $response["status"] = TRUE;
      $response["msg"] = 'Employee Cash Saved Successfully';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Invalid Mobile Number';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


}
