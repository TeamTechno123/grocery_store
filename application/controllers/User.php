<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    // $this->load->model('Transaction_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

/**************************      Login      ********************************/
  public function index(){
    $data['title'] = $this->uri->segment(1);
    // echo $title;
    $this->form_validation->set_rules('mobile_no', 'Mobile No', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('User/login', $data);
    } else{
      $mobile_no = $this->input->post('mobile_no');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($mobile_no, $password);
      // print_r($login);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      } else{
        // echo 'null not';
        $this->session->set_userdata('eco_user_id', $login[0]['user_id']);
        $this->session->set_userdata('eco_company_id', $login[0]['company_id']);
        $this->session->set_userdata('eco_role_id', $login[0]['role_id']);
        header('location:'.base_url().'User/dashboard');
      }
    }
  }



/**************************      Dashboard      ********************************/
  public function dashboard(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['office_emp_cnt'] = $this->User_Model->get_count('user_id','role_id',2,'','','','','user');
    $data['sale_exe_cnt'] = $this->User_Model->get_count('user_id','role_id',5,'','','','','user');
    $data['cash_emp_cnt'] = $this->User_Model->get_count('user_id','role_id',6,'','','','','user');
    $data['delivery_boy_cnt'] = $this->User_Model->get_count('user_id','role_id',7,'','','','','user');
    $data['reseller_cnt'] = $this->User_Model->get_count('user_id','role_id',3,'','','','','user');
    $data['team_cnt'] = $this->User_Model->get_count('team_id','','','','','','','team');

    $data['vendor_cnt'] = $this->User_Model->get_count('vendor_id','','','','','','','vendor');
    $data['customer_cnt'] = $this->User_Model->get_count('customer_id','','','','','','','customer');
    $data['act_mem_cnt'] = $this->User_Model->get_count('cust_mem_id','cust_mem_status',1,'','','','','cust_membership');

    $data['offer_cnt'] = $this->User_Model->get_count('offer_id','','','','','','','offer');
    $data['manufacturer_cnt'] = $this->User_Model->get_count('manufacturer_id','','','','','','','manufacturer');
    $data['category_cnt'] = $this->User_Model->get_count('category_id','is_main',1,'','','','','category');
    $data['product_cnt'] = $this->User_Model->get_count('product_id','','','','','','','product');
    $data['coupon_cnt'] = $this->User_Model->get_count('coupon_id','','','','','','','coupon');
    $data['unit_cnt'] = $this->User_Model->get_count('unit_id','','','','','','','unit');

    $data['sales_executive_list'] = $this->User_Model->get_list_by_id('role_id',5,'','','user_id','ASC','user');
    $data['reseller_list'] = $this->User_Model->get_list_by_id('role_id',3,'','','user_id','ASC','user');
    $data['office_emp_list'] = $this->User_Model->get_list_by_id('role_id',2,'','','user_id','ASC','user');

    $data['mem_scheme_list'] = $this->User_Model->get_list_by_id('','','','','mem_sch_id','ASC','membership_scheme');

    // echo 'office_emp_list <br>';
    // print_r($data['office_emp_list']);

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    if($eco_role_id == 1 || $eco_role_id == 2){ $this->load->view('User/admin-dashboard', $data); }
    else{ $this->load->view('User/user-dashboard', $data);  }
    $this->load->view('Include/footer', $data);
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_information_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->User_Model->get_list($eco_company_id,'company_id','ASC','company');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/company_information_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
    $this->form_validation->set_rules('company_address', 'company_address', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $up_data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_statecode' => $this->input->post('company_statecode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/company_information_list');
    }
    $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
    if($company_info){
      foreach($company_info as $info){
        $data['update'] = 'update';
        $data['company_id'] = $info->company_id;
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['company_city'] = $info->company_city;
        $data['company_state'] = $info->company_state;
        $data['company_district'] = $info->company_district;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
        $data['company_lic1'] = $info->company_lic1;
        $data['company_lic2'] = $info->company_lic2;
        $data['company_start_date'] = $info->company_start_date;
        $data['company_end_date'] = $info->company_end_date;
      }
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/company_information', $data);
      $this->load->view('Include/footer', $data);
    }
  }


/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->User_Model->check_dupli_num($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }

  // Get state List By Country....
  public function get_state_by_country(){
    $country_id = $this->input->post('country_id');
    $state_list = $this->User_Model->get_list_by_id2('*','country_id',$country_id,'state');
    echo "<option value='' selected >Select State</option>";
    foreach ($state_list as $list) {
      echo "<option value='".$list->state_id."'> ".$list->state_name." </option>";
    }

  }

  // Get District List By State....
  public function get_district_by_state(){
    $state_id = $this->input->post('state_id');
    $district_list = $this->User_Model->get_list_by_id2('*','state_id',$state_id,'district');
    echo "<option value='' selected >Select District</option>";
    foreach ($district_list as $list) {
      echo "<option value='".$list->district_id."'> ".$list->district_name." </option>";
    }
    echo "<option value='-1'>Other</option>";
  }

  // Get Tahsil List By District....
  public function get_tahasil_by_district(){
    $district_id = $this->input->post('district_id');
    $tahasil_list = $this->User_Model->get_list_by_id2('*','district_id',$district_id,'tahasil');
    echo "<option value='' selected >Select Tahasil</option>";
    foreach ($tahasil_list as $list) {
      echo "<option value='".$list->tahasil_id."'> ".$list->tahasil_name." </option>";
    }
    echo "<option value='-1'>Other</option>";
  }

  // Booklet List...
  public function booklet_order(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

    // $data['company_list'] = $this->User_Model->get_list($eco_company_id,'company_id','ASC','company');
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/booklet_order');
    $this->load->view('Include/footer');
  }

}
?>
