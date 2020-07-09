<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller{

  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
    // $this->load->model('Transaction_Model');
  }

  public function index(){
    $data['slider_list'] = $this->User_Model->get_list_by_id('slider_status',1,'','','','','slider');

    $data['main_category_list'] = $this->Website_Model->category_home_list();
    $data['brand_list'] = $this->Website_Model->brand_home_list();

    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $area_id = '';
    if(isset($eco_cust_id)){
      $customer_info = $this->User_Model->get_info_arr_fields('customer_pin','customer_id', $eco_cust_id, 'customer');
      $area_details = $this->User_Model->get_info_arr_fields('tahsil_id','tahsil_pincode_no', $customer_info[0]['customer_pin'], 'tahsil_pincode');
      if($area_details){ $area_id = $area_details[0]['tahsil_id']; }
      $data['featured_product_list'] = $this->Website_Model->featured_product_list($area_id);
    } else{
      $data['featured_product_list'] = $this->Website_Model->featured_product_list($area_id);
    }
    // $data['main_category_list'] = $this->User_Model->get_list_by_id('is_main',1,'category_status',1,'category_id','ASC','category');
    // print_r()
    $this->load->view('Website/index',$data);
  }

  // public function products(){
  //   $category_id = $this->uri->segment(2);
  //   $data['product_list'] = $this->Website_Model->product_list_by_category($category_id);
  //   $this->load->view('Website/products');
  // }

  public function contact(){
    $this->load->view('Website/contact');
  }

  public function upload_order(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    if(isset($_FILES['order_upl_img']['name'])){
      $time = date('dmYHi');
      $image_name = 'order_'.$eco_cust_id.'_'.$time;
      $config['upload_path'] = 'assets/images/orders/';
      $config['allowed_types'] = 'png|jpg|jpeg|doc|docx|pdf|xsl';
      $config['file_name'] = $image_name;
      $filename = $_FILES['order_upl_img']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      $this->upload->initialize($config); // if upload library autoloaded
      if ($this->upload->do_upload('order_upl_img')){
          $save_data['order_upl_img'] = $image_name.'.'.$ext;
          $save_data['customer_id'] = $_POST['customer_id'];
          $save_data['order_upl_date'] = date('d-m-Y h:i:s A');
          $this->User_Model->save_data('order_upl', $save_data);
          $this->session->set_flashdata('upload_success','success');
      }
      else{
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('upload_error',$this->upload->display_errors());
      }
    }
    header('location:'.base_url().'');
  }

  public function search_result(){
    // $eco_cust_id = $this->session->userdata('eco_cust_id');
    // $eco_cust_login = $this->session->userdata('eco_cust_login');
    // if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $search_keyword = $this->input->post('search_keyword');
    $this->session->set_userdata('search_keyword',$search_keyword);
    $search_keyword = str_replace(' ', '-', $search_keyword);
    $search_keyword =  preg_replace('/[^A-Za-z0-9\-]/', '-', $search_keyword);
    redirect(base_url().'Search-Result/'.$search_keyword);
  }

  public function search_result2(){
    // $eco_cust_id = $this->session->userdata('eco_cust_id');
    // $eco_cust_login = $this->session->userdata('eco_cust_login');
    // if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $search_keyword = $this->session->userdata('search_keyword');
    if($search_keyword == ''){ header('location:'.base_url().''); }

    $data['product_list'] = $this->Website_Model->search_result($search_keyword);
    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $data['category_id'] = '';
    $data['search_keyword'] = $search_keyword;
    $product_cnt = 0;
    foreach ($data['product_list'] as $product_list_cnt) {  $product_cnt++; }
    $data['product_cnt'] = $product_cnt;
    $this->load->view('Website/grocery_list', $data);
  }


  // Products List Page By Category...
  public function grocery_list_by_category(){
    $category_id = $this->uri->segment(2);
    // echo $category_id;
    $data['product_list'] = $this->Website_Model->product_list_by_category($category_id);
    $category_details = $this->User_Model->get_info_arr_fields('main_category_id,category_name,category_img,is_main','category_id', $category_id, 'category');
    if(!$category_details){ header('location:'.base_url()); }
    if($category_details[0]['is_main'] == '1'){
      $main_category_id = $category_id;
    } else{
      $main_category_id = $category_details[0]['main_category_id'];
    }
    $data['brand_list'] = $this->Website_Model->get_brand_category($main_category_id);
    $data['sub_category_list'] = $this->User_Model->get_list_by_id('main_category_id',$main_category_id,'category_status',1,'category_name','ASC','category');
    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $data['category_id'] = $main_category_id;
    $data['category_details'] = $category_details[0];
    $product_cnt = 0;
    foreach ($data['product_list'] as $product_list_cnt) {  $product_cnt++; }
    $data['product_cnt'] = $product_cnt;
    $this->load->view('Website/grocery_list', $data);
  }

  // Products List Page By Brand...
  public function grocery_list_by_brand_category(){
    $manufacturer_id = $this->uri->segment(2);
    $category_id = $this->uri->segment(3);

    $category_details = $this->User_Model->get_info_arr_fields('main_category_id,category_name,category_img,is_main','category_id', $category_id, 'category');
    if(!$category_details){ header('location:'.base_url()); }
    if($category_details[0]['is_main'] == '1'){
      $main_category_id = $category_id;
    } else{
      $main_category_id = $category_details[0]['main_category_id'];
    }
    $data['brand_list'] = $this->Website_Model->get_brand_category($main_category_id);
    $data['sub_category_list'] = $this->User_Model->get_list_by_id('main_category_id',$main_category_id,'category_status',1,'category_name','ASC','category');


    $data['product_list'] = $this->Website_Model->grocery_list_by_brand_category($manufacturer_id,$category_id);
    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');

    $manufacturer_details = $this->User_Model->get_info_arr_fields('manufacturer_name,manufacturer_info','manufacturer_id', $manufacturer_id, 'manufacturer');
    $data['category_id'] = $main_category_id;
    $data['manufacturer_id'] = $manufacturer_id; // Brand Id
    $data['brand_details'] = $manufacturer_details[0];
    $product_cnt = 0;
    foreach ($data['product_list'] as $product_list_cnt) {  $product_cnt++; }
    $data['product_cnt'] = $product_cnt;
    // print_r($data['product_list']);
    $this->load->view('Website/grocery_list', $data);
  }

  // Products List Page By Brand...
  public function grocery_list_by_brand(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $manufacturer_id = $this->uri->segment(2);
    // $category_id = $this->uri->segment(3);
    $data['product_list'] = $this->Website_Model->grocery_list_by_brand($manufacturer_id);

    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $manufacturer_details = $this->User_Model->get_info_arr_fields('manufacturer_name,manufacturer_info','manufacturer_id', $manufacturer_id, 'manufacturer');
    $data['category_id'] = '';
    $data['manufacturer_id'] = $manufacturer_id; // Brand Id
    $data['brand_details'] = $manufacturer_details[0];
    $product_cnt = 0;
    foreach ($data['product_list'] as $product_list_cnt) {  $product_cnt++; }
    $data['product_cnt'] = $product_cnt;
    // print_r($data['product_list']);
    $this->load->view('Website/grocery_list', $data);
  }


  public function product_details(){
    // $eco_cust_id = $this->session->userdata('eco_cust_id');
    // $eco_cust_login = $this->session->userdata('eco_cust_login');
    // if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $product_id = $this->uri->segment(2);
    // $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $product_info = $this->User_Model->get_info_arr('product_id',$product_id,'product');
  $data['main_category_list'] = $this->Website_Model->category_home_list();
  $data['category_id']='';
    if(!$product_info){ header('location:'.base_url().''); }
    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $data['category_id'] = '';
    $data['product_info'] = $product_info[0];
    $data['product_images'] = $this->User_Model->get_list_by_id2('product_images_name','product_id',$product_id,'product_images');
    $this->load->view('Website/product_details', $data);
  }
  // Brand List Page By category...
  public function brand_list_by_category(){
    $category_id = $this->uri->segment(2);
    // echo $manufacturer_id;
    $data['brand_list'] = $this->Website_Model->get_brand_category($category_id);

    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    $data['sub_category_list'] = $this->User_Model->get_list_by_id('main_category_id',$category_id,'category_status',1,'category_name','ASC','category');
    $category_details = $this->User_Model->get_info_arr_fields('category_name,category_img','category_id', $category_id, 'category');
    $data['category_id'] = $category_id;
    $data['category_details'] = $category_details[0];
    $this->load->view('Website/brand_list_by_category', $data);

  }

  public function cart(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $row_count = count($this->cart->contents());
    if($row_count == 0){ header('location:'.base_url().''); }
    $data['page_name'] = "Cart";
    // $eco_cust_info = $this->User_Model->get_info_arr('customer_id',$eco_cust_id,'customer');
    // $data['eco_cust_info'] = $eco_cust_info[0];
    $point_add_cnt = $this->User_Model->get_sum('','point_add_cnt','customer_id',$eco_cust_id,'','','point_add');
    $point_use_cnt = $this->User_Model->get_sum('','point_use_cnt','customer_id',$eco_cust_id,'point_use_status','1','point_use');

    $wallet_bal_point = $point_add_cnt - $point_use_cnt;
    $data['wallet_bal_point'] = $wallet_bal_point;

    $this->load->view('Website/cart', $data);
  }

  // Checkout.. Address Info...
  public function checkout(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $row_count = count($this->cart->contents());
    if($row_count == 0){ header('location:'.base_url().''); }
    $data['page_name'] = "Cart";

    $point_add_cnt = $this->User_Model->get_sum('','point_add_cnt','customer_id',$eco_cust_id,'','','point_add');
    $point_use_cnt = $this->User_Model->get_sum('','point_use_cnt','customer_id',$eco_cust_id,'point_use_status','1','point_use');

    $wallet_bal_point = $point_add_cnt - $point_use_cnt;
    $data['wallet_bal_point'] = $wallet_bal_point;

    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list_by_id2('state_id, country_id, state_name','','','state');
    $data['city_list'] = $this->User_Model->get_list_by_id2('district_id as city_id , state_id, district_name as city_name','','','district');
    $data['timeslot_list'] = $this->User_Model->get_list_by_id3('timeslot_status','1','','','','','timeslot_id','DESC','timeslot');
    $data['delivery_address_list'] = $this->User_Model->get_list_by_id3('customer_id',$eco_cust_id,'','','','','address_id','DESC','delivery_address');
    $this->load->view('Website/checkout', $data);
  }

  // public function add_to_cart(){
  //   $this->db->set_userdata()
  // }

  public function shop_by_brand(){
    // $data['brand_list'] = $this->Website_Model->get_brand_category($category_id);
    $data['brand_list'] = $this->User_Model->get_list_by_id('','','manufacturer_status',1,'manufacturer_sequence','ASC','manufacturer');
    $data['main_category_list'] = $this->User_Model->get_list_by_id('','','is_main',1,'category_name','ASC','category');
    // $category_details = $this->User_Model->get_info_arr_fields('category_name,category_img','category_id', $category_id, 'category');
    // $data['category_id'] = $category_id;
    // $data['category_details'] = $category_details[0];
    $this->load->view('Website/shop_by_brand', $data);
  }

