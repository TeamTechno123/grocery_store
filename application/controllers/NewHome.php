<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewHome extends CI_Controller{
  public function __construct(){
    parent::__construct();
    date_default_timezone_set('Asia/Kolkata');
    $this->load->model('User_Model');
    $this->load->model('Website_Model');
  }

  public function index(){
    $data['main_category_list'] = $this->Website_Model->category_home_list();
      $data['featured_product_list'] = $this->Website_Model->featured_product_list();
  $this->load->view('Website/new/header', $data);
  $this->load->view('Website/new/index', $data);
  $this->load->view('Website/new/footer', $data);
}

}
?>
