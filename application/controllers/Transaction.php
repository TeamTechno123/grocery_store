<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{

  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Order_Model');
    // $this->load->model('Transaction_Model');
  }

/*************************************** Employee_Cash **********************************/
  // Employee_Cash List...
  public function employee_cash_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''|| ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $data['employee_cash_list'] = $this->User_Model->get_list2('employee_cash_id','DESC','employee_cash');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/employee_cash_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Employee_Cash...
  public function employee_cash(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''|| ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('employee_cash_amt', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $eco_company_id;
      $save_data['employee_cash_added_date'] = date('d-m-Y h:i:s A');
      $save_data['employee_cash_addedby'] = $eco_user_id;

      $employee_cash_id = $this->User_Model->save_data('employee_cash', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/employee_cash_list');
    }

    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Transaction/employee_cash');
    $this->load->view('Include/footer');
  }

  // Edit/Update Employee_Cash...
  public function edit_employee_cash($employee_cash_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''|| ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('employee_cash_amt', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['company_id'] = $eco_company_id;
      $update_data['employee_cash_added_date'] = date('d-m-Y h:i:s A');
      $update_data['employee_cash_addedby'] = $eco_user_id;

      $this->User_Model->update_info('employee_cash_id', $employee_cash_id, 'employee_cash', $update_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/employee_cash_list');
    }

    $employee_cash_info = $this->User_Model->get_info_arr('employee_cash_id',$employee_cash_id,'employee_cash');
    if(!$employee_cash_info){ header('location:'.base_url().'Transaction/employee_cash_list'); }
    $data['update'] = 'update';


    $user_id =  $employee_cash_info[0]['employee_user_id'];

    $user_info = $this->User_Model->get_info_arr('user_id',$user_id,'user');
    $employee_cash_info[0]['employee_mob_num'] = $user_info[0]['user_mobile'];
    $employee_cash_info[0]['employee_name'] = $user_info[0]['user_name'];
    $employee_cash_info[0]['employee_city'] = $user_info[0]['user_city'];
    $employee_cash_info[0]['employee_mobile'] = $user_info[0]['user_mobile'];
    $employee_cash_info[0]['employee_email'] = $user_info[0]['user_email'];

    $data['employee_cash_info'] = $employee_cash_info[0];
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/employee_cash', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Receipt.....
  public function delete_employee_cash($employee_cash_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('employee_cash_id', $employee_cash_id, 'employee_cash');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/employee_cash_list');
  }

  public function get_employee_details(){
    $employee_mob_num = $this->input->post('employee_mob_num');
    $employee_info = $this->User_Model->get_info_arr_fields('user_id,user_name,user_city,user_mobile,user_email','user_mobile',$employee_mob_num,'user');
    echo json_encode($employee_info);
  }

/******************************** Membership Approval ****************************/

  public function membership_approve_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $data['membership_list'] = $this->User_Model->get_list_by_id('cust_mem_status',0,'cust_mem_addedby >',0,'cust_mem_id','DESC','cust_membership');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/membership_approve_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function approve_membership($cust_mem_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $update_data['cust_mem_status'] = 1;
    $update_data['cust_mem_date'] =  date('d-m-Y h:i:s A');
    $this->User_Model->update_info('cust_mem_id', $cust_mem_id, 'cust_membership', $update_data);

    // Send SMS...
    $cust_mem_info = $this->User_Model->get_info_arr_fields('customer_id','cust_mem_id', $cust_mem_id, 'cust_membership');
    $customer_id = $cust_mem_info[0]['customer_id'];
    $customer_info = $this->User_Model->get_info_arr_fields('customer_mobile','customer_id', $customer_id, 'customer');
    $mobile_no = $customer_info[0]['customer_mobile'];
    $msg = "Your Membership of kiranabhara.com. is Activated Successfuly";
    $this->Website_Model->send_sms($mobile_no, $msg);

    $this->session->set_flashdata('approve_success','success');
    header('location:'.base_url().'Transaction/membership_approve_list');
  }

/******************************************* Sale *******************************************/

  public function sale_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $data['sale_list'] = $this->User_Model->get_list_by_id('','','','','sale_id','DESC','sale');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/sale_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function sale(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('sale_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      unset($save_data['select_product']);
      unset($save_data['input']);
      // $save_data['company_id'] = $eco_company_id;
      $save_data['sale_added_date'] = date('d-m-Y h:i:s A');
      $save_data['sale_addedby'] = $eco_user_id;

      $sale_id = $this->User_Model->save_data('sale', $save_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['sale_id'] = $sale_id;
        $multi_data['sale_pro_date'] = date('d-m-Y h:i:s A');
        $this->db->insert('sale_pro', $multi_data);
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/sale_list');
    }

    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    // $data['product_list'] = $this->Order_Model->product_list($eco_company_id);
    $data['product_list'] = $this->Order_Model->order_product_list($eco_company_id);
    $data['sale_no'] = $this->User_Model->get_count_no('sale_no', 'sale');
    // print_r($data['product_list']);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/sale', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Sale...
  public function edit_sale($sale_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('sale_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['select_product']);
      unset($update_data['input']);
      // $update_data['company_id'] = $eco_company_id;
      $update_data['sale_added_date'] = date('d-m-Y h:i:s A');
      $update_data['sale_addedby'] = $eco_user_id;

      $this->User_Model->update_info('sale_id', $sale_id, 'sale', $update_data);
      foreach($_POST['input'] as $multi_data){
        if(isset($multi_data['sale_pro_id'])){
          $sale_pro_id = $multi_data['sale_pro_id'];
          if(!isset($multi_data['sale_pro_name'])){
            $this->User_Model->delete_info('sale_pro_id', $sale_pro_id, 'sale_pro');
          }else{
            $multi_data['sale_pro_date'] = date('d-m-Y h:i:s A');
            $this->User_Model->update_info('sale_pro_id', $sale_pro_id, 'sale_pro', $multi_data);
          }
        }
        else{
          $multi_data['sale_id'] = $sale_id;
          $multi_data['sale_pro_date'] = date('d-m-Y h:i:s A');
          $this->db->insert('sale_pro', $multi_data);
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/sale_list');
    }

    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    $data['product_list'] = $this->Order_Model->product_list($eco_company_id);
    $sale_info = $this->User_Model->get_info_arr('sale_id',$sale_id,'sale');
    if(!$sale_info){ header('location:'.base_url().'Transaction/sale_list'); }
    $data['update'] = 'update';
    $data['sale_info'] = $sale_info[0];
    $data['sale_pro_list'] = $this->User_Model->get_list_by_id('sale_id',$sale_id,'','','sale_pro_id','ASC','sale_pro');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/sale', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Sale.....
  public function delete_sale($sale_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('sale_id', $sale_id, 'sale');
    $this->User_Model->delete_info('sale_id', $sale_id, 'sale_pro');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/sale_list');
  }

  /********************************************* Purchase *********************************/

  public function purchase_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $data['purchase_list'] = $this->User_Model->get_list_by_id('','','','','purchase_id','DESC','purchase');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/purchase_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function purchase(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('purchase_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      unset($save_data['select_product']);
      unset($save_data['input']);
      // $save_data['company_id'] = $eco_company_id;
      $save_data['purchase_added_date'] = date('d-m-Y h:i:s A');
      $save_data['purchase_addedby'] = $eco_user_id;

      $purchase_id = $this->User_Model->save_data('purchase', $save_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['purchase_id'] = $purchase_id;
        $multi_data['purchase_pro_date'] = date('d-m-Y h:i:s A');
        $this->db->insert('purchase_pro', $multi_data);
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/purchase_list');
    }

    $data['vendor_list'] = $this->User_Model->get_list_by_id('vendor_status',1,'','','vendor_name','ASC','vendor');
    $data['product_list'] = $this->User_Model->get_list_by_id('product_status',1,'','','product_name','ASC','product');
    $data['unit_list'] = $this->User_Model->get_list_by_id('unit_status',1,'','','unit_name','ASC','unit');
    // $data['product_list'] = $this->Order_Model->order_product_list($eco_company_id);
    $data['purchase_no'] = $this->User_Model->get_count_no('purchase_no', 'purchase');
    // print_r($data['product_list']);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/purchase', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Purchase...
  public function edit_purchase($purchase_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('purchase_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      unset($update_data['select_product']);
      unset($update_data['input']);
      // $update_data['company_id'] = $eco_company_id;
      $update_data['purchase_added_date'] = date('d-m-Y h:i:s A');
      $update_data['purchase_addedby'] = $eco_user_id;

      $this->User_Model->update_info('purchase_id', $purchase_id, 'purchase', $update_data);

      foreach($_POST['input'] as $multi_data){
        if(isset($multi_data['purchase_pro_id'])){
          $purchase_pro_id = $multi_data['purchase_pro_id'];
          if(!isset($multi_data['product_id'])){
            $this->User_Model->delete_info('purchase_pro_id', $purchase_pro_id, 'purchase_pro');
          }else{
            $multi_data['purchase_pro_date'] = date('d-m-Y h:i:s A');
            $this->User_Model->update_info('purchase_pro_id', $purchase_pro_id, 'purchase_pro', $multi_data);
          }
        }
        else{
          $multi_data['purchase_id'] = $purchase_id;
          $multi_data['purchase_pro_date'] = date('d-m-Y h:i:s A');
          $this->db->insert('purchase_pro', $multi_data);
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Transaction/purchase_list');
    }

    $data['vendor_list'] = $this->User_Model->get_list_by_id('vendor_status',1,'','','vendor_name','ASC','vendor');
    $data['product_list'] = $this->User_Model->get_list_by_id('product_status',1,'','','product_name','ASC','product');
    $data['unit_list'] = $this->User_Model->get_list_by_id('unit_status',1,'','','unit_name','ASC','unit');

    $purchase_info = $this->User_Model->get_info_arr('purchase_id',$purchase_id,'purchase');
    if(!$purchase_info){ header('location:'.base_url().'Transaction/purchase_list'); }
    $data['update'] = 'update';
    $data['purchase_info'] = $purchase_info[0];
    $data['purchase_pro_list'] = $this->User_Model->get_list_by_id('purchase_id',$purchase_id,'','','purchase_pro_id','ASC','purchase_pro');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/purchase', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Purchase.....
  public function delete_purchase($purchase_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('purchase_id', $purchase_id, 'purchase');
    $this->User_Model->delete_info('purchase_id', $purchase_id, 'purchase_pro');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/purchase_list');
  }

/************************************************ Stock **********************************/

  public function stock(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1)){ header('location:'.base_url().'User'); }
    $product_list = $this->User_Model->get_list_by_id('product_status',1,'','','product_name','ASC','product');

    foreach ($product_list as $product_list1) {
      $product_id = $product_list1->product_id;
      $product_unit = $product_list1->product_unit;
      $tot_purchase = $this->User_Model->get_sum('','purchase_pro_tot_weight','product_id',$product_id,'','','purchase_pro');
      if(!$tot_purchase){ $tot_purchase = 0; }

      $tot_sale = $this->User_Model->get_tot_sale($product_id);
      if(!$tot_sale){ $tot_sale = 0; }
      $bal_stock = $tot_purchase - $tot_sale;

      $product_list1->tot_purchase = $tot_purchase.' '.$product_unit;
      $product_list1->tot_sale = $tot_sale.' '.$product_unit;
      $product_list1->bal_stock = $bal_stock.' '.$product_unit;

      $product_list2[] = $product_list1;
    }
    $data['product_list'] = $product_list2;
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/stock', $data);
    $this->load->view('Include/footer', $data);
  }


}