/*************************************** CookBook Contest *********************************/
  public function cookbook(){
    $this->load->view('Website/cookbook');
  }
  public function cookbook_reg(){
    $this->form_validation->set_rules('cookbook_reg_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $eco_cust_id = $this->session->userdata('eco_cust_id');
      $save_data = $_POST;
      $save_data['cookbook_reg_date'] = date('d-m-Y h:i:s A');
      if($eco_cust_id){ $save_data['customer_id'] = $eco_cust_id; }
      $this->User_Model->save_data('cookbook_reg', $save_data);
      $this->session->set_flashdata('cookbook_reg_success','success');
      header('location:'.base_url().'');
    }

    $this->load->view('Website/cookbook_reg');
  }

  public function who(){
    $this->load->view('Website/who');
  }
  public function our_system(){
    $this->load->view('Website/our_system');
  }
  public function request_product(){
    $this->load->view('Website/request_product');
    $this->form_validation->set_rules('req_product_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['req_product_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->save_data('req_product', $save_data);
      $this->session->set_flashdata('request_product_success','success');
      header('location:'.base_url().'');
    }

  }

  public function reseller_page(){
    $this->form_validation->set_rules('reseller_reg_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['reseller_reg_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->save_data('reseller_reg', $save_data);
      $this->session->set_flashdata('reseller_reg_success','success');
      header('location:'.base_url().'');
    }
    $this->load->view('Website/reseller_page');
  }

  public function offers_page(){
    $data['offers_list'] = $this->User_Model->get_list_by_id('offer_status',1,'','','offer_id','ASC','offer');
    $this->load->view('Website/offers_page', $data);
  }

  public function kbc_club(){
    $this->load->view('Website/kbc_club');
  }

  public function place_order(){
    $this->load->view('Website/place_order');
  }
  public function privacy(){
    $this->load->view('Website/privacy');
  }
  public function return1(){
    $this->load->view('Website/return');
  }
  public function category(){
    $this->load->view('Website/category');
  }
  public function terms(){
    $this->load->view('Website/terms');
  }
  public function coupon(){
    $this->load->view('Website/coupon');
  }
  public function payment(){
    $this->load->view('Website/payment');
  }
  public function cancellation(){
    $this->load->view('Website/cancellation');
  }
  public function team(){
    $data['team_list'] = $this->User_Model->get_list_by_id('team_status',1,'','','team_id','ASC','team');
    $this->load->view('Website/team', $data);
  }


  public function gallery(){
    $data['gallery_list'] = $this->User_Model->get_list_by_id('gallery_status',1,'','','gallery_id','DESC','gallery');
    $this->load->view('Website/gallery', $data);
  }


