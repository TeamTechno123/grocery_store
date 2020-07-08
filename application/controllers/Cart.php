<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
    // $this->load->model('Transaction_Model');
  }

  public function add_to_wishlist(){
    $customer_id = $this->session->userdata('eco_cust_id');
    if(!$customer_id){
      $result['code'] = 1;
      $result['msg'] = 'Please Login First';
    } else{
      $product_id = $this->input->post('product_id');

      $wishlist_info = $this->User_Model->get_info_arr2_fields('wishlist_id', 'product_id', $product_id, 'customer_id', $customer_id, '', '', 'wishlist');
      if($wishlist_info){
        $result['code'] = 1;
        $result['msg'] = 'Product Already Exist in Wishlist';
      } else{
        $save_data['customer_id'] = $customer_id;
        $save_data['product_id'] = $product_id;
        $this->User_Model->save_data('wishlist', $save_data);
        $result['code'] = 2;
        $result['msg'] = 'Product Added to Wishlist Successfully';
      }
    }
    echo json_encode($result);
  }

  public function remove_from_wishlist(){
    $wishlist_id = $this->input->post('wishlist_id');
    $this->User_Model->delete_info('wishlist_id', $wishlist_id, 'wishlist');
    $result = 'Product Removed from Wishlist';
    echo $result;
  }

  public function add_to_cart(){
    // $this->cart->destroy();
    $product_mrp = $this->input->post('product_mrp');
    $product_dis_amt = $this->input->post('product_dis_amt');
    $product_qty = $this->input->post('product_qty');
    $product_tot_mrp = $product_mrp * $product_qty;
    $product_tot_dis_amt = $product_dis_amt * $product_qty;

    $product_weight = $this->input->post('product_weight');

    $product_price = $this->input->post('product_price');
    $product_amt = $product_qty * $product_price;
    $product_amt = round($product_amt,2);

    $product_gst_per = $this->input->post('product_gst_per');
    // $product_gst_amt = $product_amt - ($product_amt * (100/(100 + $product_gst_per)));
    // $product_gst_amt = round($product_gst_amt, 2) ;

    // $product_basic_amt = ($product_amt - $product_gst_amt);
    // $product_basic_amt = round($product_basic_amt, 2);

    // $product_amt = $product_qty * $product_qty;


    $data = array(
      'id' => $this->input->post('pro_attri_id'),
      'name' => $this->input->post('product_name'),
      'qty' => $this->input->post('product_qty'),
      'price' => $this->input->post('product_price'),
      'pro_attri_id' => $this->input->post('pro_attri_id'),
      'product_id' => $this->input->post('product_id'),
      'product_name' => $this->input->post('product_name'),
      'product_mrp' => $this->input->post('product_mrp'),
      'product_price' => $this->input->post('product_price'),
      'product_dis_per' => $this->input->post('product_dis_per'),
      'product_dis_amt' => $this->input->post('product_dis_amt'),
      'product_weight' => $this->input->post('product_weight'),
      'product_unit' => $this->input->post('product_unit'),
      'product_qty' => $this->input->post('product_qty'),
      'product_gst_per' => $product_gst_per,

      'product_tot_mrp' => 0,
      'product_tot_dis_amt' => 0,
      'product_gst_amt' => 0,
      'product_tot_weight' => 0,
      'product_basic_amt' => 0,
      'product_amt' => 0,
    );
    $rowid = $this->cart->insert($data);

    $item_row_data = $this->cart->get_item($rowid);

    $product_qty = $item_row_data['qty'];

    $product_mrp = $item_row_data['product_mrp'];
    $product_dis_amt = $item_row_data['product_dis_amt'];
    $product_tot_mrp = $product_mrp * $product_qty;
    $product_tot_dis_amt = $product_dis_amt * $product_qty;

    $product_weight = $item_row_data['product_weight'];
    $product_tot_weight = $product_weight * $product_qty;

    $product_price = $item_row_data['product_price'];
    $product_amt = $product_qty * $product_price;
    $product_amt = round($product_amt,2);

    $product_gst_per = $item_row_data['product_gst_per'];
    $product_gst_amt = $product_amt - ($product_amt * (100/(100 + $product_gst_per)));
    $product_gst_amt = round($product_gst_amt,2);

    $product_basic_amt = $product_amt - $product_gst_amt;
    $product_basic_amt = round($product_basic_amt,2);

    $data = array(
      'rowid' => $rowid,
      'product_tot_mrp' => $product_tot_mrp,
      'product_tot_dis_amt' => $product_tot_dis_amt,
      'product_gst_amt' => $product_gst_amt,
      'product_tot_weight' => $product_tot_weight,
      'product_basic_amt' => $product_basic_amt,
      'product_amt' => $product_amt,
    );
    $this->cart->update($data);

    echo $this->modal_view_cart();
  }

  public function modal_view_cart(){
    $output = '';
    $output .='
      <table class="table w-100" id="tbl_modal_cart">

        <tbody>
    ';
    $count = 0;
    foreach ($this->cart->contents() as $items) {
      $count++;
      $product_img_info = $this->User_Model->get_info_arr_fields('product_img','product_id', $items['product_id'], 'product');
      $output .='
        <tr>
          <td class="px-0"> <img width="60px" src="assets/images/product/'.$product_img_info[0]['product_img'].'" alt=""></td>
          <td>
            <p class="mb-0 f-14">'.$items['product_name'].' - '.$items['product_weight'].' '.$items['product_unit'].'</p>
            <p class="mb-0">
              <span class="cart_product_price text-success f-14"><b>&#8377;'.$items['product_price'].'</b></span>
              <del><span class="cart_product_price text-secondary pl-2">&#8377;'.$items['product_mrp'].'</span></del>
            </p>
            <p class="mb-0">
              <span class="cart_product_price text-primary f-14"><b> Subtotal : &#8377;'.$items['subtotal'].'</b></span>
            </p>
          </td>
          <td  class="px-0 text-center">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_minus px-1"><i class="fa fa-minus"></i></button>
            </div>
            <input type="number" min="1" step="1" class="form-control form-control-sm text-center cart_product_qty"  value="'.$items['qty'].'" >
            <div class="input-group-append">
              <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_plus px-1"><i class="fa fa-plus"></i></button>
            </div>
          </div>


            <input type="hidden" class="rowid" value="'.$items['rowid'].'" />
            <a class="rem_cart_row" id="rem'.$count.'"><i class="fa fa-trash text-danger"></i></a>
          </td>

        </tr>
      ';

        // $output .='
        //   <tr>
        //     <td>'.$count.'</td>
        //     <td>'.$items['product_name'].' - '.$items['product_weight'].' '.$items['product_unit'].'</td>
        //     <td><span class="cart_product_price">&#8377;'.$items['product_mrp'].'</span></td>
        //     <td><span class="cart_product_price">&#8377;'.$items['product_price'].'</span></td>
        //     <td style="width:150px;">
        //       <div class="row">
        //         <div class="col-3 text-right px-0">
        //           <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_minus"><i class="fa fa-minus"></i></button>
        //         </div>
        //         <div class="col-6 text-center px-1">
        //           <input type="number" min="1" step="1" class="form-control form-control-sm text-center cart_product_qty"  value="'.$items['qty'].'" >
        //         </div>
        //         <div class="col-3 text-left px-0">
        //           <button type="button" class="btn btn-outline-secondary btn-sm text-center btn_qty_plus"><i class="fa fa-plus"></i></button>
        //         </div>
        //       </div>
        //     </td>
        //     <td><span class="cart_product_subtotal">&#8377;'.$items['subtotal'].'</span></td>
        //     <td>
        //       <input type="hidden" class="rowid" value="'.$items['rowid'].'" />
        //       <a class="rem_cart_row" id="rem'.$count.'"><i class="fa fa-trash text-danger"></i></a>
        //     </td>
        //   </tr>
        // ';
    }
    if($count == 0){
      $output .='<h4>Cart is Empty</h4>';
    }

    $total_discount = 0;
    $total_mrp = 0;
    $gst_amt = 0;
    foreach ($this->cart->contents() as $items) {
      $total_mrp = $total_mrp + $items['product_tot_mrp'];
      $total_discount = $total_discount + $items['product_tot_dis_amt'];
      $gst_amt = $gst_amt + $items['product_gst_amt'];
    }

    $output .='
        <tr>
          <td colspan="2" class="text-right text-bold">Total</td>
          <td  colspan="1" class="text-left cart_total text-bold">&#8377;'.$this->cart->total().'</td>
        </tr>
        </tbody>
      </table>
    ';

    $row_count = count($this->cart->contents());

    if($this->cart->total() >= 799){
      $shipping_amt = 0;
    } else{
      $shipping_amt = 100;
    }
    $data['shipping_amt'] = $shipping_amt;
    $data['cart'] = $output;
    $data['row_count'] = $row_count;
    $data['cart_total'] = $this->cart->total();;
    $data['cart_final_amount'] = $shipping_amt + $data['cart_total'];
    $data['gst_amount'] = $gst_amt;
    return json_encode($data);
  }

  public function load_cart(){
    echo $this->modal_view_cart();
  }

  public function update_qty(){
    $rowid = $_POST['rowid'];
    $product_qty = $_POST['product_qty'];

    $item_row_data = $this->cart->get_item($rowid);

    $product_mrp = $item_row_data['product_mrp'];
    $product_dis_amt = $item_row_data['product_dis_amt'];
    $product_tot_mrp = $product_mrp * $product_qty;
    $product_tot_dis_amt = $product_dis_amt * $product_qty;

    $product_weight = $item_row_data['product_weight'];
    $product_tot_weight = $product_weight * $product_qty;

    $product_price = $item_row_data['product_price'];
    $product_amt = $product_qty * $product_price;
    $product_amt = round($product_amt,2);

    $product_gst_per = $item_row_data['product_gst_per'];
    $product_gst_amt = $product_amt - ($product_amt * (100/(100 + $product_gst_per)));
    $product_gst_amt = round($product_gst_amt,2);

    $product_basic_amt = $product_amt - $product_gst_amt;
    $product_basic_amt = round($product_basic_amt,2);

    $item_row_data['product_qty'];

    $data = array(
      'rowid' => $rowid,
      'qty' => $product_qty,
      'product_qty' => $product_qty,

      'product_tot_mrp' => $product_tot_mrp,
      'product_tot_dis_amt' => $product_tot_dis_amt,
      'product_gst_per' => $product_gst_per,
      'product_gst_amt' => $product_gst_amt,
      'product_tot_weight' => $product_tot_weight,
      'product_basic_amt' => $product_basic_amt,
      'product_amt' => $product_amt,
    );
    $this->cart->update($data);

    echo $this->modal_view_cart();
  }

  public function delete_cart_item(){
    $rowid = $_POST['rowid'];
    $data = array(
      'rowid' => $rowid,
      'qty' => 0,
    );
    $this->cart->update($data);

    echo $this->modal_view_cart();
  }

