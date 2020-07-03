<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
    // $this->load->model('Transaction_Model');
  }


  public function checkout_payment(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }

    $row_count = count($this->cart->contents());
    if($row_count == 0){ header('location:'.base_url().''); }
    $data['page_name'] = "Cart";

    $this->load->view('Website/checkout_payment',$data);
  }



    public function checkout_payment_success() {
      $eco_cust_id = $this->session->userdata('eco_cust_id');
      $cart_total = $this->cart->total();
      $razorpay_payment_id = $_POST['razorpay_payment_id'];
      $razorpay_order_id = $_POST['razorpay_order_id'];
      $razorpay_signature = $_POST['razorpay_signature'];

      $coupon_id = $this->session->userdata('coupon_id');
      $coupon_code = $this->session->userdata('coupon_code');
      $coupon_amt = $this->session->userdata('coupon_amt');
      $wallet_point_used = $this->session->userdata('wallet_point_used');
      $final_payment_amt = $this->session->userdata('final_payment_amt');

      if (!$coupon_amt) {  $coupon_amt = 0;  }
      if (!$wallet_point_used) {  $wallet_point_used = 0;  }

      if($cart_total >= 999){ $shipping_amt = 0;  }
      else{ $shipping_amt = 100; }

      if(!$final_payment_amt){
        $final_payment_amt = $cart_total + $shipping_amt;
        $final_payment_amt = $final_payment_amt - $coupon_amt;
        $final_payment_amt = $final_payment_amt - $wallet_point_used;
        $this->session->set_userdata('final_payment_amt',$final_payment_amt);
      }

      $gst_amt = 0;
      foreach ($this->cart->contents() as $items) {
        $gst_amt = $gst_amt + $items['product_gst_amt'];
      }
      $order_data = $this->session->userdata('order_data');
      $order_id = $this->User_Model->save_data('order_tbl', $order_data);

      foreach ($this->cart->contents() as $items) {
        $save_pro_data['pro_attri_id'] = $items['id'];
        $save_pro_data['product_id'] = $items['product_id'];
        $save_pro_data['order_id'] = $order_id;
        $save_pro_data['order_pro_name'] = $items['product_name'];
        $save_pro_data['order_pro_weight'] = $items['product_weight'];
        $save_pro_data['order_pro_tot_weight'] = $items['product_tot_weight'];
        $save_pro_data['order_pro_unit'] = $items['product_unit'];
        $save_pro_data['order_pro_mrp'] = $items['product_mrp'];
        $save_pro_data['order_pro_price'] = $items['product_price'];
        $save_pro_data['order_pro_dis_per'] = $items['product_dis_per'];
        $save_pro_data['order_pro_dis_amt'] = $items['product_dis_amt'];
        $save_pro_data['order_pro_gst_per'] = $items['product_gst_per'];
        $save_pro_data['order_pro_gst_amt'] = $items['product_gst_amt'];
        $save_pro_data['order_pro_qty'] = $items['product_qty'];
        $save_pro_data['order_pro_basic_amt'] = $items['product_basic_amt'];
        $save_pro_data['order_pro_amt'] = $items['product_amt'];
        $save_pro_data['order_pro_date'] = date('d-m-Y h:i:s A');
        $this->User_Model->save_data('order_pro', $save_pro_data);
      }

      // Save Online Payment Data...
      $save_online_pay['customer_id'] = $eco_cust_id;
      $save_online_pay['order_id'] = $order_id;
      $save_online_pay['razorpay_payment_id'] = $razorpay_payment_id;
      $save_online_pay['razorpay_order_id'] = $razorpay_order_id;
      $save_online_pay['online_payment_amt'] = $final_payment_amt;
      $save_online_pay['cart_amount'] = $cart_total;
      $save_online_pay['shipping_amt'] = $shipping_amt;
      $save_online_pay['total_pay_amt'] = $cart_total + $shipping_amt;
      $save_online_pay['coupon_use_amt'] = $coupon_amt;
      $save_online_pay['point_use_amt'] = $wallet_point_used;
      $save_online_pay['online_payment_date'] = date('d-m-Y');
      $save_online_pay['online_payment_time'] = date('h:i A');
      $this->User_Model->save_data('order_online_payment', $save_online_pay);

      // Save Used Coupon...
      if($coupon_code != '' && $coupon_id != '' && $coupon_amt > 0){
        $save_coupon_use['order_id'] = $order_id;
        $save_coupon_use['customer_id'] = $eco_cust_id;
        $save_coupon_use['coupon_id'] = $coupon_id;
        $save_coupon_use['coupon_code'] = $coupon_code;
        $save_coupon_use['coupon_used_dis_amt'] = $coupon_amt;
        $save_coupon_use['coupon_used_date'] = date('d-m-Y');
        $save_coupon_use['coupon_used_time'] = date('h:i:s A');
        $this->User_Model->save_data('coupon_used', $save_coupon_use);
      }
      // Save Used Points...
      if($wallet_point_used > 0){
        $save_point_use['customer_id'] = $eco_cust_id;
        $save_point_use['order_id'] = $order_id;
        $save_point_use['point_use_cnt'] = $wallet_point_used;
        $save_point_use['point_use_date'] = date('d-m-Y');
        $save_point_use['point_use_time'] = date('h:i:s A');
        $this->User_Model->save_data('point_use', $save_point_use);
      }

      if($cart_total >= 999){
        $save_point_add['customer_id'] = $eco_cust_id;
        $save_point_add['point_add_type'] = 3;
        $save_point_add['point_add_ref_id'] = $order_id;
        $save_point_add['point_add_cnt'] = 5;
        $save_point_add['point_add_date'] = date('d-m-Y');
        $save_point_add['point_add_time'] = date('h:i:s A');
        $this->User_Model->save_data('point_add', $save_point_add);
      }

      redirect('../Payment/checkout_paym_succ_msg');
    }

    public function checkout_paym_succ_msg(){
      $this->session->unset_userdata('coupon_id');
      $this->session->unset_userdata('coupon_code');
      $this->session->unset_userdata('coupon_amt');
      $this->session->unset_userdata('wallet_point_used');
      $this->session->unset_userdata('final_payment_amt');
      $this->session->unset_userdata('is_final_payment_amt');
      $this->session->unset_userdata('is_final_payment_amt');
      $this->cart->destroy();

      $data['pay_msg'] = "Your order place successfully";

      $this->load->view('Website/payment_success',$data);
    }