/********************************** Customer *******************************/
  // Login...
  public function login(){
    $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('Website/login');
    } else{
      $mobile_no = $this->input->post('mobile_no');
      $password = $this->input->post('password');

      $login = $this->Website_Model->check_login($mobile_no, $password);
      // print_r($login);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'Login');
      } else{
        $this->session->set_userdata('eco_cust_id', $login[0]['customer_id']);
        $this->session->set_userdata('eco_cust_login', 'Login');
        header('location:'.base_url().'');
      }
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'Web-Login');
  }


  public function signup(){
    $this->form_validation->set_rules('customer_mobile', 'User mobile No. ', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $otp = mt_rand(100000, 999999);

      $save_data = array(
        'customer_fname' => $this->input->post('customer_fname'),
        'customer_lname' => $this->input->post('customer_lname'),
        'customer_mobile' => $this->input->post('customer_mobile'),
        'customer_email' => $this->input->post('customer_email'),
        'customer_password' => $this->input->post('customer_password'),
        'otp' => $otp,
      );

      $this->session->set_userdata($save_data);
      // Send SMS...
      $mobile_no = $this->input->post('customer_mobile');
      $msg = "Welcome to kiranabhara.com. OTP: ".$otp."";
      $this->Website_Model->send_sms($mobile_no, $msg);

      header('location:'.base_url().'OTP-Signup');
    }
    $this->load->view('Website/signup');
  }

  public function otp_signup(){
    $this->form_validation->set_rules('otp', 'OTP', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $session_otp = $this->session->userdata('otp');
      $user_otp = $_POST['otp'];
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

        $this->session->set_flashdata('signup_success','success');
        header('location:'.base_url().'Login');
      } else{
        $this->session->set_flashdata('invalide_otp','success');
        header('location:'.base_url().'OTP-Signup');
      }
    }
    //echo $this->session->userdata('otp');
    $this->load->view('Website/otp');
  }