/*********************************** Apply Coupon ******************************/

  public function apply_coupon(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $today = date('d-m-Y');
    $cart_total = $this->cart->total();
    if($cart_total >= 799){ $shipping_amt = 0;  }
    else{ $shipping_amt = 100; }
    $cart_total = $cart_total + $shipping_amt;

    $coupon_code = $_POST['coupon_code'];

    $coupon_info = $this->User_Model->get_info_arr('coupon_code', $coupon_code, 'coupon');

    if($coupon_info){
      $coupon_used_count = $this->User_Model->get_count('coupon_used_id','coupon_id',$coupon_info[0]['coupon_id'],'customer_id',$eco_cust_id,'coupon_used_status','1','coupon_used');
      $data['final_amount'] = $cart_total;
      $data['is_coupon_appl'] = 0;
      if($coupon_info[0]['coupon_status'] == 0 ){
        $data['msg'] = 'Invalid Coupon Code';
      } elseif ( strtotime($coupon_info[0]['coupon_exp_date']) < strtotime($today)) {
        $data['msg'] = 'This Coupon Code is Expired';
      } elseif ($cart_total > $coupon_info[0]['coupon_max_spend'] || $cart_total < $coupon_info[0]['coupon_min_spend']) {
        $data['msg'] = 'Cart Amount is Out of Range';
      } elseif ($coupon_used_count >= $coupon_info[0]['limit_per_user']) {
        $data['msg'] = 'This Coupon Usage is Expired';
      } else{
        $data['msg'] = 'Coupon Applied Successfully';
        $data['is_coupon_appl'] = 1;
        $data['final_amount'] = $cart_total;
        $data['coupon_amt'] = $coupon_info[0]['coupon_amt'];

        $chk_redeem_point = $_POST['chk_redeem_point'];
        if($chk_redeem_point == 1){

          $rem_amount =  $cart_total - $coupon_info[0]['coupon_amt'];
          $wallet_bal_point = $_POST['wallet_bal_point'];

          if($rem_amount > $wallet_bal_point){
            $wallet_final_bal = 0;
            $coupon_cart_final_amount = $rem_amount - $wallet_bal_point;
            $wallet_point_used = $wallet_bal_point;
          } elseif ($wallet_bal_point > $rem_amount) {
            $wallet_final_bal = $wallet_bal_point - $rem_amount;
            $coupon_cart_final_amount = 0;
            $wallet_point_used = $rem_amount;
          } elseif ($wallet_bal_point == $rem_amount) {
            $wallet_final_bal = 0;
            $coupon_cart_final_amount = 0;
            $wallet_point_used = $rem_amount;
          }
          $data['coupon_cart_final_amount'] = $coupon_cart_final_amount;
          $data['wallet_point_used'] = $wallet_point_used;
          $this->session->set_userdata('wallet_point_used',$wallet_point_used);
        } else{
          $coupon_cart_final_amount = $cart_total - $coupon_info[0]['coupon_amt'];
          $data['coupon_cart_final_amount'] = $coupon_cart_final_amount;
          $data['wallet_point_used'] = 0;
        }

        // Set Data to session...
        $this->session->set_userdata('coupon_id',$coupon_info[0]['coupon_id']);
        $this->session->set_userdata('coupon_code',$coupon_code);
        $this->session->set_userdata('coupon_amt',$coupon_info[0]['coupon_amt']);
        $this->session->set_userdata('final_payment_amt',$coupon_cart_final_amount);
      }
    } else{
      $data['final_amount'] = $cart_total;
      $data['is_coupon_appl'] = 0;
      $data['msg'] = 'Invalid Coupon Code';
    }
    echo json_encode($data);
  }

