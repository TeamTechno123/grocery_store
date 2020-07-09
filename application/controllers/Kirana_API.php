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

  // SignUp...
  // public function signup(){
  //   $otp = mt_rand(100000, 999999);
  //   $customer_ref_by = $_REQUEST['customer_ref_by'];
  //   $customer_ref_by = str_replace("KBC-000", "", $customer_ref_by);
  //   $customer_mobile = $_REQUEST['customer_mobile'];
  //   $exist = $this->User_Model->check_duplication('',$customer_mobile,'customer_mobile','customer');
  //   if($exist > 0){
  //     $response["status"] = FALSE;
  //     $response["msg"] = "Mobile Number Exist";
  //   } else{
  //     $save_data = array(
  //       'customer_fname' => $_REQUEST['customer_fname'],
  //       'customer_lname' => $_REQUEST['customer_lname'],
  //       'customer_mobile' => $_REQUEST['customer_mobile'],
  //       'country_id' => $_REQUEST['country_id'],
  //       'state_id' => $_REQUEST['state_id'],
  //       'city_id' => $_REQUEST['city_id'],
  //       'customer_pin' => $_REQUEST['customer_pin'],
  //       'customer_address' => $_REQUEST['customer_address'],
  //       'customer_email' => $_REQUEST['customer_email'],
  //       'customer_password' => $_REQUEST['customer_password'],
  //       'customer_ref_by' => $customer_ref_by,
  //       'otp' => $otp,
  //     );
  //     $this->session->set_userdata($save_data);
  //
  //     $mobile_no = $_REQUEST['customer_mobile'];
  //     $msg = "Welcome to kiranabhara.com. OTP: ".$otp."";
  //     $sms_result = $this->Website_Model->send_sms($mobile_no, $msg);
  //
  //     $response["status"] = TRUE;
  //     $response["msg"] = "OTP Sent";
  //     $response["otp"] = $otp;
  //     $response["customer_ref_by"] = $customer_ref_by;
  //   }
  //   $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  //   echo str_replace('\\/','/',$json_response);
  // }


  // Save SignUp Data.. Save User Refferal Points..
  public function signup(){
    $customer_mobile = $_REQUEST['customer_mobile'];
    $exist = $this->User_Model->check_duplication('',$customer_mobile,'customer_mobile','customer');
    if($exist > 0){
      $response["status"] = FALSE;
      $response["msg"] = "Mobile Number Exist";
    } else{
      $customer_ref_by = $_REQUEST['customer_ref_by'];
      $customer_ref_by_id = str_replace("KBC-000", "", $customer_ref_by);

      $ref_cust_info = $this->User_Model->get_info_arr_fields('customer_id','customer_id', $customer_ref_by_id, 'customer');
      if($ref_cust_info){
        $save_data['customer_ref_by'] = $customer_ref_by_id;
      }

      $save_data = array(
        'customer_fname' => $_REQUEST['customer_fname'],
        'customer_lname' => $_REQUEST['customer_lname'],
        'customer_mobile' => $_REQUEST['customer_mobile'],
        'country_id' => $_REQUEST['country_id'],
        'state_id' => $_REQUEST['state_id'],
        'city_id' => $_REQUEST['city_id'],
        'customer_pin' => $_REQUEST['customer_pin'],
        'customer_address' => $_REQUEST['customer_address'],
        'customer_email' => $_REQUEST['customer_email'],
        'customer_password' => $_REQUEST['customer_password'],
        'device_id' => $_REQUEST['device_id'],
        'customer_date' => date('d-m-Y h:i:s A'),
        'customer_addedby' => 0,
      );

      $customer_id = $this->User_Model->save_data('customer', $save_data);

      if($ref_cust_info){
        $save_point_data = array(
          'customer_id' => $customer_ref_by_id,
          'point_add_type' => 2,
          'point_add_ref_id' => $customer_id,
          'point_add_cnt' => 5,
          'point_add_date' => date('d-m-Y'),
          'point_add_time' => date('h:i:s A'),
        );
        $point_add_id = $this->User_Model->save_data('point_add', $save_point_data);
      }

      $response["status"] = TRUE;
      $response["msg"] = "Signup Successfull";
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


  // SignIn...
  public function sign_in(){
    $mobile_no = $_REQUEST['mobile_no'];
    $password = $_REQUEST['password'];
    $device_id = $_REQUEST['device_id'];

    $login = $this->API_Model->check_login($mobile_no, $password);
    if($login == null){
      $response["status"] = FALSE;
      $response["msg"] = "Invalid Mobile No. or Password";
    } else{
      $customer_id = $login[0]['customer_id'];
      $up_data['device_id'] = $device_id;
      $this->User_Model->update_info('customer_id', $customer_id, 'customer', $up_data);
      $response["status"] = TRUE;
      $response["msg"] = "Login Successfull";
      $response["customer_id"] = $login[0]['customer_id'];
      $response["customer_fname"] = $login[0]['customer_fname'];
      $response["customer_lname"] = $login[0]['customer_lname'];
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
      $response["otp"] = $otp;
      $response["msg"] = "OTP sms sent for Reset Password";
    } else{
      $response["status"] = FALSE;
      $response["msg"] = "Invalid Mobile No.";
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

/****************************************** Wishlist *************************************/

  // Add Wishlist...
  public function add_to_wishlist(){
    $customer_id = $_REQUEST['customer_id'];
    $product_id = $_REQUEST['product_id'];

    $wishlist_info = $this->User_Model->get_info_arr2_fields('wishlist_id', 'product_id', $product_id, 'customer_id', $customer_id, '', '', 'wishlist');
    if($wishlist_info){
      $wishlist_id = $wishlist_info[0]['wishlist_id'];
      $this->User_Model->delete_info('wishlist_id', $wishlist_id, 'wishlist');
      $response["status"] = TRUE;
      $response['msg'] = 'Product Removed from Wishlist';
    } else{
      $save_data['customer_id'] = $customer_id;
      $save_data['product_id'] = $product_id;
      $this->User_Model->save_data('wishlist', $save_data);
      $response["status"] = TRUE;
      $response['msg'] = 'Product Added to Wishlist Successfully';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }
  // WishList...
  public function wishlist(){
    $customer_id = $_REQUEST['customer_id'];
    $product_list = $this->Website_Model->wishlist($customer_id);
    if ($product_list) {
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');

        $product_list1->product_attribute_list = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $product_list1->product_img_list = $product_img_list;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/********************************************* Get List ****************************************/
  public function notification_list(){
    $notification_list = $this->User_Model->get_list2('notification_id','DESC','notification');
    if($notification_list){
      $response["status"] = TRUE;
      $response["notification_list"] = $notification_list;
    } else{
      $response["status"] = FALSE;
      $response["notification_list"] = $notification_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Country List...
  public function country_list(){
    $country_list = $this->User_Model->get_list2('country_name','ASC','country');
    if($country_list){
      $response["status"] = TRUE;
      $response["country_list"] = $country_list;
    } else{
      $response["status"] = FALSE;
      $response["country_list"] = $country_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // State List by Country...
  public function state_list(){
    $country_id = $_REQUEST['country_id'];
    $state_list = $this->User_Model->get_list_by_id2('state_id, country_id, state_name','country_id',$country_id,'state');
    if($state_list){
      $response["status"] = TRUE;
      $response["state_list"] = $state_list;
    } else {
      $response["status"] = FALSE;
      $response["state_list"] = $state_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // City(District) List by State...
  public function city_list(){
    $state_id = $_REQUEST['state_id'];
    $city_list = $this->User_Model->get_list_by_id2('district_id as city_id , state_id, district_name as city_name','state_id',$state_id,'district');
    if($city_list) {
      $response["status"] = TRUE;
      $response["city_list"] = $city_list;
    } else {
      $response["status"] = FALSE;
      $response["city_list"] = $city_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Area List... Added by Admin as Tahsil for Pincode...
  public function area_list(){
    $area_list = $this->User_Model->get_list_by_id2('tahsil_id  as area_id, tahsil_name as area_name','tahsil_status',1,'tahsil');
    if($area_list) {
      $response["status"] = TRUE;
      $response["area_list"] = $area_list;
    } else {
      $response["status"] = FALSE;
      $response["area_list"] = $area_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Pincode List By Area (tahsil_id)...
  public function pincode_list(){
    $area_id = $_REQUEST['area_id'];
    $pincode_list = $this->User_Model->get_list_by_id2('tahsil_pincode_area as pincode_area , tahsil_pincode_no as pincode_no','tahsil_id',$area_id,'tahsil_pincode');
    if($pincode_list) {
      $response["status"] = TRUE;
      $response["pincode_list"] = $pincode_list;
    } else {
      $response["status"] = FALSE;
      $response["pincode_list"] = $pincode_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*********************************************** Product *****************************************/
  // Brand List...
  public function brand_list(){
    $brand_list = $this->User_Model->get_list_by_id2('manufacturer_id, manufacturer_name, manufacturer_img','manufacturer_status',1,'manufacturer');
    if ($brand_list) {
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/manufacturer/';
      $response["brand_list"] = $brand_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/manufacturer/';
      $response["brand_list"] = $brand_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Main Category List...
  public function main_category_list(){
    $main_category_list = $this->User_Model->get_list_by_id_fields('category_id, category_name, category_img','category_status',1,'is_main',1,'','','category_name','ASC','category');

    if ($main_category_list) {
      foreach ($main_category_list as $main_category_list1) {
        $main_category_id = $main_category_list1->category_id;
        //Sub Category List...
        $sub_category_list = $this->User_Model->get_list_by_id_fields('category_id, category_name, category_img','category_status',1,'is_main',0,'main_category_id',$main_category_id,'category_name','ASC','category');
        $main_category_list1->sub_category_list = $sub_category_list;
        // Brand List...
        $brand_list = $this->Website_Model->get_brand_category($main_category_id);
        $main_category_list1->brand_list = $brand_list;
      }

      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/category/';
      $response["brand_img_path"] = base_url().'assets/images/manufacturer/';
      $response["main_category_list"] = $main_category_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/category/';
      $response["brand_img_path"] = base_url().'assets/images/manufacturer/';
      $response["main_category_list"] = $main_category_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Sub Category List...
  public function sub_category_list(){
    $main_category_id = $_REQUEST['main_category_id'];
    $sub_category_list = $this->User_Model->get_list_by_id_fields('category_id, category_name, category_img','category_status',1,'is_main',0,'main_category_id',$main_category_id,'category_name','ASC','category');
    if ($sub_category_list) {
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/category/';
      $response["sub_category_list"] = $sub_category_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/category/';
      $response["sub_category_list"] = $sub_category_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Brand...
  public function product_list_by_brand(){
    $brand_id = $_REQUEST['brand_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'manufacturer_id',$brand_id,'','','product_name','ASC','product');
    if ($product_list) {
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');

        $product_list1->product_attribute_list = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $product_list1->product_img_list = $product_img_list;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Main Category...
  public function product_list_by_main_category(){
    $main_category_id = $_REQUEST['main_category_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'main_category_id',$main_category_id,'','','product_name','ASC','product');
    if ($product_list) {
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');
        $product_list1->product_attribute_list = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $product_list1->product_img_list = $product_img_list;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product List By Main Category...
  public function product_list_by_sub_category(){
    $sub_category_id = $_REQUEST['sub_category_id'];
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'category_id',$sub_category_id,'','','product_name','ASC','product');
    if ($product_list) {
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');
        $product_list1->product_attribute_list = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $product_list1->product_img_list = $product_img_list;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product Attribute...
  public function product_attribute(){
    $product_id = $_REQUEST['product_id'];
    $product_info = $this->User_Model->get_info_arr_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_id', $product_id, 'product');
    $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
    // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id ','ASC','product_attribute');
    if($product_info && $product_attribute_list){
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_info"] = $product_info[0];
      $response["product_attribute_list"] = $product_attribute_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_info"] = $product_info[0];
      $response["product_attribute_list"] = $product_attribute_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Featured Product List...
  public function featured_product_list(){
    $product_list = $this->User_Model->get_list_by_id_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_status',1,'is_feature',1,'','','product_name','ASC','product');
    if ($product_list) {
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');
        $product_list1->product_attribute_list = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $product_list1->product_img_list = $product_img_list;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_list"] = $product_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Product main categorywise its subcategory and brand list
  public function brand_list_by_category(){
    $main_category_id = $_REQUEST['main_category_id'];
    $brand_list = $this->Website_Model->get_brand_category($main_category_id);
    $sub_category_list = $this->User_Model->get_list_by_id('main_category_id',$main_category_id,'category_status',1,'category_name','ASC','category');
    if ($brand_list && $sub_category_list) {
      $response["status"] = TRUE;
      $response["brand_img_path"] = base_url().'assets/images/manufacturer/';
      $response["category_img_path"] = base_url().'assets/images/category/';
      $response["brand_list"] = $brand_list;
      $response["sub_category_list"] = $sub_category_list;
    } else{
      $response["status"] = FALSE;
      $response["brand_img_path"] = base_url().'assets/images/manufacturer/';
      $response["category_img_path"] = base_url().'assets/images/category/';
      $response["brand_list"] = $brand_list;
      $response["sub_category_list"] = $sub_category_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Search Result...
  public function search_result(){
    $search_keyword = $_REQUEST['search_keyword'];
    $product_list = $this->Website_Model->search_result($search_keyword);
    $product_cnt = 0;
    if ($product_list) {
      $search_product_list = array();
      $i = 0;
      foreach ($product_list as $product_list1) {
        $product_id = $product_list1->product_id;
        $product_attribute_list = $this->API_Model->product_attribute_list($product_id);
        // $product_attribute_list = $this->User_Model->get_list_by_id_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt','pro_attri_status',1,'product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');
        $search_product_list[$i]['product_id'] = $product_list1->product_id;
        $search_product_list[$i]['product_name'] = $product_list1->product_name;
        $search_product_list[$i]['tax_rate'] = $product_list1->tax_rate;
        $search_product_list[$i]['min_ord_limit'] = $product_list1->min_ord_limit;
        $search_product_list[$i]['max_ord_limit'] = $product_list1->max_ord_limit;
        $search_product_list[$i]['product_unit'] = $product_list1->product_unit;
        $search_product_list[$i]['product_details'] = $product_list1->product_details;
        $search_product_list[$i]['product_img'] = $product_list1->product_img;
        $search_product_list[$i]['product_attribute_list'] = $product_attribute_list;
        $product_img_list = $this->User_Model->get_list_by_id_fields('product_images_id, product_images_name','product_id',$product_id,'','','','','product_images_id','ASC','product_images');
        $search_product_list[$i]['product_img_list'] = $product_img_list;
        $i++;
        $product_cnt++;
      }
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_count"] = $product_cnt;
      $response["product_list"] = $search_product_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/product/';
      $response["product_count"] = $product_cnt;
      $response["product_list"] = $search_product_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************** App Dynamic Contents ********************************************/

  public function banners_list(){
    $banners_list = $this->User_Model->get_list_by_id_fields('*','slider_status',1,'','','','','slider_id','ASC','slider');
    if ($banners_list) {
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/slider/';
      $response["banners_list"] = $banners_list;
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/slider/';
      $response["banners_list"] = $banners_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************** User Interactions **************************************************/
  // Check Available Pincode...
  public function check_pincode(){
    // $area_id = $_REQUEST['area_id'];
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
    $fields = "customer_id, customer_fname, customer_lname, customer_dob, customer_gender, customer_mobile, customer_email, customer_password, customer_address, country_id, state_id, city_id, customer_pin, customer_img, customer_loyalty_no, customer_credit_lim, customer_status, customer_ref_by, customer_addedby, customer_date";
    $customer_info = $this->User_Model->get_info_arr2_fields($fields, 'customer_id', $customer_id, '', '', '', '', 'customer');
    if ($customer_info) {
      $response["status"] = TRUE;
      $response["img_path"] = base_url().'assets/images/customer/';
      $response["customer_info"] = $customer_info[0];
    } else {
      $response["status"] = FALSE;
      $response["img_path"] = base_url().'assets/images/customer/';
      $response["customer_info"] = $customer_info[0];
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Update Profile...
  public function update_profile(){
    $customer_id = $_REQUEST['customer_id'];
    $customer_mobile = $_REQUEST['customer_mobile'];

    $customer_info = $this->User_Model->get_info_arr2_fields('customer_id', 'customer_mobile', $customer_mobile, 'customer_id !=', $customer_id, '', '', 'customer');
    if($customer_info){
      $response["status"] = FALSE;
      $response["msg"] = 'Mobile Number Exist';
    } else{
      $update_data = array(
        'customer_fname' => $_REQUEST['customer_fname'],
        'customer_lname' => $_REQUEST['customer_lname'],
        'customer_mobile' => $_REQUEST['customer_mobile'],
        'customer_address' => $_REQUEST['customer_address'],
        'country_id' => $_REQUEST['country_id'],
        'state_id' => $_REQUEST['state_id'],
        'city_id' => $_REQUEST['city_id'],
        'customer_pin' => $_REQUEST['customer_pin'],
        'customer_email' => $_REQUEST['customer_email'],
        'customer_password' => $_REQUEST['customer_password'],
        'customer_dob' => $_REQUEST['customer_dob'],
        'customer_gender' => $_REQUEST['customer_gender'],
        'customer_date' => date('d-m-Y h:i:s A'),
      );
      $this->User_Model->update_info('customer_id', $customer_id, 'customer', $update_data);
      $response["status"] = TRUE;
      $response["msg"] = 'Profile Updated Successfully';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Update Profile Image ...
  public function update_profile_image(){
    $customer_id = $_REQUEST['customer_id'];
    $old_img = $_REQUEST['old_customer_img'];

    if(isset($_FILES['customer_img']['name'])){
       $time = time();
       $image_name = 'customer_'.$customer_id.'_'.$time;
       $config['upload_path'] = 'assets/images/customer/';
       $config['allowed_types'] = 'png|jpg|jpeg|gif';
       $config['file_name'] = $image_name;
       $filename = $_FILES['customer_img']['name'];
       $ext = pathinfo($filename, PATHINFO_EXTENSION);
       $this->upload->initialize($config);
       if ($this->upload->do_upload('customer_img') && $image_name && $filename){
         $up_image['customer_img'] = $image_name.'.'.$ext;
         $this->User_Model->update_info('customer_id', $customer_id, 'customer', $up_image);
         // Delete Old Profile Image...
         if($old_img){ unlink("assets/images/customer/".$old_img); }
         $response["status"] = TRUE;
         $response["msg"] = 'Profile Image Uploaded Successfully';
       }
       else{
         $error = $this->upload->display_errors();
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

/***************************************** Membership **********************************/
  // Membership List...
   public function membership_scheme_list(){
     $customer_id = $_REQUEST['customer_id'];
     $today = date('d-m-Y');
     $membership_scheme_list = $this->Website_Model->membership_scheme_list();
     foreach ($membership_scheme_list as $membership_scheme_list1) {
       $mem_sch_id = $membership_scheme_list1->mem_sch_id;
       $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $customer_id, 'cust_mem_status', 1, 'mem_sch_id', $mem_sch_id, 'cust_membership');
       if($cust_mem_info && strtotime($cust_mem_info[0]['cust_mem_end_date']) > strtotime($today)){
         $membership_scheme_list1->customer_mem_status = 'active';
       } else{
         $membership_scheme_list1->customer_mem_status = 'inactive';
       }
     }
     $response["status"] = TRUE;
     $response["membership_scheme_list"] = $membership_scheme_list;
     $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
     echo str_replace('\\/','/',$json_response);
   }

   // Membership Scheme Details...
   public function membership_scheme_details(){
     $mem_sch_id = $_REQUEST['mem_sch_id'];
     $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
     if($membership_info){
       $membership_details_list = $this->User_Model->get_list_by_id2('*','mem_sch_id',$mem_sch_id,'mem_sch_details');
       $membership_info[0]['membership_details_list'] = $membership_details_list;

       $response["status"] = TRUE;
       $response["msg"] = 'Membership Scheme Details';
       $response["membership_scheme_details"] = $membership_info[0];
     } else{
       $response["status"] = FALSE;
       $response["msg"] = 'Invalid Membership';
       $response["membership_scheme_details"] = $membership_info[0];
     }

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

  // Add Membership...
  public function add_membership(){
    $customer_id = $_REQUEST['customer_id'];
    $mem_sch_id = $_REQUEST['membership_scheme_id'];
    $razorpay_payment_id = $_REQUEST['razorpay_payment_id'];
    $razorpay_order_id = $_REQUEST['razorpay_order_id'];
    // $razorpay_signature = $_POST['razorpay_signature'];
    $today = date('d-m-Y');

    $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
    $mem_sch_valid = $membership_info[0]['mem_sch_valid'];
    $cust_mem_end_date = date('d-m-Y', strtotime("+".$mem_sch_valid." days"));
    $save_data = $arrayName = array(
      'customer_id' => $customer_id,
      'mem_sch_id' => $mem_sch_id,
      'cust_mem_start_date' => $today,
      'cust_mem_end_date' => $cust_mem_end_date,
      'cust_mem_valid_days' => $mem_sch_valid,
      'cust_mem_amt' => $membership_info[0]['mem_sch_amt'],
      'cust_mem_point' => $membership_info[0]['mem_sch_point'],
      'cust_mem_status' => 1,
      'cust_mem_date' => date('d-m-Y h:i:s A'),
      'razorpay_payment_id' => $razorpay_payment_id,
      'razorpay_order_id' => $razorpay_order_id,
    );
    $cust_mem_id = $this->User_Model->save_data('cust_membership', $save_data);
    if($cust_mem_id){
      $response["status"] = TRUE;
      $response['msg'] = 'Membership Added Successfully';
    } else{
      $response["status"] = FALSE;
      $response['msg'] = 'Membership Not Added';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/*********************************************** Order Details *********************************************************/

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
        $response["status"] = TRUE;
        $response["msg"] = "Order Uploaded";
      }
      else{
        $error = $this->upload->display_errors();
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
    foreach ($order_list as $order_list1) {
      // Status...
      $order_status_id = $order_list1->order_status;
      $status_info = $this->User_Model->get_info_arr2_fields('order_status_name', 'order_status_id', $order_status_id, '', '', '', '', 'order_status');
      $order_status_name = '';
      if($status_info){ $order_status_name =  $status_info[0]['order_status_name']; }
      $order_list1->order_status_name = $order_status_name;

      // City...
      $city_id = $order_list1->city_id;
      $city_info = $this->User_Model->get_info_arr2_fields('district_name as city_name', 'district_id', $city_id, '', '', '', '', 'district');
      $city_name = '';
      if($city_info){ $city_name =  $city_info[0]['city_name']; }
      $order_list1->city_name = $city_name;

      // Coupon Amount...
      $order_id = $order_list1->order_id;
      $coupon_used_info = $this->User_Model->get_info_arr2_fields('coupon_used_dis_amt', 'order_id', $order_id, '', '', '', '', 'coupon_used');
      $coupon_used_dis_amt = "0";
      if($coupon_used_info){ $coupon_used_dis_amt =  $coupon_used_info[0]['coupon_used_dis_amt']; }
      $order_list1->coupon_used_amt = $coupon_used_dis_amt;

      // Redeem Point Used...
      $redeem_point_info = $this->User_Model->get_info_arr2_fields('point_use_cnt', 'order_id', $order_id, '', '', '', '', 'point_use');
      $point_use_cnt = "0";
      if($redeem_point_info){ $point_use_cnt =  $redeem_point_info[0]['point_use_cnt']; }
      $order_list1->redeem_point_amt = $point_use_cnt;

      // Cart Amount...
      $order_total_amount = $order_list1->order_total_amount;
      $cart_amount =  $order_total_amount - $order_list1->order_shipping_amt;
      $order_list1->cart_amount = $cart_amount;

      // Pay amount
      $pay_amount = $order_total_amount - ($coupon_used_dis_amt + $point_use_cnt);
      $order_list1->pay_amount = $pay_amount;
    }
    if ($order_list) {
      $response["status"] = TRUE;
      $response["customer_order_list"] = $order_list;
    } else {
      $response["status"] = FALSE;
      $response["customer_order_list"] = $order_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Order Details - Product List.
  public function customer_order_details_list(){
    $order_id = $_REQUEST['order_id'];
    $order_details_list = $this->User_Model->get_list_by_id('order_id',$order_id,'','','order_pro_id ','ASC','order_pro');
    foreach ($order_details_list as $order_details_list1) {
      $product_id = $order_details_list1->product_id;
      $product_info = $this->User_Model->get_info_arr2_fields('product_img', 'product_id', $product_id, '', '', '', '', 'product');
      $product_img = 0;
      if($product_info){ $product_img =  $product_info[0]['product_img']; }
      $order_details_list1->product_img = base_url().'assets/images/product/'.$product_img;
    }
    if ($order_details_list) {
      $response["status"] = TRUE;
      $response["order_details_list"] = $order_details_list;
    } else {
      $response["status"] = FALSE;
      $response["order_details_list"] = $order_details_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Track Order...
  public function order_tracking(){
    $order_id = $_REQUEST['order_id'];

    $order_status_list = $this->User_Model->get_list_by_id_fields('order_status_id, order_status_name','','','','','','','order_status_id','ASC','order_status');
    foreach ($order_status_list as $order_status_list1) {
      $order_status_id = $order_status_list1->order_status_id;
      $order_details = $this->User_Model->get_info_arr2_fields('order_id', 'order_id', $order_id, 'order_status', $order_status_id, '', '', 'order_tbl');
      if($order_details){
        $order_status_list1->status = "active";
      } else{
        $order_status_list1->status = "inactive";
      }
      // code...
    }



    // $order_status_info = $this->User_Model->get_info_arr_fields('order_status','order_id', $order_id, 'order_tbl');
    // $order_status_id = $order_status_info[0]['order_status'];
    // $order_status_info2 = $this->User_Model->get_info_arr_fields('order_status_name','order_status_id', $order_status_id, 'order_status');
    // $order_status_name = $order_status_info2[0]['order_status_name'];

    $response["status"] = TRUE;
    $response["order_id"] = $order_id;
    $response["order_status_list"] = $order_status_list;
    // $response["order_status_name"] = $order_status_name;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/******************************************* Wallet ***************************************************/

  public function wallet_balance(){
    $customer_id = $_REQUEST['customer_id'];
    $point_add_cnt = $this->User_Model->get_sum('','point_add_cnt','customer_id',$customer_id,'','','point_add');
    $point_use_cnt = $this->User_Model->get_sum('','point_use_cnt','customer_id',$customer_id,'point_use_status','1','point_use');

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

    if($wallet_add_activity_list || $wallet_use_activity_list){
      $response["status"] = TRUE;
      $response["wallet_add_activity_list"] = $wallet_add_activity_list;
      $response["wallet_use_activity_list"] = $wallet_use_activity_list;
    } else{
      $response["status"] = FALSE;
      $response["wallet_add_activity_list"] = $wallet_add_activity_list;
      $response["wallet_use_activity_list"] = $wallet_use_activity_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Save Wallet Data.... Add Payment To Wallet...
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
    if($wallet_add_id){
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
    } else {
      $response["status"] = FALSE;
      $response["msg"] = 'Wallet Amount Not Added';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

/****************************************************************************************************************/

  // Cookbook Contest...
  public function add_cookbook_contest_reg(){
    $save_data['customer_id'] = $_REQUEST['customer_id'];
    $save_data['cookbook_reg_name'] = $_REQUEST['name'];
    $save_data['cookbook_reg_addr'] = $_REQUEST['address'];
    $save_data['cookbook_reg_mobile'] = $_REQUEST['mobile_no'];
    $save_data['cookbook_reg_email'] = $_REQUEST['email'];
    $save_data['cookbook_reg_date'] = date('d-m-Y h:i:s A');
    $cookbook_reg_id = $this->User_Model->save_data('cookbook_reg', $save_data);
    if($cookbook_reg_id){
      $response["status"] = TRUE;
      $response["msg"] = 'Successfully Registered for Cookbook Contest';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Not Saved';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // // Request Product View/Save...
  public function request_product(){
    $save_data['req_product_name'] = $_REQUEST['req_product_name'];
    $save_data['req_product_person'] = $_REQUEST['req_product_person'];
    $save_data['req_product_email'] = $_REQUEST['req_product_email'];
    $save_data['req_product_mobile'] = $_REQUEST['req_product_mobile'];
    $save_data['req_product_msg'] = $_REQUEST['req_product_msg'];
    $save_data['req_product_date'] = date('d-m-Y h:i:s A');
    $req_product_id = $this->User_Model->save_data('req_product', $save_data);
    if($req_product_id){
      $response["status"] = TRUE;
      $response["msg"] = "Product Request Saved Successfully";
    } else {
      $response["status"] = FALSE;
      $response["msg"] = "Product Request Not Saved";
    }
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

    $reseller_reg_id = $this->User_Model->save_data('reseller_reg', $save_data);
    if ($reseller_reg_id) {
      $response["status"] = TRUE;
      $response["msg"] = "Become Resller Data Saved Successfuly";
    } else {
      $response["status"] = FALSE;
      $response["msg"] = "Become Resller Data Not Saved";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Offers List...
  public function offers_list(){
    $offers_list = $this->User_Model->get_list_by_id3('offer_status',1,'','','','','offer_id','DESC','offer');
    if ($offers_list) {
      $response["status"] = TRUE;
      $response["offers_list"] = $offers_list;
    } else {
      $response["status"] = FALSE;
      $response["offers_list"] = $offers_list;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


/********************************************* Delivery Address ***********************************/

  // Add Delivery Address...
  public function add_delivery_address(){
    $save_data['customer_id'] = $_REQUEST['customer_id'];
    $save_data['address_title'] = $_REQUEST['address_title'];
    $save_data['address'] = $_REQUEST['address'];
    $save_data['country_id'] = $_REQUEST['country_id'];
    $save_data['state_id'] = $_REQUEST['state_id'];
    $save_data['city_id'] = $_REQUEST['city_id'];
    $save_data['pincode'] = $_REQUEST['pincode'];

    $is_default = $_REQUEST['is_default'];
    $customer_id = $_REQUEST['customer_id'];

    $address_id = $this->User_Model->save_data('delivery_address', $save_data);
    if ($address_id) {
      if($is_default == 1){
        $up_data1['is_default'] = 0;
        $this->User_Model->update_info('customer_id', $customer_id, 'delivery_address', $up_data1);
        $up_data2['is_default'] = 1;
        $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $up_data2);
      }
      $response["status"] = TRUE;
      $response["msg"] = "Address Saved Successfuly";
    } else {
      $response["status"] = FALSE;
      $response["msg"] = "Address Not Saved";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Update Delivery Address...
  public function update_delivery_address(){
    $address_id = $_REQUEST['address_id'];
    $update_data['address_title'] = $_REQUEST['address_title'];
    $update_data['address'] = $_REQUEST['address'];
    $update_data['country_id'] = $_REQUEST['country_id'];
    $update_data['state_id'] = $_REQUEST['state_id'];
    $update_data['city_id'] = $_REQUEST['city_id'];
    $update_data['pincode'] = $_REQUEST['pincode'];
    $is_default = $_REQUEST['is_default'];
    $customer_id = $_REQUEST['customer_id'];

    $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $update_data);

    if($is_default == 1){
      $up_data1['is_default'] = 0;
      $this->User_Model->update_info('customer_id', $customer_id, 'delivery_address', $up_data1);
      $up_data2['is_default'] = 1;
      $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $up_data2);
    }

    $response["status"] = TRUE;
    $response["msg"] = "Address Updated Successfuly";
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Delete Delivery Address...
  public function delete_delivery_address(){
    $address_id = $_REQUEST['address_id'];
    $address_data = $this->User_Model->get_info_arr2_fields('address_id', 'address_id', $address_id, 'is_default', 1, '', '', 'delivery_address');
    if($address_data){
      $response["status"] = FALSE;
      $response["msg"] = "Can not delete default address";
    } else{
      $this->User_Model->delete_info('address_id', $address_id, 'delivery_address');
      $response["status"] = TRUE;
      $response["msg"] = "Address Deleted Successfuly";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Make Default Address...
  public function default_delivery_address(){
    $customer_id = $_REQUEST['customer_id'];
    $address_id = $_REQUEST['address_id'];

    $up_data1['is_default'] = 0;
    $this->User_Model->update_info('customer_id', $customer_id, 'delivery_address', $up_data1);
    $up_data2['is_default'] = 1;
    $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $up_data2);
    $response["status"] = TRUE;
    $response["msg"] = "Updated Successfuly";

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
      $coupon_used_count = $this->User_Model->get_count('coupon_used_id','coupon_id',$coupon_info[0]['coupon_id'],'customer_id',$customer_id,'coupon_used_status','1','coupon_used');
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


  // Timeslot List...
  public function timeslot_list(){
    $timeslot_list = $this->User_Model->get_list_by_id_fields('timeslot_id, timeslot_start_time, timeslot_end_time','timeslot_status','1','','','','','timeslot_id','DESC','timeslot');
    $i = 0;
    $list = array();
    foreach ($timeslot_list as $timeslot_list1) {
      if(time() < strtotime($timeslot_list1->timeslot_end_time)){
        $list[$i]['timeslot_id'] = $timeslot_list1->timeslot_id;
        $list[$i]['timeslot_start_time'] = $timeslot_list1->timeslot_start_time;
        $list[$i]['timeslot_end_time'] = $timeslot_list1->timeslot_end_time;
      }
      $i++;
    }

    if($timeslot_list){
      $response["status"] = TRUE;
      $response["timeslot_list"] = $list;
    } else{
      $response["status"] = FALSE;
      $response["timeslot_list"] = $list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }


  // Timeslot List...
  public function address_list(){
    $customer_id = $_REQUEST['customer_id'];
    $address_list = $this->User_Model->get_list_by_id3('customer_id',$customer_id,'','','','','address_id','DESC','delivery_address');
    foreach ($address_list as $address_list1) {
      $country_info = $this->User_Model->get_info_arr_fields('country_name','country_id', $address_list1->country_id, 'country');
      $state_info = $this->User_Model->get_info_arr_fields('state_name','state_id', $address_list1->state_id, 'state');
      $city_info = $this->User_Model->get_info_arr_fields('district_name as city_name','district_id', $address_list1->city_id, 'district');

      $address_list1->country_name = $country_info[0]['country_name'];
      $address_list1->state_name = $state_info[0]['state_name'];
      $address_list1->city_name = $city_info[0]['city_name'];
    }

    if($address_list){
      $response["status"] = TRUE;
      $response["address_list"] = $address_list;
    } else{
      $response["status"] = FALSE;
      $response["address_list"] = $address_list;
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }



// Place Order... Save Order Data.. Save Product Data.. Save Used Coupon... Save Redeem Point...
  public function place_order(){
    $customer_id = $_REQUEST['customer_id'];
    $razorpay_payment_id = $_REQUEST['razorpay_payment_id'];
    $online_payment_amt = $_REQUEST['online_payment_amt'];

    $current_date = date('d-m-Y');
    $current_time = date('h:i:s A');

    /********************* Save Order Data **************/
    $save_order_data['customer_id'] = $customer_id;
    $save_order_data['order_cust_fname'] = $_REQUEST['customer_fname'];
    $save_order_data['order_cust_lname'] = $_REQUEST['customer_lname'];

    // $save_order_data['order_cust_addr'] = $_REQUEST['customer_address'];
    // $save_order_data['city_id'] = $_REQUEST['city_id'];
    // $save_order_data['order_cust_pin'] = $_REQUEST['customer_pin'];

    $save_order_data['order_cust_mob'] = $_REQUEST['customer_mobile'];
    $save_order_data['order_cust_email'] = $_REQUEST['customer_email'];

    // $save_order_data['order_amount'] = $_REQUEST['order_amount']; //$cart_total-$gst_amt; // GST is Inclusive...
    // $save_order_data['order_gst'] = $_REQUEST['total_gst_amount']; // Calculate Inclusive GST...

    $save_order_data['order_shipping_amt'] = $_REQUEST['order_shipping_amt']; // Shipping Amount is 100Rs if cart_total < 799Rs.
    $save_order_data['order_total_amount'] = $_REQUEST['order_total_amount']; // $cart_total + $shipping_amt;

    $save_order_data['order_date'] = date('d-m-Y');
    $save_order_data['payment_status'] = $_REQUEST['payment_status'];
    $save_order_data['order_added_date'] = date('d-m-Y h:i:s A');
    $save_order_data['order_addedby'] = 0;
    $save_order_data['order_no'] = $this->User_Model->get_count_no('order_no', 'order_tbl');

    $save_order_data['order_timeslot_date'] = $_REQUEST['order_timeslot_date'];
    $save_order_data['order_timeslot_time'] = $_REQUEST['order_timeslot_time'];
    $address_id = $_REQUEST['address_id'];
    $address_data = $country_info = $this->User_Model->get_info_arr_fields('*','address_id', $address_id, 'delivery_address');
    $save_order_data['order_cust_addr'] = $address_data[0]['address'];
    $save_order_data['country_id'] = $address_data[0]['country_id'];
    $save_order_data['state_id'] = $address_data[0]['state_id'];
    $save_order_data['city_id'] = $address_data[0]['city_id'];
    $save_order_data['order_cust_pin'] = $address_data[0]['pincode'];

    $order_id = $this->User_Model->save_data('order_tbl', $save_order_data);

    if($order_id){
      // Add/Save Reward Points if Shop >= 999...
      $response["status"] = TRUE;
      $response["msg"] = 'Order Saved Successfully';

      $cart_total = $_REQUEST['order_total_amount'] - $_REQUEST['order_shipping_amt'];
      if($cart_total >= 999){
        $save_point_add['customer_id'] = $customer_id;
        $save_point_add['point_add_type'] = 3;
        $save_point_add['point_add_ref_id'] = $order_id;
        $save_point_add['point_add_cnt'] = 5;
        $save_point_add['point_add_date'] = $current_date;
        $save_point_add['point_add_time'] = $current_time;
        $this->User_Model->save_data('point_add', $save_point_add);
        $response["reward_point_msg"] = '5 Reward Points Saved';
      }

      /****************** Save Order Product ****************/


      if($_POST['order_product']){
        $total_gst_amount = "0";
        $i = 0;
        foreach($_POST['order_product'] as $order_product_data){
          $product_id = $order_product_data['product_id'];
          $pro_attri_id = $order_product_data['pro_attri_id'];
          $order_pro_qty = $order_product_data['order_pro_qty'];
          $order_pro_weight = $order_product_data['order_pro_weight'];
          $order_pro_qty = $order_product_data['order_pro_qty'];
          $order_pro_price = $order_product_data['order_pro_price'];

          $product_details = $this->User_Model->get_info_arr_fields('product_id, product_name, tax_rate, min_ord_limit, max_ord_limit, product_unit, product_details, product_img','product_id', $product_id, 'product');
          $product_attribute_details = $this->User_Model->get_info_arr_fields('pro_attri_id, product_id, pro_attri_weight, pro_attri_mrp, pro_attri_price, pro_attri_dis_per, pro_attri_dis_amt', 'pro_attri_id', $pro_attri_id, 'product_attribute');

          $pro_attri_dis_amt = $product_attribute_details[0]['pro_attri_dis_amt'];
          $order_pro_gst_per = $product_details[0]['tax_rate'];

          $order_pro_dis_amt = $order_pro_gst_per * $order_pro_qty;
          $order_pro_amt = $order_pro_price * $order_pro_qty;
          $order_pro_gst_amt = $order_pro_amt - ($order_pro_amt * (100/(100 + $order_pro_gst_per)));
          $order_pro_basic_amt = $order_pro_amt - $order_pro_gst_amt;

          $order_product_data['order_pro_dis_amt'] = $order_pro_dis_amt;
          $order_product_data['order_pro_gst_per'] = $order_pro_gst_per;
          $order_product_data['order_pro_gst_amt'] = $order_pro_gst_amt;
          $order_product_data['order_pro_basic_amt'] = $order_pro_basic_amt;
          $order_product_data['order_pro_amt'] = $order_pro_amt;
          $order_product_data['order_id'] = $order_id;
          $order_product_data['order_pro_date'] = date('d-m-Y h:i:s A');
          $order_product_data['order_pro_tot_weight'] = $order_pro_weight * $order_pro_qty;
          $order_pro_id = $this->User_Model->save_data('order_pro', $order_product_data);

          $total_gst_amount = $total_gst_amount + $order_pro_gst_amt;
          $i++;
          if($order_pro_id){
            $response["order_product_msg_".$i] = 'Order Product '.$i.' Saved Successfully';
          } else{
            $response["order_product_msg_".$i] = 'Order Product '.$i.' Not Saved';
          }
        }
        $cart_total = $_REQUEST['order_total_amount'] - $_REQUEST['order_shipping_amt'];
        $order_amount = $cart_total - $total_gst_amount;
        // Update total_gst_amount & order_amount in order_tbl...
        $update_order_data['order_gst'] = $total_gst_amount;
        $update_order_data['order_amount'] = $order_amount;
        $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_order_data);
      } else{
        $response["order_product_msg"] = 'Order Product Not Saved';
      }

      /******** Save Online Payment Data *********/

      if($_REQUEST['coupon_used_dis_amt'] > 0 ){ $coupon_used_dis_amt = $_REQUEST['coupon_used_dis_amt']; }
      else{ $coupon_used_dis_amt = 0; }

      if($_REQUEST['wallet_used_points'] > 0 ){ $wallet_used_points = $_REQUEST['wallet_used_points']; }
      else{ $wallet_used_points = 0; }


      if($razorpay_payment_id && $_REQUEST['payment_status'] == 1){
        $save_online_pay['customer_id'] = $customer_id;
        $save_online_pay['order_id'] = $order_id;
        $save_online_pay['razorpay_payment_id'] = $razorpay_payment_id;
        // $save_online_pay['razorpay_order_id'] = $razorpay_order_id;
        $save_online_pay['online_payment_amt'] = $online_payment_amt;
        $save_online_pay['cart_amount'] = $_REQUEST['order_total_amount'] - $_REQUEST['order_shipping_amt'];
        $save_online_pay['shipping_amt'] = $_REQUEST['order_shipping_amt'];
        $save_online_pay['total_pay_amt'] =  $_REQUEST['order_total_amount'];
        $save_online_pay['coupon_use_amt'] = $coupon_used_dis_amt;
        $save_online_pay['point_use_amt'] = $wallet_used_points;
        $save_online_pay['online_payment_date'] = $current_date;
        $save_online_pay['online_payment_time'] = $current_time;
        $online_payment_id = $this->User_Model->save_data('order_online_payment', $save_online_pay);
        if($online_payment_id){
          $response["online_payment_msg"] = 'Payment Data Saved Successfully';
        } else{
          $response["online_payment_msg"] = 'Payment Data Not Saved';
        }
        $update_payment_type['payment_type'] = "1";  // Online Payment.
        $update_payment_type['payment_status'] = "1";  // Paid.
      } else{
        $update_payment_type['payment_type'] = "2";  // Cash On Delivery.
        $update_payment_type['payment_status'] = "0"; // Cash On Delivery.
        $response["online_payment_msg"] = 'Payment on Delivery';
      }
      $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_payment_type); // Update Status.



      /***************** Save Used Coupon ************/
      $save_coupon_data['order_id'] = $order_id;
      $save_coupon_data['customer_id'] = $customer_id;
      $save_coupon_data['coupon_id'] = $_REQUEST['coupon_id'];
      $save_coupon_data['coupon_code'] = $_REQUEST['coupon_code'];
      $save_coupon_data['coupon_used_dis_amt'] = $_REQUEST['coupon_used_dis_amt'];
      $save_coupon_data['coupon_used_date'] = $current_date;
      $save_coupon_data['coupon_used_time'] = $current_time;
      if($_REQUEST['coupon_id'] && $_REQUEST['coupon_code'] && $_REQUEST['coupon_used_dis_amt']){
        $coupon_used_id = $this->User_Model->save_data('coupon_used', $save_coupon_data);
        if($coupon_used_id){
          $response["coupon_code_msg"] = 'Coupon Applied Successfully';
        } else{
          $response["coupon_code_msg"] = 'Coupon Not Saved';
        }
      } else{
        $response["coupon_code_msg"] = 'Coupon Not Used';
      }

      /******************** Save Redeem Point **************/
      $save_redeem_point_data['customer_id'] = $customer_id;
      $save_redeem_point_data['order_id'] = $order_id;
      $save_redeem_point_data['point_use_cnt'] = $_REQUEST['wallet_used_points'];
      $save_redeem_point_data['point_use_date'] = $current_date;
      $save_redeem_point_data['point_use_time'] = $current_time;
      if($_REQUEST['wallet_used_points']){
        $point_use_id  = $this->User_Model->save_data('point_use', $save_redeem_point_data);
        if($point_use_id){
          $response["redeem_point_msg"] = 'Points Used Successfully';
        } else{
          $response["redeem_point_msg"] = 'Points Not Saved';
        }
      } else{
        $response["redeem_point_msg"] = 'Redeem Point Not Used';
      }
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Order Not Saved';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Cancel Order...
  public function cancel_order(){
    $customer_id = $_REQUEST['customer_id'];
    $order_id = $_REQUEST['order_id'];

    $order_details = $this->User_Model->get_info_arr2_fields('order_status, order_no, order_date', 'order_id', $order_id, 'customer_id', $customer_id, '', '', 'order_tbl');
    if($order_details){
      if($order_details[0]['order_status'] == 6){
        $response["status"] = FALSE;
        $response["msg"] = 'Can not Cancel this Order';
      } else{
        $update_payment_status_data['payment_status'] = 2;
        $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_payment_status_data);
        // Dissable Point Use...
        $update_point_use_data['point_use_status'] = 0;
        $this->User_Model->update_info('order_id', $order_id, 'point_use', $update_point_use_data);
        // Dissable Coupon Used...
        $update_coupon_used_data['coupon_used_status'] = 0;
        $this->User_Model->update_info('order_id', $order_id, 'coupon_used', $update_coupon_used_data);

        $response["status"] = TRUE;
        $response["msg"] = 'Order Canceled';
      }
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Order Not Available';
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  // Share with Friend...
  // public function share_with_friend(){
  //
  // }


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