/************************************************* Profile ************************************/
// Profile Details...
public function wishlist(){
  $eco_cust_id = $this->session->userdata('eco_cust_id');
  $eco_cust_login = $this->session->userdata('eco_cust_login');
  if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

  $data['product_list'] = $this->Website_Model->wishlist($eco_cust_id);

  $this->load->view('Website/wishlist', $data);
}

  // Profile Details...
  public function profile(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $data['order_list'] = $this->User_Model->get_list_by_id('customer_id',$eco_cust_id,'','','order_id','DESC','order_tbl');
    $this->load->view('Website/profile', $data);
  }

  // Edit Profile...
  public function edit_profile(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $this->form_validation->set_rules('customer_fname', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['customer_date'] = date('d-m-Y h:i:s A');
      unset($update_data['file']);
      unset($update_data['old_img']);
      $this->User_Model->update_info('customer_id', $eco_cust_id, 'customer', $update_data);

      if(isset($_FILES['customer_img']['name'])){
         $time = time();
         $image_name = 'customer_'.$eco_cust_id.'_'.$time;
         $config['upload_path'] = 'assets/images/customer/';
         $config['allowed_types'] = 'png|jpg|jpeg';
         $config['file_name'] = $image_name;
         $filename = $_FILES['customer_img']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $this->upload->initialize($config);
         if ($this->upload->do_upload('customer_img')){
           $up_image = array(
             'customer_img' => $image_name.'.'.$ext,
           );
           $this->User_Model->update_info('customer_id', $eco_cust_id, 'customer', $up_image);
           $old_img = $this->input->post('old_img');
           if($old_img){ unlink("assets/images/customer/".$old_img); }
           $this->session->set_flashdata('upload_status','success');
         }
         else{
           $error = $this->upload->display_errors();
           $this->session->set_flashdata('upload_status',$this->upload->display_errors());
         }
       }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Profile');
    }
    $this->load->view('Website/edit_profile');
  }

  // Edit/Update Address...
  public function edit_address(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $this->form_validation->set_rules('customer_address', 'Address', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['customer_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->update_info('customer_id', $eco_cust_id, 'customer', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Profile');
    }

    $eco_cust_info = $this->User_Model->get_info_arr('customer_id',$eco_cust_id,'customer');
    $country_id = $eco_cust_info[0]['country_id'];
    $state_id = $eco_cust_info[0]['state_id'];
    $city_id = $eco_cust_info[0]['city_id'];
    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list_by_id2('state_id, country_id, state_name','','','state');
    $data['city_list'] = $this->User_Model->get_list_by_id2('district_id as city_id , state_id, district_name as city_name','','','district');

    $data['delivery_address_list'] = $this->User_Model->get_list_by_id2('*','customer_id',$eco_cust_id,'delivery_address');
    $this->load->view('Website/edit_address', $data);
  }

  public function add_delivery_address(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $save_data = $_POST;
    $save_data['customer_id'] = $eco_cust_id;
    $delivery_address_id = $this->User_Model->save_data('delivery_address', $save_data);

    $is_default = $this->input->post('is_default');
    if(isset($is_default)){
      $up_data1['is_default'] = 0;
      $this->User_Model->update_info('customer_id', $eco_cust_id, 'delivery_address', $up_data1);
      $up_data2['is_default'] = 1;
      $this->User_Model->update_info('address_id', $delivery_address_id, 'delivery_address', $up_data2);
    }

    $this->session->set_flashdata('save_success','success');
    header('location:'.base_url().'Edit-Address');
  }

  public function edit_delivery_address($address_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $delivery_address_info = $this->User_Model->get_info_arr('address_id',$address_id,'delivery_address');
    if(!$delivery_address_info){ header('location:'.base_url().'Master/timeslot'); }
    $data['update'] = 'update';
    $data['update_delivery_address'] = 'update';
    $data['delivery_address_info'] = $delivery_address_info[0];

    $data['country_list'] = $this->User_Model->get_list2('country_name','ASC','country');
    $data['state_list'] = $this->User_Model->get_list_by_id2('state_id, country_id, state_name','','','state');
    $data['city_list'] = $this->User_Model->get_list_by_id2('district_id as city_id , state_id, district_name as city_name','','','district');

    $data['delivery_address_list'] = $this->User_Model->get_list_by_id2('*','customer_id',$eco_cust_id,'delivery_address');
    $this->load->view('Website/edit_address', $data);

  }

  public function update_delivery_address(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $update_data = $_POST;
    $address_id = $_POST['address_id'];
    $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $update_data);

    $is_default = $this->input->post('is_default');
    if(isset($is_default)){
      $up_data1['is_default'] = 0;
      $this->User_Model->update_info('customer_id', $eco_cust_id, 'delivery_address', $up_data1);
      $up_data2['is_default'] = 1;
      $this->User_Model->update_info('address_id', $address_id, 'delivery_address', $up_data2);
    }

    $this->session->set_flashdata('update_success','success');
    header('location:'.base_url().'Edit-Address');
  }