// Redeem Point...
  public function redeem_point(){
    $coupon_amt = $_POST['coupon_amt'];
    $wallet_bal_point = $_POST['wallet_bal_point'];
    $chk_redeem_point = $_POST['chk_redeem_point'];
    $cart_total = $this->cart->total();

    if($cart_total >= 799){ $shipping_amt = 0;  }
    else{ $shipping_amt = 100; }
    $cart_total = $cart_total + $shipping_amt;

    $rem_amount =  $cart_total - $coupon_amt;

    if($chk_redeem_point == 1){
      if($rem_amount > $wallet_bal_point){
        $wallet_final_bal = 0;
        $coupon_cart_final_amount = $rem_amount - $wallet_bal_point;
        $wallet_point_used = $wallet_bal_point;
      } elseif ($wallet_bal_point > $rem_amount) {
        $wallet_final_bal = $wallet_bal_point - $rem_amount;
        $coupon_cart_final_amount = 0;
        $wallet_point_used = $rem_amount;
      } elseif ($wallet_bal_point == $rem_amount) {
        $wallet_final_bal = 0;
        $coupon_cart_final_amount = 0;
        $wallet_point_used = $rem_amount;
      }
      $data['coupon_cart_final_amount'] = $coupon_cart_final_amount;
      $data['wallet_point_used'] = $wallet_point_used;
      $this->session->set_userdata('wallet_point_used',$wallet_point_used);
      $this->session->set_userdata('final_payment_amt',$coupon_cart_final_amount);
    } else{
      $data['coupon_cart_final_amount'] = $rem_amount;
      $data['wallet_point_used'] = 0;
      $this->session->set_userdata('wallet_point_used',$data['wallet_point_used']);
      $this->session->set_userdata('final_payment_amt',$rem_amount);
    }

    echo json_encode($data);
  }



  // Checkout Final Calculation....
  public function checkout_pay_calculation(){
    $eco_cust_id = $this->session->userdata('eco_cust_id');
    $eco_cust_login = $this->session->userdata('eco_cust_login');
    if($eco_cust_id == '' || $eco_cust_login == ''){ header('location:'.base_url().'Login'); }
    $cart_total = $this->cart->total();

    $order_data['order_cust_fname'] = $this->input->post('customer_fname');
    $order_data['order_cust_lname'] = $this->input->post('customer_lname');
    $order_data['order_cust_addr'] = $this->input->post('customer_address');
    $order_data['country_id'] = $this->input->post('country_id');
    $order_data['state_id'] = $this->input->post('state_id');
    $order_data['city_id'] = $this->input->post('city_id');
    $order_data['order_cust_pin'] = $this->input->post('customer_pin');
    $order_data['order_cust_mob'] = $this->input->post('customer_mobile');
    $order_data['order_cust_email'] = $this->input->post('customer_email');
    $order_data['order_timeslot'] = $this->input->post('order_timeslot');

    $order_data['order_no'] = $this->User_Model->get_count_no('order_no', 'order_tbl');
    $order_data['order_date'] = date('d-m-Y');
    $order_data['customer_id'] = $eco_cust_id;
    $order_data['order_added_date'] = date('d-m-Y h:i:s A');
    $order_data['order_addedby'] = 0;

    $order_data['payment_status'] = 1;
    $order_data['payment_type'] = 1;


    $chk_redeem_point = $this->input->post('chk_redeem_point');
    if(!isset($chk_redeem_point)){ $chk_redeem_point = 0; }

    $coupon_id = $this->session->userdata('coupon_id');
    $coupon_code = $this->session->userdata('coupon_code');
    $coupon_amt = $this->session->userdata('coupon_amt');
    $wallet_point_used = $this->session->userdata('wallet_point_used');
    $final_payment_amt = $this->session->userdata('final_payment_amt');

    if($final_payment_amt > 0){
      $this->session->set_userdata('is_final_payment_amt','yes');
    }
    if (!$coupon_amt) {  $coupon_amt = 0;  }
    if (!$wallet_point_used) {  $wallet_point_used = 0;  }

    if($cart_total >= 799){ $shipping_amt = 0;  }
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

    $order_data['order_amount'] = $cart_total-$gst_amt;
    $order_data['order_gst'] = $gst_amt;
    $order_data['order_shipping_amt'] = $shipping_amt;
    $order_data['order_total_amount'] = $cart_total + $shipping_amt;

    if($final_payment_amt == 0){
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
      redirect('../Payment/payment_success');
    } else{
      $this->session->set_userdata('order_data',$order_data);
      redirect('../Payment/checkout_payment');
    }
  }




}

?>
