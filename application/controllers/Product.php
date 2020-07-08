<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    // $this->load->model('Transaction_Model');
  }

/***********************     category Information      ******************************/

  public function category_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['category_list'] = $this->User_Model->get_list($eco_company_id,'category_name','ASC','category');

    $data['main_category_list'] = $this->User_Model->get_list_by_id('is_main',1,'','','category_name','ASC','category');
    $data['sub_category_list'] = $this->User_Model->get_list_by_id('is_main',0,'','','category_name','ASC','category');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Product/category_list', $data);
    $this->load->view('Include/footer', $data);
  }

    public function category(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('category_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {

        $show_on_home = $this->input->post('show_on_home');
        if(!isset($show_on_home)){ $show_on_home = 0; }
        $category_status = $this->input->post('category_status');
        if(!isset($category_status)){ $category_status = 0; }
        $main_category_id = $this->input->post('main_category_id');
        if($main_category_id == '-1'){
          $is_main = '1';
          $main_category_id = 0;
        } else{
          $is_main = 0;
          $main_category_id = $this->input->post('main_category_id');
        }
        $save_data = array(
          'company_id' => $eco_company_id,
          'category_name' => $this->input->post('category_name'),
          'show_on_home' => $show_on_home,
          'category_status' => $category_status,
          'category_date' => date('d-m-Y h:m:s A'),
          'category_addedby' => $eco_user_id,
          'is_main' => $is_main,
          'main_category_id' => $main_category_id,
        );
        $category_id = $this->User_Model->save_data('category', $save_data);

        if($_FILES['category_img']['name']){
           $time = time();
           $image_name = 'category_'.$category_id.'_'.$time;
           $config['upload_path'] = 'assets/images/category/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['category_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('category_img')){
             $up_image = array(
               'category_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('category_id', $category_id, 'category', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
        }

        $notification = 'New Category Added '.$_POST['category_name'];
        $notification_data['notification_text'] = $notification;
        $this->User_Model->save_data('notification', $notification_data);

        $this->send_notification($notification);

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Product/category_list');
      }
      $data['main_category_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'is_main',1,'category_name','ASC','category');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/category', $data);
      $this->load->view('Include/footer', $data);
    }


     public function send_notification($notification){
        $customer_list = $this->User_Model->get_list_by_id2('device_id','device_id !=','','customer');
        $device_id = array();
        foreach ($customer_list as $customer_list1) {
            array_push($device_id, $customer_list1->device_id);
        }

        $msg = array(
            'body'  => 'Needs On Door',
            'title' => $notification,
            'icon'  => 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );

        $fields = array(
            'registration_ids' => $device_id,
            'notification'  => $msg
        );

        //building headers for the request
        $headers = array(
            'Authorization: key = AAAARI6VoJk:APA91bEGmp0K5SlbMwRyZtUf_X-MlFYdWjsBnQ0FHNy69zEweJ_ZQJQjD4Gu84DUJ1QgqRXRAxF-JiVeayYcd7Byt5eABihEGXARQrviCzEC6hwvVcI3tes5ORMKNH-QB077C84nVvru',
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        // echo $result;
    }



    // Edit Category...
    public function edit_category($category_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('category_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $show_on_home = $this->input->post('show_on_home');
        if(!isset($show_on_home)){ $show_on_home = 0; }

        $category_status = $this->input->post('category_status');
        if(!isset($category_status)){ $category_status = 0; }

        $main_category_id = $this->input->post('main_category_id');
        if($main_category_id == '-1'){
          $is_main = '1';
          $main_category_id = 0;
        } else{
          $is_main = 0;
          $main_category_id = $this->input->post('main_category_id');
        }

        $update_data = array(
        'category_name' => $this->input->post('category_name'),
        'main_category_id' => $this->input->post('main_category_id'),
        'show_on_home' => $show_on_home,
        'category_status' => $category_status,
        'is_main' => $is_main,
        'category_date' => date('d-m-Y h:m:s A'),
        'category_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('category_id', $category_id, 'category', $update_data);
        if(isset($_FILES['category_img']['name'])){
           $time = time();
           $image_name = 'category_'.$category_id.'_'.$time;
           $config['upload_path'] = 'assets/images/category/';
           $config['allowed_types'] = 'png|jpg|jpeg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['category_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('category_img')){
             $up_image = array(
               'category_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('category_id', $category_id, 'category', $up_image);
             $old_img = $this->input->post('old_img');
             if($old_img){ unlink("assets/images/category/".$old_img); }
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Product/category_list');
      }
      $category_info = $this->User_Model->get_info_arr('category_id',$category_id,'category');
      if(!$category_info){ header('location:'.base_url().'Product/category_list'); }
      $data['update'] = 'update';
      $data['category_name'] = $category_info[0]['category_name'];
      $data['main_category_id'] = $category_info[0]['main_category_id'];
      $data['show_on_home'] = $category_info[0]['show_on_home'];
      $data['category_status'] = $category_info[0]['category_status'];
      $data['category_img'] = $category_info[0]['category_img'];
      $data['main_category_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'is_main',1,'category_name','ASC','category');

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/category', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Category....
    public function delete_category($category_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $category_info = $this->User_Model->get_info_arr_fields('category_img','category_id', $category_id, 'category');
      $this->User_Model->delete_info('category_id', $category_id, 'category');
      if($category_info){ unlink("assets/images/category/".$category_info[0]['category_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Product/category_list');
    }

  /***********************     Product Information      ******************************/
    // Product List...
    public function product_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['product_list'] = $this->User_Model->get_list($eco_company_id,'product_name','ASC','product');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Product...
    public function product(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('product_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $save_data = $_POST;
        unset($save_data['files']);
        unset($save_data['input']);
        unset($save_data['product_area']);
        if(isset($_POST['product_area'])){
          $product_area = $_POST['product_area'];
          $product_area = implode(',',$product_area);
          $save_data['product_area'] = $product_area;
        }
        $save_data['company_id'] = $eco_company_id;
        $save_data['product_date'] = date('d-m-Y h:i:s A');
        $save_data['product_addedby'] = $eco_user_id;

        $product_id = $this->User_Model->save_data('product', $save_data);

        foreach($_POST['input'] as $multi_data){
          $multi_data['product_id'] = $product_id;
          $multi_data['pro_attri_addedby'] = $eco_user_id;
          $multi_data['pro_attri_date'] = date('d-m-Y h:i:s A');
          // Calculate Discount...
          $product_mrp = $multi_data['pro_attri_mrp'];
          $product_price = $multi_data['pro_attri_price'];
          $discount_amount = $product_mrp - $product_price;
          $product_discount = ($discount_amount/$product_mrp) * 100;
          $product_discount = round($product_discount);
          $multi_data['pro_attri_dis_per'] = $product_discount;
          $multi_data['pro_attri_dis_amt'] = $discount_amount;

          $this->db->insert('product_attribute', $multi_data);
        }

        if(isset($_FILES['product_img']['name'])){
          $time = time();
          $image_name = 'product_main_'.$product_id.'_'.$time;
          $config['upload_path'] = 'assets/images/product/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['file_name'] = $image_name;
          $filename = $_FILES['product_img']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('product_img')){
           $up_image = array(
             'product_img' => $image_name.'.'.$ext,
           );
           $this->User_Model->update_info('product_id', $product_id, 'product', $up_image);
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_status',$this->upload->display_errors());
          }
        }

        // Notification...
        $notification = 'New Product Added'.$_POST['product_name'];
        $notification_data['notification_text'] = $notification;
        $this->User_Model->save_data('notification', $notification_data);
        $this->send_notification($notification);

        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Product/product_list');
      }

      $data['manufacturer_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'manufacturer_status',1,'','','manufacturer_name','ASC','manufacturer');
      $data['main_category_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'category_status',1,'is_main',1,'category_name','ASC','category');
      $data['category_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'category_status',1,'is_main',0,'category_name','ASC','category');
      $data['tax_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'tax_status',1,'','','tax_rate','ASC','tax');
      $data['unit_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'unit_status',1,'','','unit_name','ASC','unit');
      $data['area_list'] = $this->User_Model->get_list_by_id_com('','tahsil_status',1,'','','tahsil_name','ASC','tahsil');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Product...
    public function edit_product($product_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('product_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $update_data = $_POST;
        unset($update_data['files']);
        unset($update_data['old_img']);
        unset($update_data['input']);

        unset($update_data['files']);
        unset($update_data['input']);
        unset($update_data['product_area']);
        if(isset($_POST['product_area'])){
          $product_area = $_POST['product_area'];
          $product_area = implode(',',$product_area);
          $update_data['product_area'] = $product_area;
        } else{
          $update_data['product_area'] = '';
        }

        $update_data['product_date'] = date('d-m-Y h:i:s A');
        $update_data['product_addedby'] = $eco_user_id;

        $this->User_Model->update_info('product_id', $product_id, 'product', $update_data);

        foreach($_POST['input'] as $multi_data){
          if(isset($multi_data['pro_attri_id'])){
            $pro_attri_id = $multi_data['pro_attri_id'];
            if(!isset($multi_data['pro_attri_weight'])){
              $this->User_Model->delete_info('pro_attri_id', $pro_attri_id, 'product_attribute');
            }else{
              $product_mrp = $multi_data['pro_attri_mrp'];
              $product_price = $multi_data['pro_attri_price'];
              $discount_amount = $product_mrp - $product_price;
              $product_discount = ($discount_amount/$product_mrp) * 100;
              $product_discount = round($product_discount);
              $multi_data['pro_attri_dis_per'] = $product_discount;
              $multi_data['pro_attri_dis_amt'] = $discount_amount;
              $this->User_Model->update_info('pro_attri_id', $pro_attri_id, 'product_attribute', $multi_data);
            }
          }
          else{
            $multi_data['product_id'] = $product_id;
            $multi_data['pro_attri_addedby'] = $eco_user_id;
            $multi_data['pro_attri_date'] = date('d-m-Y h:i:s A');

            $product_mrp = $multi_data['pro_attri_mrp'];
            $product_price = $multi_data['pro_attri_price'];
            $discount_amount = $product_mrp - $product_price;
            $product_discount = ($discount_amount/$product_mrp) * 100;
            $product_discount = round($product_discount);
            $multi_data['pro_attri_dis_per'] = $product_discount;
            $multi_data['pro_attri_dis_amt'] = $discount_amount;

            $this->db->insert('product_attribute', $multi_data);
          }
        }

        if(isset($_FILES['product_img']['name'])){
          $time = time();
          $image_name = 'product_main_'.$product_id.'_'.$time;
          $config['upload_path'] = 'assets/images/product/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['file_name'] = $image_name;
          $filename = $_FILES['product_img']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          $this->upload->initialize($config);
          if ($this->upload->do_upload('product_img')){
           $up_image = array(
             'product_img' => $image_name.'.'.$ext,
           );
           $old_img = $this->input->post('old_img');
           if(isset($old_img)){ unlink("assets/images/product/".$old_img); }
           $this->User_Model->update_info('product_id', $product_id, 'product', $up_image);
          }
          else{
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_status',$this->upload->display_errors());
          }
        }
        header('location:'.base_url().'Product/product_list');
      }
      $product_info = $this->User_Model->get_info_arr('product_id',$product_id,'product');
      if(!$product_info){ header('location:'.base_url().'Product/product_list'); }
      $data['update'] = 'update';
      $data['product_info'] = $product_info[0];

      $data['manufacturer_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'manufacturer_status',1,'','','manufacturer_name','ASC','manufacturer');
      $data['main_category_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'category_status',1,'is_main',1,'category_name','ASC','category');
      $data['category_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'category_status',1,'is_main',0,'category_name','ASC','category');
      $data['tax_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'tax_status',1,'','','tax_rate','ASC','tax');
      $data['unit_list'] = $this->User_Model->get_list_by_id_com($eco_company_id,'unit_status',1,'','','unit_name','ASC','unit');
      $data['area_list'] = $this->User_Model->get_list_by_id_com('','tahsil_status',1,'','','tahsil_name','ASC','tahsil');

      $data['product_attribute_list'] = $this->User_Model->get_list_by_id('product_id',$product_id,'','','pro_attri_id','ASC','product_attribute');
      // print_r($data['product_attribute_list']);
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product', $data);
      $this->load->view('Include/footer', $data);
    }

    public function delete_product($product_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $product_info = $this->User_Model->get_info_arr_fields('product_img','product_id', $product_id, 'product');
      if($product_info){ unlink("assets/images/product/".$product_info[0]['product_img']); }
      $this->User_Model->delete_info('product_id', $product_id, 'product');
      $this->User_Model->delete_info('product_id', $product_id, 'product_attribute');

      $pro_img_list = $this->User_Model->get_list_by_id2('product_images_name','product_id', $product_id, 'product_images');
      if($pro_img_list){
        foreach ($pro_img_list as $pro_img_list) {
          unlink("assets/images/product/".$pro_img_list->product_images_name);
        }
      }
      $this->User_Model->delete_info('product_id', $product_id, 'product_images');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Product/product_list');
    }

    // Product Images...
    public function product_images($product_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('product_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        if(isset($_FILES['product_images_name']['name'])){
          $this->load->library('upload');
          $files = $_FILES;
          $cpt = count($_FILES['product_images_name']['name']);
          for($i=0; $i<$cpt; $i++){
            $doc_type = $_POST['doc_type'][$i];
            $j = $i+1;
            $time = time();
            $image_name = 'product_sub_'.$product_id.'_'.$j.'_'.$time;
              $_FILES['product_images_name']['name']= $files['product_images_name']['name'][$i];
              $_FILES['product_images_name']['type']= $files['product_images_name']['type'][$i];
              $_FILES['product_images_name']['tmp_name']= $files['product_images_name']['tmp_name'][$i];
              $_FILES['product_images_name']['error']= $files['product_images_name']['error'][$i];
              $_FILES['product_images_name']['size']= $files['product_images_name']['size'][$i];
              $config['upload_path'] = 'assets/images/product/';
              $config['allowed_types'] = 'gif|jpg|png|jpeg';
              $config['file_name'] = $image_name;
              $config['overwrite']     = FALSE;
              $filename = $files['product_images_name']['name'][$i];
              $ext = pathinfo($filename, PATHINFO_EXTENSION);
              $this->upload->initialize($config);
              if($this->upload->do_upload('product_images_name')){
                $file_data['product_images_name'] = $image_name.'.'.$ext;
                $file_data['product_id'] = $product_id;
                $file_data['product_images_addedby'] = $eco_user_id;
                $file_data['product_images_date'] = date('d-m-Y h:i:s A');
                $this->User_Model->save_data('product_images', $file_data);
              }
              else{
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('status',$this->upload->display_errors());
              }
            }
          }
          header('location:'.base_url().'Product/product_list');
        }

      $product_info = $this->User_Model->get_info_arr_fields('*','product_id', $product_id, 'product');
      if(!$product_info){ header('location:'.base_url().'Product/product_list'); }
      $data['product_info'] = $product_info[0];
      $data['product_images_list'] = $this->User_Model->get_list_by_id('product_id',$product_id,'','','product_id','ASC','product_images');

      // print_r($data['product_images_list']);
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product_images', $data);
      $this->load->view('Include/footer', $data);
    }

    public function delete_product_images(){
      $product_images_id = $this->input->post('product_images_id');
      $product_images_name = $this->input->post('product_images_name');

      unlink("assets/images/product/".$product_images_name);
      $this->User_Model->delete_info('product_images_id', $product_images_id, 'product_images');
    }

// Not Used...
    // Add Attributes to Product...
    public function product_attribute($product_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('attribute_id', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $save_data = array(
          'company_id' => $eco_company_id,
          'product_id' => $product_id,
          'attribute_id' => $this->input->post('attribute_id'),
          'attribute_val_id' => $this->input->post('attribute_val_id'),
          'attribute_price_type' => $this->input->post('attribute_price_type'),
          'attribute_price' => $this->input->post('attribute_price'),
          'product_attribute_status' => $this->input->post('product_attribute_status'),
          'product_attribute_addedby' => $eco_user_id,
          'product_attribute_date' => date('d-m-Y h:i:sA'),
        );
        $this->User_Model->save_data('product_attribute', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Product/product_attribute/'.$product_id);
      }

      $product_info = $this->User_Model->get_info_arr_fields('*','product_id', $product_id, 'product');
      if(!$product_info){ header('location:'.base_url().'Product/product_list'); }
      $data['product_info'] = $product_info[0];
      $data['attribute_list'] = $this->User_Model->get_list_by_id('attribute_status',1,'','','attribute_name','ASC','attribute');
      $data['product_attribute_list'] = $this->User_Model->get_list_by_id('product_id',$product_id,'','','attribute_id','ASC','product_attribute');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product_attribute', $data);
      $this->load->view('Include/footer', $data);
    }

// Not Used...
    // Add Attributes to Product...
    public function edit_product_attribute(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $product_attribute_id = $this->uri->segment(4);
      $product_id = $this->uri->segment(3);
      $this->form_validation->set_rules('attribute_id', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $update_data = array(
          'attribute_id' => $this->input->post('attribute_id'),
          'attribute_val_id' => $this->input->post('attribute_val_id'),
          'attribute_price_type' => $this->input->post('attribute_price_type'),
          'attribute_price' => $this->input->post('attribute_price'),
          'product_attribute_status' => $this->input->post('product_attribute_status'),
          'product_attribute_addedby' => $eco_user_id,
          'product_attribute_date' => date('d-m-Y h:i:sA'),
        );
        $this->User_Model->update_info('product_attribute_id', $product_attribute_id, 'product_attribute', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Product/product_attribute/'.$product_id);
      }

      $product_info = $this->User_Model->get_info_arr_fields('*','product_id', $product_id, 'product');
      if(!$product_info){ header('location:'.base_url().'Product/product_list'); }
      $data['product_info'] = $product_info[0];
      $data['attribute_list'] = $this->User_Model->get_list_by_id('attribute_status',1,'','','attribute_name','ASC','attribute');
      $data['product_attribute_list'] = $this->User_Model->get_list_by_id('product_id',$product_id,'','','attribute_id','ASC','product_attribute');

      $product_attribute_info = $this->User_Model->get_info_arr('product_attribute_id',$product_attribute_id,'product_attribute');
      if(!$product_attribute_info){ header('location:'.base_url().'Product/product_list'); }
      $data['update'] = 'update';
      $data['product_attribute_info'] = $product_attribute_info[0];
      $attribute_id = $product_attribute_info[0]['attribute_id'];
      $data['attribute_val_list'] = $this->User_Model->get_list_by_id('attribute_id',$attribute_id,'','','attribute_val_name','ASC','attribute_val');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('Product/product_attribute', $data);
      $this->load->view('Include/footer', $data);
    }
// Not Used...
    public function delete_product_attribute(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_role_id = $this->session->userdata('eco_role_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $product_attribute_id = $this->uri->segment(4);
      $product_id = $this->uri->segment(3);
      $this->User_Model->delete_info('product_attribute_id', $product_attribute_id, 'product_attribute');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Product/product_attribute/'.$product_id);
    }

    public function get_attribute_val_by_id(){
      $attribute_id = $this->input->post('attribute_id');
      $attribute_val_list = $this->User_Model->get_list_by_id('attribute_id',$attribute_id,'','','attribute_val_name','ASC','attribute_val');
      echo "<option value='' selected >Select Purchase No.</option>";
      foreach ($attribute_val_list as $list) {
        echo "<option value='".$list->attribute_val_id."'> ".$list->attribute_val_name." </option>";
      }
    }



/***********************     Coupon Information      ******************************/

  public function coupon_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }
    $data['coupon_list'] = $this->User_Model->get_list($eco_company_id,'coupon_id','DESC','coupon');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Product/coupon_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Coupon...
  public function coupon(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('coupon_code', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $coupon_status = $this->input->post('coupon_status');
      if(!isset($coupon_status)){ $coupon_status = 0; }

      $save_data = $_POST;
      $save_data['company_id'] = $eco_company_id;
      $save_data['coupon_status'] = $coupon_status;
      $save_data['coupon_addedby'] = $eco_user_id;
      $save_data['coupon_date'] = date('d-m-Y h:i:s A');
      $coupon_id = $this->User_Model->save_data('coupon', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Product/coupon_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Product/coupon');
    $this->load->view('Include/footer');
  }

  // Edit/Update Coupon...
  public function edit_coupon($coupon_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_role_id = $this->session->userdata('eco_role_id');
    if($eco_user_id == '' || $eco_company_id == '' || $eco_role_id != 1){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('coupon_code', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $coupon_status = $this->input->post('coupon_status');
      if(!isset($coupon_status)){ $coupon_status = 0; }

      $update_data = $_POST;
      $update_data['coupon_status'] = $coupon_status;
      $update_data['coupon_addedby'] = $eco_user_id;
      $update_data['coupon_date'] = date('d-m-Y h:i:s A');
      $this->User_Model->update_info('coupon_id', $coupon_id, 'coupon', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Product/coupon_list');
    }

    $coupon_info = $this->User_Model->get_info_arr('coupon_id',$coupon_id,'coupon');
    if(!$coupon_info){ header('location:'.base_url().'Product/coupon_list'); }
    $data['update'] = 'update';
    $data['coupon_info'] = $coupon_info[0];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Product/coupon', $data);
    $this->load->view('Include/footer', $data);
  }


/***************************************************************************************************************/


}