/************************************************** Order ****************************************/

  // Order List....
  public function my_orders(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $data['order_list'] = $this->User_Model->get_list_by_id('customer_id',$eco_cust_id,'','','order_id','DESC','order_tbl');
    $this->load->view('Website/order', $data);
  }

  public function cancel_order($order_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $order_details = $this->User_Model->get_info_arr2_fields('order_status, order_no, order_date', 'order_id', $order_id, 'customer_id', $eco_cust_id, '', '', 'order_tbl');
    if($order_details){
      if($order_details[0]['order_status'] < 6){
        $update_payment_status_data['payment_status'] = 2;
        $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_payment_status_data);
        // Dissable Point Use...
        $update_point_use_data['point_use_status'] = 0;
        $this->User_Model->update_info('order_id', $order_id, 'point_use', $update_point_use_data);
        // Dissable Coupon Used...
        $update_coupon_used_data['coupon_used_status'] = 0;
        $this->User_Model->update_info('order_id', $order_id, 'coupon_used', $update_coupon_used_data);
      }
    }

    $this->session->set_flashdata('cancel_success','success');
    header('location:'.base_url().'My-Orders');
  }

  // Order Details....
  public function order_details($order_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $order_info = $this->User_Model->get_info_arr_fields('*','order_id', $order_id, 'order_tbl');
    if(!$order_info){ header('location:'.base_url().'My-Orders'); }
    $data['order_info'] = $order_info[0];
    $data['order_pro_list'] = $this->User_Model->get_list_by_id2('*','order_id',$order_id,'order_pro');
    // print_r($data['order_pro_list']);
    $this->load->view('Website/order_details', $data);
  }

  // Order Tracking...
  public function order_tracking($order_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $data['order_status_list'] = $this->User_Model->get_list2('order_status_id','ASC','order_status');
    $order_status_info = $this->User_Model->get_info_arr_fields('order_status','order_id', $order_id, 'order_tbl');
    if(!$order_status_info){ header('location:'.base_url().'My-Orders'); }
    $data['order_status'] = $order_status_info[0]['order_status'];
    $this->load->view('Website/order_tracking', $data);
  }

  public function order_print($order_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $order_info = $this->User_Model->get_info_arr_fields('*','order_id', $order_id, 'order_tbl');
    if(!$order_info){ header('location:'.base_url().'My-Orders'); }
    $data['order_info'] = $order_info[0];
    $data['order_pro_list'] = $this->User_Model->get_list_by_id2('*','order_id',$order_id,'order_pro');
    // print_r($data['order_pro_list']);
    $this->load->view('Website/order_print', $data);
  }

