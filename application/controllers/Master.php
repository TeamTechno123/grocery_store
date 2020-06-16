<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
  }

  /*******************************    User Information      ****************************/

    // Add New User....
    public function add_user(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $save_data = array(
          'company_id' => $eco_company_id,
          'user_name' => $this->input->post('user_name'),
          'role_id' => $this->input->post('role_id'),
          'user_mobile' => $this->input->post('user_mobile'),
          'user_city' => $this->input->post('user_city'),
          'user_email' => $this->input->post('user_email'),
          'user_password' => $this->input->post('user_password'),
          'user_addedby' => $eco_user_id,
        );
        $this->User_Model->save_data('user', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/user_list');
      }

      $data['role_list'] = $this->User_Model->get_list2('role_id','ASC','role');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/user', $data);
      $this->load->view('Include/footer', $data);
    }

    // User List....
    public function user_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['user_list'] = $this->User_Model->user_list($eco_company_id);
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/user_list',$data);
      $this->load->view('Include/footer',$data);
    }

    // Edit User....
    public function edit_user($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
        $data['role_list'] = $this->User_Model->get_list2('role_id','ASC','role');
      if ($this->form_validation->run() != FALSE) {
        $update_data = array(
          'user_name' => $this->input->post('user_name'),
          'user_mobile' => $this->input->post('user_mobile'),
          'role_id' => $this->input->post('role_id'),
          'user_email' => $this->input->post('user_email'),
          'user_city' => $this->input->post('user_city'),
          'user_password' => $this->input->post('user_password'),
          'user_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('user_id', $user_id, 'user', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/user_list');
      }

      $user_info = $this->User_Model->get_info('user_id', $user_id, 'user');
      if($user_info == ''){ header('location:'.base_url().'Master/user_list'); }
      foreach($user_info as $info){
        $data['update'] = 'update';
        $data['user_name'] = $info->user_name;
        $data['user_mobile'] = $info->user_mobile;
        $data['role_id'] = $info->role_id;
        $data['user_email'] = $info->user_email;
        $data['user_city'] = $info->user_city;
        $data['user_password'] = $info->user_password;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/user',$data);
      $this->load->view('Include/footer',$data);
    }

    // Delete User....
    public function delete_user($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('user_id', $user_id, 'user');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/user_list');
    }


/***********************     customer Information      ******************************/
  // Customer List...
  public function customer_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $emp_user_id = $this->uri->segment(3);
    echo $emp_user_id;
    if($emp_user_id){
      $data['customer_list'] = $this->User_Model->get_list_by_id('customer_addedby',$emp_user_id,'','','customer_id','DESC','customer');
    } else{
      if($eco_role_id == 1){
        $data['customer_list'] = $this->User_Model->get_list2('customer_id','DESC','customer');
      } else{
        $data['customer_list'] = $this->User_Model->get_list_by_id('customer_addedby',$eco_user_id,'','','customer_id','DESC','customer');
      }
    }
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/customer_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function select_cust_membership(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['membership_scheme_list'] = $this->Website_Model->membership_scheme_list();
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/select_cust_membership', $data);
    $this->load->view('Include/footer', $data);
  }

  public function get_membership_details(){
    $mem_sch_id = $_POST['mem_sch_id'];
    $membership_details_list = $this->User_Model->get_list_by_id2('*','mem_sch_id',$mem_sch_id,'mem_sch_details');
    foreach ($membership_details_list as $list) {
      echo "<tr><td>".$list->mem_sch_det_feature."</td>
          <td class='text-center'>
            ";
            if($list->mem_sch_det_status == 0){
              echo "<span class='fa fa-times text-danger'></span>";
            } elseif ($list->mem_sch_det_status == 1) {
              echo "<span class='fa fa-check text-success'></span>";
            } elseif ($list->mem_sch_det_status == 2) {
              echo $list->mem_sch_det_val;
            }
          echo "
          </td>
        </tr>
      ";
    }
  }

  // Add Customer...
  public function customer($mem_sch_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('customer_fname', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $customer_status = $this->input->post('customer_status');
      if(!isset($customer_status)){ $customer_status = 0; }
      $save_data = $_POST;
      $save_data['company_id'] = $eco_company_id;
      $save_data['customer_addedby'] = $eco_user_id;
      $save_data['customer_status'] = $customer_status;
      $save_data['customer_date'] = date('d-m-Y h:i:s A');

      unset($save_data['payment_type_id']);
      unset($save_data['peyment_ref_no']);
      $eco_cust_id = $this->User_Model->save_data('customer', $save_data);

      $today = date('d-m-Y');

      $mem_sch_id = $_POST['mem_sch_id'];
      if($mem_sch_id){
        $membership_info = $this->User_Model->get_info_arr2_fields('*', 'mem_sch_id', $mem_sch_id, '', '', '', '', 'membership_scheme');
        $mem_sch_valid = $membership_info[0]['mem_sch_valid'];
        $cust_mem_end_date = date('d-m-Y', strtotime("+".$mem_sch_valid." days"));
        $save_data = $arrayName = array(
          'customer_id' => $eco_cust_id,
          'mem_sch_id' => $mem_sch_id,
          'cust_mem_start_date' => $today,
          'cust_mem_end_date' => $cust_mem_end_date,
          'cust_mem_valid_days' => $mem_sch_valid,
          'cust_mem_amt' => $membership_info[0]['mem_sch_amt'],
          'cust_mem_point' => $membership_info[0]['mem_sch_point'],
          'cust_mem_status' => 0,
          'cust_mem_date' => date('d-m-Y h:i:s A'),
          'cust_mem_addedby' => $eco_user_id
        );
        $this->User_Model->save_data('cust_membership', $save_data);

        $user_point_info = $this->User_Model->get_info_arr_fields('user_points','user_id', $eco_user_id, 'user');
        $new_points = $user_point_info[0]['user_points'] + $membership_info[0]['mem_sch_point'];
        $up_data['user_points'] = $new_points;
        $this->User_Model->update_info('user_id', $user_id, 'user', $up_data);
      }

      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/customer_list');
    }
    // $data['customer_level_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'customer_level_status','1',"customer_level_id",'DESC','customer_level');
    $data['customer_member_list'] = $this->User_Model->get_list_by_id('company_id','','mem_sch_status','1',"mem_sch_id",'DESC','membership_scheme');
    $data['payment_type_list'] = $this->User_Model->get_list2('payment_type_id','ASC','payment_type');
    $data['mem_sch_id'] = $mem_sch_id;
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/customer', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Customer...
    public function edit_customer($customer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_fname', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_status = $this->input->post('customer_status');
        if(!isset($customer_status)){ $customer_status = 0; }
        $update_data = $_POST;
        $update_data['customer_addedby'] = $eco_user_id;
        $update_data['customer_status'] = $customer_status;
        $update_data['customer_date'] = date('d-m-Y h:i:s A');
        unset($save_data['payment_type_id']);
        unset($save_data['peyment_ref_no']);

        $this->User_Model->update_info('customer_id', $customer_id, 'customer', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/customer_list');
      }
      $customer_info = $this->User_Model->get_info_arr('customer_id',$customer_id,'customer');
      if(!$customer_info){ header('location:'.base_url().'Master/customer_list'); }
      $data['update'] = 'update';
      $data['customer_info'] = $customer_info[0];
      // $data['customer_level_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'customer_level_status','1',"customer_level_id",'DESC','customer_level');
      $data['customer_member_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'mem_sch_status','1',"mem_sch_id",'DESC','membership_scheme');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Customer....
    public function delete_customer($customer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('customer_id', $customer_id, 'customer');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/customer_list');
    }

    public function check_customer_loyalty_no(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

      $customer_loyalty_no = $_POST['customer_loyalty_no'];
      $company_id = '';
      $cnt = $this->User_Model->check_dupli_num($company_id,$customer_loyalty_no,'customer_loyalty_no','customer');
      if($cnt > 0){
        $result = 'num_used';
      }
      $check_avlbl = $this->User_Model->check_dupli_num($company_id,$customer_loyalty_no,'loyalty_card_no','loyalty_card');
      if($check_avlbl == 0){
        $result = 'num_not_avlbl';
      }
      echo $result;
    }


    /***********************     franchise Information      ******************************/

    public function franchise_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['franchise_list'] = $this->User_Model->get_list($eco_company_id,'franchise_id','DESC','franchise');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/franchise_list', $data);
      $this->load->view('Include/footer', $data);
    }

    public function franchise_information(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('franchise_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $franchise_status = $this->input->post('franchise_status');
        if(!isset($franchise_status)){ $franchise_status = 1; }

        $user_save_data = array(
          'company_id' => $eco_company_id,
          'role_id' => $_POST['franchise_type_id'],
          'user_name' => $_POST['franchise_name'],
          'user_email' => $_POST['franchise_email'],
          'user_mobile' => $_POST['franchise_mobile'],
          'user_password' => $_POST['franchise_password'],
          'user_status' => $franchise_status,
          'user_addedby' => $eco_user_id,
        );
        $user_id = $this->User_Model->save_data('user', $user_save_data);

        $save_data = $_POST;
        unset($save_data['franchise_c_password']);
        $save_data['company_id'] = $eco_company_id;
        $save_data['user_id'] = $user_id;
        $save_data['franchise_status'] = $franchise_status;
        $save_data['franchise_addedby'] = $eco_user_id;
        $save_data['franchise_date'] = date('d-m-Y h:i:s A');

        $this->User_Model->save_data('franchise', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/franchise_list');
      }
      $data['country_list'] = $this->User_Model->get_list2('country_id','ASC','country');
      // $data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
      // $data['district_list'] = $this->User_Model->get_list1('district_id','ASC','district');
      // $data['tahasil_list'] = $this->User_Model->get_list1('tahasil_id','ASC','tahasil');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/franchise_information', $data);
      $this->load->view('Include/footer', $data);
    }

    public function edit_franchise($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('franchise_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $franchise_status = $this->input->post('franchise_status');
        if(!isset($franchise_status)){ $franchise_status = 1; }

        $user_update_data = array(
          'role_id' => $_POST['franchise_type_id'],
          'user_name' => $_POST['franchise_name'],
          'user_email' => $_POST['franchise_email'],
          'user_mobile' => $_POST['franchise_mobile'],
          'user_password' => $_POST['franchise_password'],
          'user_status' => $franchise_status,
          'user_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('user_id', $user_id, 'user', $user_update_data);

        $update_data = $_POST;
        unset($update_data['franchise_c_password']);
        $update_data['franchise_status'] = $franchise_status;
        $update_data['franchise_date'] = date('d-m-Y h:i:s A');

        $this->User_Model->update_info('user_id', $user_id, 'franchise', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/franchise_list');
      }

      $franchise_info = $this->User_Model->get_info_arr('user_id', $user_id, 'franchise');
      if(!$franchise_info){ header('location:'.base_url().'Master/franchise_list'); }
      $data['update'] = 'update';
      $data['franchise_type_id'] = $franchise_info[0]['franchise_type_id'];
      $data['country_id'] = $franchise_info[0]['country_id'];
      $data['state_id'] = $franchise_info[0]['state_id'];
      $data['district_id'] = $franchise_info[0]['district_id'];
      $data['tahasil_id'] = $franchise_info[0]['tahasil_id'];
      $data['franchise_name'] = $franchise_info[0]['franchise_name'];
      $data['franchise_address'] = $franchise_info[0]['franchise_address'];
      $data['franchise_gender'] = $franchise_info[0]['franchise_gender'];
      $data['franchise_email'] = $franchise_info[0]['franchise_email'];
      $data['franchise_mobile'] = $franchise_info[0]['franchise_mobile'];
      $data['franchise_password'] = $franchise_info[0]['franchise_password'];
      $data['franchise_pay_terms'] = $franchise_info[0]['franchise_pay_terms'];
      $data['franchise_commission'] = $franchise_info[0]['franchise_commission'];
      $data['franchise_bank'] = $franchise_info[0]['franchise_bank'];
      $data['franchise_branch'] = $franchise_info[0]['franchise_branch'];
      $data['franchise_ifsc'] = $franchise_info[0]['franchise_ifsc'];
      $data['franchise_acc_no'] = $franchise_info[0]['franchise_acc_no'];
      $data['franchise_status'] = $franchise_info[0]['franchise_status'];

      $data['country_list'] = $this->User_Model->get_list2('country_id','ASC','country');
      $data['state_list'] = $this->User_Model->get_list_by_id2('*','country_id',$data['country_id'],'state');
      $data['district_list'] = $this->User_Model->get_list_by_id2('*','state_id',$data['state_id'],'district');
      $data['tahasil_list'] = $this->User_Model->get_list_by_id2('*','district_id',$data['district_id'],'tahasil');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/franchise_information', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Customer....
    public function delete_franchise($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('user_id', $user_id, 'franchise');
        $this->User_Model->delete_info('user_id', $user_id, 'user');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/franchise_list');
    }

/***********************     tax_slab Information      ******************************/

  // Tax Slab List
  public function tax_slab_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $data['tax_slab_list'] = $this->User_Model->get_list($eco_company_id,'tax_title','ASC','tax');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/tax_slab_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Tax Slab...
  public function tax_slab(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tax_title', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $tax_status = $this->input->post('tax_status');
      if(!isset($tax_status)){ $tax_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'tax_title' => $this->input->post('tax_title'),
        'tax_rate' => $this->input->post('tax_rate'),
        'tax_desc' => $this->input->post('tax_desc'),
        'tax_status' => $tax_status,
        'tax_addedby' => $eco_user_id,
        'tax_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->save_data('tax', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/tax_slab_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/tax_slab');
    $this->load->view('Include/footer');
  }

  // Edit Tax Slab...
  public function edit_tax_slab($tax_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tax_title', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $tax_status = $this->input->post('tax_status');
      if(!isset($tax_status)){ $tax_status = 0; }
      $update_data = array(
        'tax_title' => $this->input->post('tax_title'),
        'tax_rate' => $this->input->post('tax_rate'),
        'tax_desc' => $this->input->post('tax_desc'),
        'tax_status' => $tax_status,
        'tax_addedby' => $eco_user_id,
        'tax_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->update_info('tax_id', $tax_id, 'tax', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/tax_slab_list');
    }
    $tax_info = $this->User_Model->get_info_arr('tax_id',$tax_id,'tax');
    if(!$tax_info){ header('location:'.base_url().'Master/tax_list'); }
    $data['update'] = 'update';
    $data['tax_info'] = $tax_info[0];
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/tax_slab', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Tags....
  public function delete_tax_slab($tax_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('tax_id', $tax_id, 'tax');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/tax_slab_list');
  }

/***********************     Unit Information      ******************************/

  // Unit List...
    public function unit_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $data['unit_list'] = $this->User_Model->get_list($eco_company_id,'unit_name','ASC','unit');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/unit_list', $data);
      $this->load->view('Include/footer', $data);
    }

  // Add Unit...
    public function unit(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $unit_status = $this->input->post('unit_status');
        if(!isset($unit_status)){ $unit_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'unit_name' => $this->input->post('unit_name'),
          'unit_status' => $unit_status,
          'unit_addedby' => $eco_user_id,
          'unit_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->save_data('unit', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/unit_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/unit');
      $this->load->view('Include/footer');
    }

  // Add Unit...
    public function edit_unit($unit_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $unit_status = $this->input->post('unit_status');
        if(!isset($unit_status)){ $unit_status = 0; }
        $update_data = array(
          'unit_name' => $this->input->post('unit_name'),
          'unit_status' => $unit_status,
          'unit_addedby' => $eco_user_id,
          'unit_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('unit_id', $unit_id, 'unit', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/unit_list');
      }
      $unit_info = $this->User_Model->get_info_arr('unit_id',$unit_id,'unit');
      if(!$unit_info){ header('location:'.base_url().'User/unit_list'); }
      $data['update'] = 'update';
      $data['unit_info'] = $unit_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/unit', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Unit....
    public function delete_unit($unit_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('unit_id', $unit_id, 'unit');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/unit_list');
    }

/***********************     shipping Information      ******************************/

  // Shipping List...
  public function shipping_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['shipping_list'] = $this->User_Model->get_list($eco_company_id,'shipping_name','ASC','shipping');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/shipping_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Shipping...
  public function shipping(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('shipping_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $shipping_status = $this->input->post('shipping_status');
      if(!isset($shipping_status)){ $shipping_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'shipping_name' => $this->input->post('shipping_name'),
        'shipping_price' => $this->input->post('shipping_price'),
        'shipping_desc' => $this->input->post('shipping_desc'),
        'shipping_status' => $shipping_status,
        'shipping_addedby' => $eco_user_id,
        'shipping_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->save_data('shipping', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/shipping_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/shipping');
    $this->load->view('Include/footer');
  }

  // Edit Shipping...
    public function edit_shipping($shipping_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('shipping_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $shipping_status = $this->input->post('shipping_status');
        if(!isset($shipping_status)){ $shipping_status = 0; }
        $update_data = array(
          'shipping_name' => $this->input->post('shipping_name'),
          'shipping_price' => $this->input->post('shipping_price'),
          'shipping_desc' => $this->input->post('shipping_desc'),
          'shipping_status' => $shipping_status,
          'shipping_addedby' => $eco_user_id,
          'shipping_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('shipping_id', $shipping_id, 'shipping', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/shipping_list');
      }
      $shipping_info = $this->User_Model->get_info_arr('shipping_id',$shipping_id,'shipping');
      if(!$shipping_info){ header('location:'.base_url().'Master/shipping_list'); }
      $data['update'] = 'update';
      $data['shipping_info'] = $shipping_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/shipping', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Shipping....
    public function delete_shipping($shipping_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('shipping_id', $shipping_id, 'shipping');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/shipping_list');
    }

    /***********************     customer_level Information      ******************************/

    // customer_level List...
    public function customer_level_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['customer_level_list'] = $this->User_Model->get_list($eco_company_id,'customer_level_name','ASC','customer_level');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer_level_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add customer_level...
    public function customer_level(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_level_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_level_status = $this->input->post('customer_level_status');
        if(!isset($customer_level_status)){ $customer_level_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'customer_level_name' => $this->input->post('customer_level_name'),
          'customer_level_price' => $this->input->post('customer_level_price'),
          'customer_level_desc' => $this->input->post('customer_level_desc'),
          'customer_level_status' => $customer_level_status,
          'customer_level_addedby' => $eco_user_id,
          'customer_level_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->save_data('customer_level', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/customer_level_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/customer_level');
      $this->load->view('Include/footer');
    }

  // Edit customer_level...
    public function edit_customer_level($customer_level_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_level_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_level_status = $this->input->post('customer_level_status');
        if(!isset($customer_level_status)){ $customer_level_status = 0; }
        $update_data = array(
          'customer_level_name' => $this->input->post('customer_level_name'),
          'customer_level_price' => $this->input->post('customer_level_price'),
          'customer_level_desc' => $this->input->post('customer_level_desc'),
          'customer_level_status' => $customer_level_status,
          'customer_level_addedby' => $eco_user_id,
          'customer_level_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('customer_level_id', $customer_level_id, 'customer_level', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/customer_level_list');
      }
      $customer_level_info = $this->User_Model->get_info_arr('customer_level_id',$customer_level_id,'customer_level');
      if(!$customer_level_info){ header('location:'.base_url().'Master/customer_level_list'); }
      $data['update'] = 'update';
      $data['customer_level_info'] = $customer_level_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer_level', $data);
      $this->load->view('Include/footer', $data);
    }

  // Delete customer_level....
    public function delete_customer_level($customer_level_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('customer_level_id', $customer_level_id, 'customer_level');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/customer_level_list');
    }

    /***********************     Membership Scheme Information      ******************************/
    // Membership Scheme List
    public function membership_scheme_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['membership_scheme_list'] = $this->User_Model->get_list($eco_company_id,'mem_sch_name','ASC','membership_scheme');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/membership_scheme_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Membership Scheme...
    public function membership_scheme(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('mem_sch_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $mem_sch_status = $this->input->post('mem_sch_status');
        if(!isset($mem_sch_status)){ $mem_sch_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'mem_sch_name' => $this->input->post('mem_sch_name'),
          'mem_sch_amt' => $this->input->post('mem_sch_amt'),
          'mem_sch_valid' => $this->input->post('mem_sch_valid'),
          'mem_sch_point' => $this->input->post('mem_sch_point'),
          'mem_sch_status' => $mem_sch_status,
          'mem_sch_addedby' => $eco_user_id,
          'mem_sch_date' => date('d-m-Y h:m:s A'),
        );
        $mem_sch_id = $this->User_Model->save_data('membership_scheme', $save_data);

        foreach($_POST['input'] as $multi_data){
          $multi_data['mem_sch_id'] = $mem_sch_id;
          $multi_data['mem_sch_det_addedby'] = $eco_user_id;
          $multi_data['mem_sch_det_date'] = date('d-m-Y h:i:s A');
          $this->db->insert('mem_sch_details', $multi_data);
        }

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/membership_scheme_list');
      }

      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/membership_scheme');
      $this->load->view('Include/footer');
    }

    // Edit Membership Scheme...
      public function edit_membership_scheme($mem_sch_id){
        $eco_user_id = $this->session->userdata('eco_user_id');
        $eco_company_id = $this->session->userdata('eco_company_id');
        $eco_role_id = $this->session->userdata('eco_role_id');
        if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
        $this->form_validation->set_rules('mem_sch_name', 'Name', 'trim|required');
        if ($this->form_validation->run() != FALSE) {
          $mem_sch_status = $this->input->post('mem_sch_status');
          if(!isset($mem_sch_status)){ $mem_sch_status = 0; }
          $update_data = array(
            'mem_sch_name' => $this->input->post('mem_sch_name'),
            'mem_sch_amt' => $this->input->post('mem_sch_amt'),
            'mem_sch_valid' => $this->input->post('mem_sch_valid'),
            'mem_sch_point' => $this->input->post('mem_sch_point'),
            'mem_sch_status' => $mem_sch_status,
            'mem_sch_addedby' => $eco_user_id,
            'mem_sch_date' => date('d-m-Y h:m:s A'),
          );
          $this->User_Model->update_info('mem_sch_id', $mem_sch_id, 'membership_scheme', $update_data);

          foreach($_POST['input'] as $multi_data){
            if(isset($multi_data['mem_sch_det_id'])){
              $mem_sch_det_id = $multi_data['mem_sch_det_id'];
              if(!isset($multi_data['mem_sch_det_feature'])){
                $this->User_Model->delete_info('mem_sch_det_id', $mem_sch_det_id, 'mem_sch_details');
              }else{
                $multi_data['mem_sch_det_addedby'] = $eco_user_id;
                $multi_data['mem_sch_det_date'] = date('d-m-Y h:i:s A');
                $this->User_Model->update_info('mem_sch_det_id', $mem_sch_det_id, 'mem_sch_details', $multi_data);
              }
            }
            else{
              $multi_data['mem_sch_id'] = $mem_sch_id;
              $multi_data['mem_sch_det_addedby'] = $eco_user_id;
              $multi_data['mem_sch_det_date'] = date('d-m-Y h:i:s A');
              $this->db->insert('mem_sch_details', $multi_data);
            }
          }

          $this->session->set_flashdata('update_success','success');
          header('location:'.base_url().'Master/membership_scheme_list');
        }

        $membership_scheme_info = $this->User_Model->get_info_arr('mem_sch_id',$mem_sch_id,'membership_scheme');
        if(!$membership_scheme_info){ header('location:'.base_url().'Master/membership_scheme_list'); }
        $data['update'] = 'update';
        $data['mem_sch_info'] = $membership_scheme_info[0];
        $data['mem_sch_details_list'] = $this->User_Model->get_list_by_id2("*",'mem_sch_id',$mem_sch_id,'mem_sch_details');
        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('User/membership_scheme', $data);
        $this->load->view('Include/footer', $data);
      }

    // Delete Membership Scheme....
      public function delete_membership_scheme($mem_sch_id){
        $eco_user_id = $this->session->userdata('eco_user_id');
        $eco_company_id = $this->session->userdata('eco_company_id');
        $eco_role_id = $this->session->userdata('eco_role_id');
        if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
        $this->User_Model->delete_info('mem_sch_id', $mem_sch_id, 'membership_scheme');
        $this->User_Model->delete_info('mem_sch_id', $mem_sch_id, 'mem_sch_details');
        $this->session->set_flashdata('delete_success','success');
        header('location:'.base_url().'Master/membership_scheme_list');
      }



  /***********************     manufacturer Information      ******************************/

    public function manufacturer_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['manufacturer_list'] = $this->User_Model->get_list($eco_company_id,'manufacturer_name','ASC','manufacturer');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/manufacturer_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Manufacturer...
    public function manufacturer(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('manufacturer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $manufacturer_status = $this->input->post('manufacturer_status');
        if(!isset($manufacturer_status)){ $manufacturer_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'manufacturer_name' => $this->input->post('manufacturer_name'),
          'manufacturer_info' => $this->input->post('manufacturer_info'),
          'manufacturer_sequence' => $this->input->post('manufacturer_sequence'),
          'manufacturer_status' => $manufacturer_status,
          'manufacturer_date' => date('d-m-Y h:m:s A'),
          'manufacturer_addedby' => $eco_user_id,
        );
        $manufacturer_id = $this->User_Model->save_data('manufacturer', $save_data);
        if(isset($_FILES['manufacturer_img']['name'])){
           $time = time();
           $image_name = 'manufacturer_'.$manufacturer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/manufacturer/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['manufacturer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('manufacturer_img')){
             $up_image = array(
               'manufacturer_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/manufacturer_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/manufacturer');
      $this->load->view('Include/footer');
    }

    // Edit Manufacturer...
    public function edit_manufacturer($manufacturer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('manufacturer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $manufacturer_status = $this->input->post('manufacturer_status');
        if(!isset($manufacturer_status)){ $manufacturer_status = 0; }
        $update_data = array(
          'manufacturer_name' => $this->input->post('manufacturer_name'),
          'manufacturer_info' => $this->input->post('manufacturer_info'),
          'manufacturer_sequence' => $this->input->post('manufacturer_sequence'),
          'manufacturer_status' => $manufacturer_status,
          'manufacturer_date' => date('d-m-Y h:m:s A'),
          'manufacturer_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $update_data);
        if(isset($_FILES['manufacturer_img']['name'])){
           $time = time();
           $image_name = 'manufacturer_'.$manufacturer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/manufacturer/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['manufacturer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('manufacturer_img')){
             $up_image = array(
               'manufacturer_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $up_image);
             $old_img = $this->input->post('old_img');
             if($old_img){ unlink("assets/images/manufacturer/".$old_img); }
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/manufacturer_list');
      }
      $manufacturer_info = $this->User_Model->get_info_arr('manufacturer_id',$manufacturer_id,'manufacturer');
      if(!$manufacturer_info){ header('location:'.base_url().'Master/manufacturer_list'); }
      $data['update'] = 'update';
      $data['manufacturer_name'] = $manufacturer_info[0]['manufacturer_name'];
      $data['manufacturer_info'] = $manufacturer_info[0]['manufacturer_info'];
      $data['manufacturer_sequence'] = $manufacturer_info[0]['manufacturer_sequence'];
      $data['manufacturer_status'] = $manufacturer_info[0]['manufacturer_status'];
      $data['manufacturer_img'] = $manufacturer_info[0]['manufacturer_img'];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/manufacturer', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Manufacturer....
    public function delete_manufacturer($manufacturer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_img','manufacturer_id', $manufacturer_id, 'manufacturer');
      $this->User_Model->delete_info('manufacturer_id', $manufacturer_id, 'manufacturer');
      if($manufacturer_info){ unlink("assets/images/manufacturer/".$manufacturer_info[0]['manufacturer_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/manufacturer_list');
    }

/****************************************H Website Header Content *************************************************/
  // Edit Manufacturer...
  public function header_content(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $header_content_id = '1';
    $this->form_validation->set_rules('header_content1', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['header_content_addedby'] = $eco_user_id;
      $update_data['header_content_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->update_info('header_content_id', $header_content_id, 'header_content', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/dashboard');
    }
    $header_content_info = $this->User_Model->get_info_arr('header_content_id',$header_content_id,'header_content');
    // if(!$header_content_info){ header('location:'.base_url().'Master/header_content_list'); }
    $data['update'] = 'update';
    $data['header_content_info'] = $header_content_info[0];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/header_content', $data);
    $this->load->view('Include/footer', $data);
  }

/***********************     order_status Information      ******************************/
    public function order_status_list(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('Master/order_status_list');
      $this->load->view('Include/footer');
    }
    public function order_status(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('Master/order_status');
      $this->load->view('Include/footer');
    }

    public function pincode_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['tahsil_list'] = $this->User_Model->get_list2('tahsil_id','ASC','tahsil');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/pincode_list', $data);
      $this->load->view('Include/footer', $data);
    }

    public function pincode(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('tahsil_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $save_data = $_POST;
        $save_data['tahsil_addedby'] = $eco_user_id;
        $save_data['tahsil_date'] = date('d-m-Y h:i:s A');
        unset($save_data['input']);
        $tahsil_id = $this->User_Model->save_data('tahsil', $save_data);

        foreach($_POST['input'] as $multi_data){
          $multi_data['tahsil_id'] = $tahsil_id;
          $this->db->insert('tahsil_pincode', $multi_data);
        }

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/pincode_list');
      }

      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/pincode');
      $this->load->view('Include/footer');
    }

    public function edit_pincode($tahsil_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('tahsil_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $update_data = $_POST;
        $update_data['tahsil_addedby'] = $eco_user_id;
        $update_data['tahsil_date'] = date('d-m-Y h:i:s A');
        unset($update_data['input']);
        $this->User_Model->update_info('tahsil_id', $tahsil_id, 'tahsil', $update_data);

        foreach($_POST['input'] as $multi_data){
          if(isset($multi_data['tahsil_pincode_id'])){
            $tahsil_pincode_id = $multi_data['tahsil_pincode_id'];
            if(!isset($multi_data['tahsil_pincode_area'])){
              $this->User_Model->delete_info('tahsil_pincode_id', $tahsil_pincode_id, 'tahsil_pincode');
            }else{
              $this->User_Model->update_info('tahsil_pincode_id', $tahsil_pincode_id, 'tahsil_pincode', $multi_data);
            }
          }
          else{
            $multi_data['tahsil_id'] = $tahsil_id;
            $this->db->insert('tahsil_pincode', $multi_data);
          }
        }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/pincode_list');
      }

      $tahsil_info = $this->User_Model->get_info_arr('tahsil_id',$tahsil_id,'tahsil');
      if(!$tahsil_info){ header('location:'.base_url().'Master/pincode_list'); }
      $data['update'] = 'update';
      $data['tahsil_info'] = $tahsil_info[0];

      $data['tahsil_pincode_list'] = $this->User_Model->get_list_by_id2('*','tahsil_id',$tahsil_id,'tahsil_pincode');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/pincode', $data);
      $this->load->view('Include/footer', $data);
    }

    public function delete_pincode($tahsil_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('tahsil_id', $tahsil_id, 'tahsil');
      $this->User_Model->delete_info('tahsil_id', $tahsil_id, 'tahsil_pincode');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/pincode_list');
    }

    /******************************* Team ****************************/

    public function team_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $data['team_list'] = $this->User_Model->get_list_by_id('','','','','team_id','DESC','team');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/team_list', $data);
      $this->load->view('Include/footer', $data);
    }

    public function team(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('team_emp_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $team_status = $this->input->post('team_status');
        if(!isset($team_status)){ $team_status = 0; }
        $save_data = $_POST;
        $save_data['company_id'] = $eco_company_id;
        $save_data['team_date'] = date('d-m-Y h:i:s A');
        $save_data['team_addedby'] = $eco_user_id;
        $save_data['team_status'] = $team_status;
        unset($save_data['team_img']);
        $team_id = $this->User_Model->save_data('team', $save_data);

        if(isset($_FILES['team_img']['name'])){
           $time = time();
           $image_name = 'team_'.$team_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['team_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('team_img')){
             $up_image = array(
               'team_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('team_id', $team_id, 'team', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/team_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/team');
      $this->load->view('Include/footer');
    }

    // Edit/Update Team...
    public function edit_team($team_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('team_emp_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $team_status = $this->input->post('team_status');
        if(!isset($team_status)){ $team_status = 0; }

        $update_data = $_POST;
        $update_data['team_status'] = $team_status;
        $update_data['team_addedby'] = $eco_user_id;
        $update_data['team_date'] = date('d-m-Y h:i:s A');
        unset($update_data['team_img']);
        unset($update_data['old_img']);
        $this->User_Model->update_info('team_id', $team_id, 'team', $update_data);

        if(isset($_FILES['team_img']['name'])){
           $time = time();
           $image_name = 'team_'.$team_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['team_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('team_img')){
             $up_image = array(
               'team_img' => $image_name.'.'.$ext,
             );
             if($_POST['old_img']){ unlink("assets/images/master/".$_POST['old_img']); }
             $this->User_Model->update_info('team_id', $team_id, 'team', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/team_list');
      }

      $team_info = $this->User_Model->get_info_arr('team_id',$team_id,'team');
      if(!$team_info){ header('location:'.base_url().'Master/team_list'); }
      $data['update'] = 'update';
      $data['team_info'] = $team_info[0];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/team', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Team....
    public function delete_team($team_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $team_info = $this->User_Model->get_info_arr_fields('team_img','team_id', $team_id, 'team');
      $this->User_Model->delete_info('team_id', $team_id, 'team');
      if($team_info){ unlink("assets/images/master/".$team_info[0]['team_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/team_list');
    }

/******************************* Gallery ****************************/
    public function gallery_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $data['gallery_list'] = $this->User_Model->get_list_by_id('','','','','gallery_id','DESC','gallery');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/gallery_list', $data);
      $this->load->view('Include/footer', $data);
    }
    // Add Gallery...
    public function gallery(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('gallery_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $gallery_status = $this->input->post('gallery_status');
        if(!isset($gallery_status)){ $gallery_status = 0; }
        $save_data = $_POST;
        $save_data['company_id'] = $eco_company_id;
        $save_data['gallery_date'] = date('d-m-Y h:i:s A');
        $save_data['gallery_addedby'] = $eco_user_id;
        $save_data['gallery_status'] = $gallery_status;
        unset($save_data['gallery_img']);
        $gallery_id = $this->User_Model->save_data('gallery', $save_data);

        if(isset($_FILES['gallery_img']['name'])){
           $time = time();
           $image_name = 'gallery_'.$gallery_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['gallery_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('gallery_img')){
             $up_image = array(
               'gallery_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('gallery_id', $gallery_id, 'gallery', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/gallery_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/gallery');
      $this->load->view('Include/footer');
    }

    // Edit/Update Gallery...
    public function edit_gallery($gallery_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('gallery_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $gallery_status = $this->input->post('gallery_status');
        if(!isset($gallery_status)){ $gallery_status = 0; }

        $update_data = $_POST;
        $update_data['gallery_status'] = $gallery_status;
        $update_data['gallery_addedby'] = $eco_user_id;
        $update_data['gallery_date'] = date('d-m-Y h:i:s A');
        unset($update_data['gallery_img']);
        unset($update_data['old_img']);
        $this->User_Model->update_info('gallery_id', $gallery_id, 'gallery', $update_data);

        if(isset($_FILES['gallery_img']['name'])){
           $time = time();
           $image_name = 'gallery_'.$gallery_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['gallery_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('gallery_img')){
             $up_image = array(
               'gallery_img' => $image_name.'.'.$ext,
             );
             if($_POST['old_img']){ unlink("assets/images/master/".$_POST['old_img']); }
             $this->User_Model->update_info('gallery_id', $gallery_id, 'gallery', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/gallery_list');
      }

      $gallery_info = $this->User_Model->get_info_arr('gallery_id',$gallery_id,'gallery');
      if(!$gallery_info){ header('location:'.base_url().'Master/gallery_list'); }
      $data['update'] = 'update';
      $data['gallery_info'] = $gallery_info[0];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/gallery', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Gallery....
    public function delete_gallery($gallery_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $gallery_info = $this->User_Model->get_info_arr_fields('gallery_img','gallery_id', $gallery_id, 'gallery');
      $this->User_Model->delete_info('gallery_id', $gallery_id, 'gallery');
      if($gallery_info){ unlink("assets/images/master/".$gallery_info[0]['gallery_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/gallery_list');
    }

  /******************************* Gallery ****************************/
    public function offer_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $data['offer_list'] = $this->User_Model->get_list_by_id('','','','','offer_id','DESC','offer');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/offer_list', $data);
      $this->load->view('Include/footer', $data);
    }
    // Add Gallery...
    public function offer(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('offer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $offer_status = $this->input->post('offer_status');
        if(!isset($offer_status)){ $offer_status = 0; }
        $save_data = $_POST;
        $save_data['company_id'] = $eco_company_id;
        $save_data['offer_date'] = date('d-m-Y h:i:s A');
        $save_data['offer_addedby'] = $eco_user_id;
        $save_data['offer_status'] = $offer_status;
        unset($save_data['offer_img']);
        $offer_id = $this->User_Model->save_data('offer', $save_data);

        if(isset($_FILES['offer_img']['name'])){
           $time = time();
           $image_name = 'offer_'.$offer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['offer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('offer_img')){
             $up_image = array(
               'offer_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('offer_id', $offer_id, 'offer', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/offer_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/offer');
      $this->load->view('Include/footer');
    }

    // Edit/Update Gallery...
    public function edit_offer($offer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('offer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $offer_status = $this->input->post('offer_status');
        if(!isset($offer_status)){ $offer_status = 0; }

        $update_data = $_POST;
        $update_data['offer_status'] = $offer_status;
        $update_data['offer_addedby'] = $eco_user_id;
        $update_data['offer_date'] = date('d-m-Y h:i:s A');
        unset($update_data['offer_img']);
        unset($update_data['old_img']);
        $this->User_Model->update_info('offer_id', $offer_id, 'offer', $update_data);

        if(isset($_FILES['offer_img']['name'])){
           $time = time();
           $image_name = 'offer_'.$offer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/master/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['offer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('offer_img')){
             $up_image = array(
               'offer_img' => $image_name.'.'.$ext,
             );
             if($_POST['old_img']){ unlink("assets/images/master/".$_POST['old_img']); }
             $this->User_Model->update_info('offer_id', $offer_id, 'offer', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
            echo $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/offer_list');
      }

      $offer_info = $this->User_Model->get_info_arr('offer_id',$offer_id,'offer');
      if(!$offer_info){ header('location:'.base_url().'Master/offer_list'); }
      $data['update'] = 'update';
      $data['offer_info'] = $offer_info[0];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/offer', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Gallery....
    public function delete_offer($offer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $offer_info = $this->User_Model->get_info_arr_fields('offer_img','offer_id', $offer_id, 'offer');
      $this->User_Model->delete_info('offer_id', $offer_id, 'offer');
      if($offer_info){ unlink("assets/images/master/".$offer_info[0]['offer_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/offer_list');
    }

/***************************************** Vendor ***************************************/
  // Vendor List....
    public function vendor_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $data['vendor_list'] = $this->User_Model->get_list_by_id('','','','','vendor_id','DESC','vendor');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/vendor_list', $data);
      $this->load->view('Include/footer', $data);
    }
    // Add Vendor...
    public function vendor(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('vendor_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $vendor_status = $this->input->post('vendor_status');
        if(!isset($vendor_status)){ $vendor_status = 0; }
        $save_data = $_POST;
        $save_data['company_id'] = $eco_company_id;
        $save_data['vendor_date'] = date('d-m-Y h:i:s A');
        $save_data['vendor_addedby'] = $eco_user_id;
        $save_data['vendor_status'] = $vendor_status;
        $order_id = $this->User_Model->save_data('vendor', $save_data);

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/vendor_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/vendor');
      $this->load->view('Include/footer');
    }
    // Edit/Update Vendor...
    public function edit_vendor($vendor_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('vendor_code', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $vendor_status = $this->input->post('vendor_status');
        if(!isset($vendor_status)){ $vendor_status = 0; }

        $update_data = $_POST;
        $update_data['vendor_status'] = $vendor_status;
        $update_data['vendor_addedby'] = $eco_user_id;
        $update_data['vendor_date'] = date('d-m-Y h:i:s A');
        $this->User_Model->update_info('vendor_id', $vendor_id, 'vendor', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/vendor_list');
      }

      $vendor_info = $this->User_Model->get_info_arr('vendor_id',$vendor_id,'vendor');
      if(!$vendor_info){ header('location:'.base_url().'Master/vendor_list'); }
      $data['update'] = 'update';
      $data['vendor_info'] = $vendor_info[0];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/vendor', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Vendor....
    public function delete_vendor($vendor_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('vendor_id', $vendor_id, 'vendor');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/vendor_list');
    }

/*************************************************** Website **********************************************/

  public function slider_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['slider_list'] = $this->User_Model->get_list2('slider_id','ASC','slider');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/slider_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function slider(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $slider_status=$this->input->post('slider_status');
      if(!isset($slider_status)){ $slider_status = '1'; }
      $save_data = array(
        'slider_title' => $this->input->post('slider_title'),
        'slider_possition' => $this->input->post('slider_possition'),
        'slider_status' => $slider_status,
      );
      $slider_id=$this->User_Model->save_data('slider', $save_data);
      if(isset($_FILES['slider_img']['name'])){
         $time = time();
         $image_name = 'slider_'.$slider_id.'_'.$time;
         $config['upload_path'] = 'assets/images/slider/';
         $config['allowed_types'] = 'png|jpg|jpeg';
         $config['file_name'] = $image_name;
         $filename = $_FILES['slider_img']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         // $this->load->library('upload', $config);
         $this->upload->initialize($config);
         if ($this->upload->do_upload('slider_img')){
           $up_image = array(
             'slider_img' => $image_name.'.'.$ext,
           );
           $this->User_Model->update_info('slider_id', $slider_id, 'slider', $up_image);
         }
         else{
        echo   $error = $this->upload->display_errors();
           $this->session->set_flashdata('status',$this->upload->display_errors());
         }
       }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/slider_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/slider');
    $this->load->view('Include/footer');
  }

  public function edit_slider($slider_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('slider_title', 'Slider Title', 'trim|required');
    $data['slider_list'] = $this->User_Model->get_list2('slider_id','ASC','slider');
    if ($this->form_validation->run() != FALSE) {
      $slider_status=$this->input->post('slider_status');
      if(!isset($slider_status)){ $slider_status = '1'; }
      $update_data = array(
      'slider_title' => $this->input->post('slider_title'),
      'slider_possition' => $this->input->post('slider_possition'),
      'slider_status' => $slider_status,
      );
      $this->User_Model->update_info('slider_id', $slider_id, 'slider', $update_data);

      if(isset($_FILES['slider_img']['name'])){
        $time = time();
        $image_name = 'slider_'.$slider_id.'_'.$time;
        $config['upload_path'] = 'assets/images/slider/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['file_name'] = $image_name;
        $filename = $_FILES['slider_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('slider_img')){
          $up_image = array(
            'slider_img' => $image_name.'.'.$ext,
          );
          $this->User_Model->update_info('slider_id', $slider_id, 'slider', $up_image);
          $img_old = $this->input->post('img_old');
          unlink("assets/images/slider/".$img_old);
        }
        else{
          echo $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/slider_list');
    }
    // Edit Info...
    $slider_info = $this->User_Model->get_info('slider_id', $slider_id, 'slider');
    if($slider_info == ''){ header('location:'.base_url().'Master/slider_list'); }
    foreach($slider_info as $info_b){
    $data['update'] = 'update';
    $data['slider_title'] = $info_b->slider_title;
    $data['slider_possition'] = $info_b->slider_possition;
    $data['slider_status'] = $info_b->slider_status;
    $data['slider_img'] = $info_b->slider_img;
    }
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/slider', $data);
    $this->load->view('Include/footer', $data);
  }

  public function delete_slider($slider_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $slider_info = $this->User_Model->get_info_arr_fields('slider_img','slider_id', $slider_id, 'slider');
    $this->User_Model->delete_info('slider_id', $slider_id, 'slider');
    if($slider_info){ unlink("assets/images/slider/".$slider_info[0]['slider_img']); }
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/slider_list');
  }

/******************************* CookBook Contest ********************************/

  public function cookbook_reg_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['cookbook_reg_list'] = $this->User_Model->get_list2('cookbook_reg_id','DESC','cookbook_reg');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/cookbook_reg_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function product_req_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['product_req_list'] = $this->User_Model->get_list2('req_product_id','DESC','req_product');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/product_req_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function reseller_reg_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['reseller_reg_list'] = $this->User_Model->get_list2('reseller_reg_id','DESC','reseller_reg');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/reseller_reg_list', $data);
    $this->load->view('Include/footer', $data);
  }
}
