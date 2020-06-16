<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Order_Model');
    // $this->load->model('Transaction_Model');
  }

/************************************** Order ***********************************/

  public function get_cust_info(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $customer_id = $_POST['customer_id'];
    $customer_info = $this->User_Model->get_info_arr('customer_id',$customer_id,'customer');
    echo json_encode($customer_info);
  }

  // Order List...
  public function order_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2 && $eco_role_id != 3 && $eco_role_id != 4 && $eco_role_id != 5)){ header('location:'.base_url().'User'); }
    $data['order_list'] = $this->Order_Model->order_list();
    $data['order_status_list'] = $this->User_Model->get_list2('order_status_id','ASC','order_status');
    $data['delivery_boy_list'] = $this->User_Model->get_list_by_id2('user_id, user_name','role_id',7,'user');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/order_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Order...
  public function order(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2 && $eco_role_id != 3 && $eco_role_id != 4 && $eco_role_id != 5)){ header('location:'.base_url().'User'); }
    // echo $eco_role_id;
    $this->form_validation->set_rules('order_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      // $is_addr_same = $this->input->post('is_addr_same');
      // if(!isset($is_addr_same)){ $is_addr_same = 0; }
      $save_data = $_POST;
      unset($save_data['select_product']);
      unset($save_data['input']);
      $save_data['order_added_date'] = date('d-m-Y h:i:s A');
      $save_data['order_addedby'] = $eco_user_id;
      // $save_data['is_addr_same'] = $is_addr_same;

      // if($is_addr_same == 1){
      //   $save_data['order_cust_s_fname'] = $this->input->post('order_cust_fname');
      //   $save_data['order_cust_s_lname'] = $this->input->post('order_cust_lname');
      //   $save_data['order_cust_s_addr'] = $this->input->post('order_cust_addr');
      //   $save_data['order_cust_s_city'] = $this->input->post('order_cust_city');
      //   $save_data['order_cust_s_pin'] = $this->input->post('order_cust_pin');
      //   $save_data['order_cust_s_mob'] = $this->input->post('order_cust_mob');
      // }
      $order_id = $this->User_Model->save_data('order_tbl', $save_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['order_id'] = $order_id;
        $multi_data['order_pro_date'] = date('d-m-Y h:i:s A');
        $this->db->insert('order_pro', $multi_data);
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Order/order_list');
    }

    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    // $data['product_list'] = $this->Order_Model->product_list($eco_company_id);
    $data['product_list'] = $this->Order_Model->order_product_list($eco_company_id);
    $data['order_no'] = $this->User_Model->get_count_no('order_no', 'order_tbl');
    // print_r($data['product_list']);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/order', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Order...
  public function edit_order($order_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('order_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      // $is_addr_same = $this->input->post('is_addr_same');
      // if(!isset($is_addr_same)){ $is_addr_same = 0; }
      $update_data = $_POST;
      unset($update_data['select_product']);
      unset($update_data['input']);
      // $update_data['company_id'] = $eco_company_id;
      $update_data['order_added_date'] = date('d-m-Y h:i:s A');
      $update_data['order_addedby'] = $eco_user_id;
      // $update_data['is_addr_same'] = $is_addr_same;

      // if($is_addr_same == 1){
      //   $update_data['order_cust_s_fname'] = $this->input->post('order_cust_fname');
      //   $update_data['order_cust_s_lname'] = $this->input->post('order_cust_lname');
      //   $update_data['order_cust_s_addr'] = $this->input->post('order_cust_addr');
      //   $update_data['order_cust_s_city'] = $this->input->post('order_cust_city');
      //   $update_data['order_cust_s_pin'] = $this->input->post('order_cust_pin');
      //   $update_data['order_cust_s_mob'] = $this->input->post('order_cust_mob');
      // }
      $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_data);
      foreach($_POST['input'] as $multi_data){
        if(isset($multi_data['order_pro_id'])){
          $order_pro_id = $multi_data['order_pro_id'];
          if(!isset($multi_data['order_pro_name'])){
            $this->User_Model->delete_info('order_pro_id', $order_pro_id, 'order_pro');
          }else{
            $multi_data['order_pro_date'] = date('d-m-Y h:i:s A');
            $this->User_Model->update_info('order_pro_id', $order_pro_id, 'order_pro', $multi_data);
          }
        }
        else{
          $multi_data['order_id'] = $order_id;
          $multi_data['order_pro_date'] = date('d-m-Y h:i:s A');
          $this->db->insert('order_pro', $multi_data);
        }
      }
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Order/order_list');
    }

    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    $data['product_list'] = $this->Order_Model->product_list($eco_company_id);
    $order_info = $this->User_Model->get_info_arr('order_id',$order_id,'order_tbl');
    if(!$order_info){ header('location:'.base_url().'Order/order_list'); }
    $data['update'] = 'update';
    $data['order_info'] = $order_info[0];
    $data['order_pro_list'] = $this->User_Model->get_list_by_id('order_id',$order_id,'','','order_pro_id','ASC','order_pro');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/order', $data);
    $this->load->view('Include/footer', $data);
  }

  public function get_product_by_attr_id(){
    $pro_attri_id = $this->input->post('pro_attri_id');
    $product_details_by_attr_id = $this->Order_Model->product_details_by_attr_id($pro_attri_id);
    $data = $product_details_by_attr_id[0];
    echo json_encode($data);
  }

  // Edit/Update Order...
  public function order_details($order_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    // $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    $data['product_list'] = $this->Order_Model->product_list($eco_company_id);
    $order_info = $this->User_Model->get_info_arr('order_id',$order_id,'order_tbl');
    if(!$order_info){ header('location:'.base_url().'Order/order_list'); }
    $data['order_info'] = $order_info[0];
    $data['order_pro_list'] = $this->User_Model->get_list_by_id('order_id',$order_id,'','','order_pro_id','ASC','order_pro');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/order_details', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Order.....
  public function delete_order($order_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('order_id', $order_id, 'order_tbl');
    $this->User_Model->delete_info('order_id', $order_id, 'order_pro');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Order/order_list');
  }

  // Change Status Order.....
  public function update_order_status(){
    $order_id = $this->input->post('order_id');
    $order_status = $this->input->post('order_status');
    // $update_data['order_status'] = $order_status;
    $update_data = $_POST;
    unset($update_data['order_id']);
    $this->User_Model->update_info('order_id', $order_id, 'order_tbl', $update_data);
    $status_info = $this->User_Model->get_info_arr('order_status_id',$order_status,'order_status');
    echo $status_info[0]['order_status_name'];
  }

/************************************** Receipt ***********************************/

  // Receipt List...
  public function receipt_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['receipt_list'] = $this->User_Model->get_list2('receipt_id','ASC','receipt');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/receipt_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Receipt...
  public function receipt(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('receipt_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = $_POST;
      $save_data['company_id'] = $eco_company_id;
      $save_data['receipt_added_date'] = date('d-m-Y h:i:s A');
      $save_data['receipt_addedby'] = $eco_user_id;

      $receipt_id = $this->User_Model->save_data('receipt', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Order/receipt_list');
    }

    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    $data['receipt_no'] = $this->User_Model->get_count_no('receipt_no', 'receipt');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit/Update Receipt...
  public function edit_receipt($receipt_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('receipt_no', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = $_POST;
      $update_data['company_id'] = $eco_company_id;
      $update_data['receipt_added_date'] = date('d-m-Y h:i:s A');
      $update_data['receipt_addedby'] = $eco_user_id;

      $this->User_Model->update_info('receipt_id', $receipt_id, 'receipt', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Order/receipt_list');
    }
    $receipt_info = $this->User_Model->get_info_arr('receipt_id',$receipt_id,'receipt');
    if(!$receipt_info){ header('location:'.base_url().'Order/receipt_list'); }
    $data['update'] = 'update';
    $data['receipt_info'] = $receipt_info[0];
    $data['customer_list'] = $this->User_Model->get_list_by_id('customer_status',1,'','','customer_fname','ASC','customer');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/receipt', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Receipt.....
  public function delete_receipt($receipt_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('receipt_id', $receipt_id, 'receipt');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Order/receipt_list');
  }
  // Get Customer Outstanding...
  public function get_customer_outstanding(){
    $customer_id = $this->input->post('customer_id');
    $total_order_amount = $this->User_Model->get_sum('','order_total_amount','customer_id',$customer_id,'','','order_tbl');
    $total_receipt_amount = $this->User_Model->get_sum('','receipt_amt','customer_id',$customer_id,'','','receipt');
    $outstanding_amount = $total_order_amount - $total_receipt_amount;
    echo $outstanding_amount;
  }


/*********************************** Booklet Order **********************************/

  public function booklet_order(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 1 && $eco_role_id != 2)){ header('location:'.base_url().'User'); }
    $data['booklet_order_list'] = $this->User_Model->get_list2('order_upl_id','DESC','order_upl');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/booklet_order', $data);
    $this->load->view('Include/footer', $data);
  }

/*************************************** Delivery Boy *****************************/
  public function delivery_boy_order_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || ($eco_role_id != 7)){ header('location:'.base_url().'User'); }

    $data['order_list'] = $this->Order_Model->delivery_boy_order_list($eco_user_id);
    $data['order_status_list'] = $this->User_Model->get_list2('order_status_id','ASC','order_status');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Order/delivery_boy_order_list', $data);
    $this->load->view('Include/footer', $data);

    // print_r($data['order_list']);
  }


}
?>