/****************************** Membership ******************************/

  public function join_membership(){
    $data['membership_scheme_list'] = $this->Website_Model->membership_scheme_list();
    $this->load->view('Website/join_membership',$data);
  }

  public function membership_details($mem_sch_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

      $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
      if(!$membership_info){ header('location:'.base_url().'KB-Membership'); }
      $data['membership_details_list'] = $this->User_Model->get_list_by_id2('*','mem_sch_id',$mem_sch_id,'mem_sch_details');
      $data['membership_info'] = $membership_info[0];
      $this->load->view('Website/membership_details',$data);

  }

  public function membership_payment($mem_sch_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $today = date('d-m-Y');
    // $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $eco_cust_id, 'cust_mem_status', 1, '', '', 'cust_membership');
    $cust_mem_info = $this->Website_Model->cust_membership_info($eco_cust_id,$today);
    // print_r($cust_mem_info);
    if($cust_mem_info){
      $this->session->set_flashdata('membership_sts','exist');
      header('location:'.base_url().'');
    }
    else{
      $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
      if(!$membership_info){ header('location:'.base_url().'KB-Membership'); }
      $data['membership_details_list'] = $this->User_Model->get_list_by_id2('*','mem_sch_id',$mem_sch_id,'mem_sch_details');
      $data['membership_info'] = $membership_info[0];
      $this->load->view('Website/membership_payment',$data);
    }

  }



  // Save Membership...
  // public function add_user_membership($mem_sch_id){
  //   $today = date('d-m-Y');
  //   $eco_cust_id = $this->session->userdata('eco_cust_id');
  //   $eco_cust_login = $this->session->userdata('eco_cust_login');
  //   if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
  //
  //   $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $eco_cust_id, 'cust_mem_status', 1, '', '', 'cust_membership');
  //   if($cust_mem_info && strtotime($cust_mem_info[0]['cust_mem_end_date']) > strtotime($today)){
  //     $this->session->set_flashdata('membership_sts','exist');
  //   } else{
  //     $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
  //     $mem_sch_valid = $membership_info[0]['mem_sch_valid'];
  //     $cust_mem_end_date = date('d-m-Y', strtotime("+".$mem_sch_valid." days"));
  //     $save_data = $arrayName = array(
  //       'customer_id' => $eco_cust_id,
  //       'mem_sch_id' => $mem_sch_id,
  //       'cust_mem_start_date' => $today,
  //       'cust_mem_end_date' => $cust_mem_end_date,
  //       'cust_mem_valid_days' => $mem_sch_valid,
  //       'cust_mem_amt' => $membership_info[0]['mem_sch_amt'],
  //       'cust_mem_point' => $membership_info[0]['mem_sch_point'],
  //       'cust_mem_status' => 1,
  //       'cust_mem_date' => date('d-m-Y h:i:s A')
  //     );
  //
  //     $this->User_Model->save_data('cust_membership', $save_data);
  //     $this->session->set_flashdata('membership_sts','success');
  //   }
  //   header('location:'.base_url().'');
  // }

  // My Membership Details... Active Membership..
  public function my_membership(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $today = date('d-m-Y');
    $cust_mem_info = $this->User_Model->get_info_arr2_fields('*', 'customer_id', $eco_cust_id, 'cust_mem_status', 1, '', '', 'cust_membership');
    if($cust_mem_info && strtotime($cust_mem_info[0]['cust_mem_end_date']) > strtotime($today)){
      $data['cust_mem_info'] = $cust_mem_info[0];
    } else{
      $data['cust_mem_info'] = '';
    }
    $this->load->view('Website/my_membership', $data);
  }