/********************************* Membership Payment **********************************/

  public function membership_payment_success($mem_sch_id){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $razorpay_order_id = $_POST['razorpay_order_id'];
    $razorpay_signature = $_POST['razorpay_signature'];

    $today = date('d-m-Y');

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
      'razorpay_payment_id' => $razorpay_payment_id,
      'razorpay_order_id' => $razorpay_order_id,
    );

    $this->User_Model->save_data('cust_membership', $save_data);
    $this->session->set_flashdata('membership_sts','success');

    redirect('../Membership-Success');
  }

  public function mem_paym_succ_msg(){
    $data['pay_msg'] = "Your Membership Plan Activated Successfully";
    $this->load->view('Website/payment_success',$data);
  }


/***************************************** Wallet Payment ******************************/

  public function wallet_payment_success(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $razorpay_order_id = $_POST['razorpay_order_id'];
    $razorpay_signature = $_POST['razorpay_signature'];

    $wallet_add_amount = $this->session->userdata('wallet_fund_amount');
    $save_wallet_data = array(
      'customer_id' => $eco_cust_id,
      'wallet_add_amount' => $wallet_add_amount,
      'razorpay_payment_id' => $razorpay_payment_id,
      'razorpay_order_id' => $razorpay_order_id,
      'wallet_add_date' => date('d-m-Y'),
      'wallet_add_time' => date('h:i:s A'),
    );
    $wallet_add_id = $this->User_Model->save_data('wallet_add', $save_wallet_data);

    $save_point_data = array(
      'customer_id' => $eco_cust_id,
      'point_add_type' => 1,
      'point_add_ref_id' => $wallet_add_id,
      'point_add_cnt' => $wallet_add_amount,
      'point_add_date' => date('d-m-Y'),
      'point_add_time' => date('h:i:s A'),
    );
    $point_add_id = $this->User_Model->save_data('point_add', $save_point_data);

    $this->session->set_flashdata('save_success','success');
    redirect('../Wallet-Success');
  }

  public function wallet_paym_succ_msg(){
    $data['pay_msg'] = "Fund Added In Your Wallet Successfully";
    $this->load->view('Website/payment_success',$data);
  }

}
?>
