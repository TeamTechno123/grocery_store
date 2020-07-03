<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Report_Model');
  }

  // public function order_print(){
  //   $this->load->view('Report/order_print');
  // }
  //
  // public function receipt_print(){
  //   $this->load->view('Report/receipt_print');
  // }

  public function active_memberships(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }
    $data['customer_list'] = $this->User_Model->get_list2('customer_id','DESC','customer');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Report/active_memberships', $data);
    $this->load->view('Include/footer', $data);
  }

  public function customer_report(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $today = date('d-m-Y');
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $user_id = $_POST['user_id'];
      $data['report'] = 'customer_report';
      $data['user_id'] = $user_id;
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;

      $data['customer_report_list'] = $this->Report_Model->customer_report_list($user_id,$today,$from_date,$to_date);
    }

    $data['role_list'] = $this->User_Model->get_list_by_id('role_id !=','4','role_id !=','7','role_id','ASC','role');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Report/customer_report', $data);
    $this->load->view('Include/footer', $data);
  }

  public function get_user_by_role(){
    $role_id = $this->input->post('role_id');
    $user_list = $this->User_Model->get_list_by_id('role_id',$role_id,'','','user_name','ASC','user');
    echo "<option value='' selected >Select Employee</option>";
    foreach ($user_list as $list) {
      echo "<option value=".$list->user_id." > ".$list->user_name." </option>";
    }
  }


  public function order_report(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $order_status_id = $_POST['order_status_id'];
      $data['report'] = 'order_report';
      $data['order_status_id'] = $order_status_id;
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['order_report_list'] = $this->Report_Model->order_report_list($order_status_id,$from_date,$to_date);
    }

    $data['order_status_list'] = $this->User_Model->get_list_by_id('','','','','order_status_id','ASC','order_status');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Report/order_report', $data);
    $this->load->view('Include/footer', $data);
  }

  public function vendor_report(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('from_date', 'From Date', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $from_date = $_POST['from_date'];
      $to_date = $_POST['to_date'];
      $vendor_id = $_POST['vendor_id'];
      $data['report'] = 'vendor_report';
      $data['vendor_id'] = $vendor_id;
      $data['from_date'] = $from_date;
      $data['to_date'] = $to_date;
      $data['vendor_report_list'] = $this->Report_Model->vendor_report_list($vendor_id,$from_date,$to_date);
    }

    $data['vendor_list'] = $this->User_Model->get_list_by_id('','','','','vendor_name','ASC','vendor');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Report/vendor_report', $data);
    $this->load->view('Include/footer', $data);
  }

}
?>