/**********************************************************************************************/

  public function customer_service(){
    $this->load->view('Website/customer_service');
  }
  public function shipping(){
    $this->load->view('Website/shipping');
  }
  public function scratch(){
    $this->load->view('Website/scratch');
  }

  public function brand_page(){
    $this->load->view('Website/brand_page');
  }

  public function gift_card(){
    $this->load->view('Website/gift_card');
  }

/*********************************** Wallet ************************/

  public function wallet(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $point_add_cnt = $this->User_Model->get_sum('','point_add_cnt','customer_id',$eco_cust_id,'','','point_add');
    $point_use_cnt = $this->User_Model->get_sum('','point_use_cnt','customer_id',$eco_cust_id,'point_use_status','1','point_use');

    $wallet_bal_point = $point_add_cnt - $point_use_cnt;
    $data['wallet_bal_point'] = $wallet_bal_point;

    $this->load->view('Website/wallet', $data);
  }

  public function add_wallet(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $this->load->view('Website/add_wallet');
  }

  public function wallet_payment(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $this->load->view('Website/wallet_payment');
  }

  public function wallet_activity_add_list(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $wallet_activity_list = $this->Website_Model->point_add_list_by_date($eco_cust_id,$from_date,$to_date);

    $cnt = 0;
    foreach ($wallet_activity_list as $list) {
      $cnt++;
      echo '<tr>
        <td>'.$cnt.'</td>
        <td>'.$list->point_add_date.'</td>
        <td>'.$list->point_add_cnt.'</td>
        <td>';
        if($list->point_add_type == 1){
          echo 'Wallet Fund';
        } elseif ($list->point_add_type == 2) {
          echo 'Customer Refference Reward';
        } elseif ($list->point_add_type == 3) {
          echo 'Order 999+ Reward';
        }
    echo '</td>
        </tr>';
    }
  }

  public function wallet_activity_use_list(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    $wallet_activity_list = $this->Website_Model->point_use_list_by_date($eco_cust_id,$from_date,$to_date);

    $cnt = 0;
    foreach ($wallet_activity_list as $list) {
      $cnt++;
      echo '<tr>
        <td>'.$cnt.'</td>
        <td>'.$list->point_use_date.'</td>
        <td>'.$list->point_use_cnt.'</td>
        <td>'.$list->order_id.'</td>
      </tr>';
    }
  }

  // public function save_wallet_fund(){
  //   $eco_cust_id = $this->session->userdata('eco_cust_id');
  //   $eco_cust_login = $this->session->userdata('eco_cust_login');
  //   if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
  //   $wallet_add_amount = $_POST['wallet_fund_amount'];
  //   $save_wallet_data = array(
  //     'customer_id' => $eco_cust_id,
  //     'wallet_add_amount' => $wallet_add_amount,
  //     'wallet_add_date' => date('d-m-Y h:i:s A'),
  //     'wallet_add_time' => date('h:i:s A'),
  //   );
  //   $wallet_add_id = $this->User_Model->save_data('wallet_add', $save_wallet_data);
  //
  //   $save_point_data = array(
  //     'customer_id' => $eco_cust_id,
  //     'point_add_type' => 1,
  //     'point_add_ref_id' => $wallet_add_id,
  //     'point_add_cnt' => $wallet_add_amount,
  //     'point_add_date' => date('d-m-Y'),
  //     'point_add_time' => date('h:i:s A'),
  //   );
  //   $point_add_id = $this->User_Model->save_data('point_add', $save_point_data);
  //
  //   $this->session->set_flashdata('save_success','success');
  //   header('location:'.base_url().'My-Wallet');
  // }


}
?>
