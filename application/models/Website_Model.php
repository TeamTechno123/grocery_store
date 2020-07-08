<?php
class Website_Model extends CI_Model{
  public function send_sms($mobile_no, $msg){
    $param['uname'] = 'wbcare';
		$param['password'] = '123123';
		$param['sender'] = 'AKCENT';
		$param['receiver'] = $mobile_no;
		$param['route'] = 'TA';
		$param['msgtype'] = 1;
		$param['sms'] = $msg;
		$parameters = http_build_query($param);
		$url="http://msgblast.in/index.php/smsapi/httpapi";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
    return $result;
		// echo $result;
  }

  function check_login($mobile_no, $password){
    $query = $this->db->select('*')
      ->where('customer_mobile', $mobile_no)
      ->where('customer_password', $password)
      ->from('customer')
      ->get();
    $result = $query->result_array();
    return $result;
  }

  public function featured_product_list(){
    $this->db->select('product.*');
    $this->db->from('product');
    $this->db->where('product.is_feature',1);
    $this->db->where('product.product_status',1);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function wishlist($customer_id){
    $this->db->select('product.*, wishlist.wishlist_id');
    $this->db->from('product');
    $this->db->where('wishlist.customer_id',$customer_id);
    $this->db->join('wishlist','wishlist.product_id = product.product_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function product_list_by_category($category_id){
    $this->db->select('product.*');
    $this->db->from('product');
    $this->db->where('product.main_category_id',$category_id);
    $this->db->or_where('product.category_id',$category_id);
    $this->db->where('product.product_status',1);
    $this->db->order_by('product.product_name','ASC');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_brand_category($category_id){
    $this->db->select('product.manufacturer_id,manufacturer.*');
    $this->db->from('product');
    $this->db->where('product.main_category_id',$category_id);
    $this->db->or_where('product.category_id',$category_id);
    $this->db->group_by('product.manufacturer_id');
    $this->db->order_by('manufacturer.manufacturer_name', 'ASC');
    $this->db->join('manufacturer', 'product.manufacturer_id=manufacturer.manufacturer_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  // public function get_brand_by_category_limit($category_id){
  //   $this->db->select('product.manufacturer_id,manufacturer.*');
  //   $this->db->from('product');
  //   $this->db->where('product.main_category_id',$category_id);
  //   $this->db->or_where('product.category_id',$category_id);
  //   $this->db->group_by('product.manufacturer_id');
  //   $this->db->limit(5);
  //   $this->db->join('manufacturer', 'product.manufacturer_id=manufacturer.manufacturer_id', 'LEFT');
  //   $query = $this->db->get();
  //   $result = $query->result();
  //   return $result;
  // }

  public function grocery_list_by_brand($brand_id){
    $this->db->select('product.*');
    $this->db->from('product');
    $this->db->where('product.manufacturer_id',$brand_id);
    // $this->db->or_where('product.category_id',$category_id);
    $this->db->where('product.product_status',1);
    $this->db->order_by('product.product_name','ASC');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function grocery_list_by_brand_category($brand_id,$category_id){
    $this->db->select('product.*');
    $this->db->from('product');
    $this->db->where('product.manufacturer_id',$brand_id);
    $this->db->where('product.main_category_id',$category_id);
    $this->db->or_where('product.category_id',$category_id);
    $this->db->where('product.product_status',1);
    $this->db->order_by('product.product_name','ASC');
    $query = $this->db->get();
    $result = $query->result();
    // $q = $this->db->last_query();
    return $result;
  }

  public function prod_attr_list($product_id){
    $this->db->select('product.*,product.product_id as prod_id, product_attribute.*, unit.*');
    $this->db->from('product_attribute');
    $this->db->where('product_attribute.product_id',$product_id);
    $this->db->order_by('product_attribute.pro_attri_price','ASC');
    $this->db->where('product_attribute.pro_attri_status',1);
    $this->db->join('product','product.product_id = product_attribute.product_id','LEFT');
    $this->db->join('unit','product_attribute.pro_attri_unit = unit.unit_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }


  public function category_home_list(){
    $this->db->select('*');
    // $this->db->where('company_id',$eco_company_id);
    $this->db->where('is_main',1);
    $this->db->where('show_on_home',1);
    $this->db->where('category_status',1);
    $this->db->limit(12);
    $this->db->from('category');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function brand_home_list(){
    $this->db->select('*');
    // $this->db->where('company_id',$eco_company_id);
    // $this->db->where('is_main',1);
    // $this->db->where('show_on_home',1);
    $this->db->where('manufacturer_status',1);
    $this->db->order_by('rand()');
    $this->db->limit(4);
    $this->db->from('manufacturer');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function membership_scheme_list(){
    $this->db->select('*');
    $this->db->where('mem_sch_status',1);
    $this->db->from('membership_scheme');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function search_result($search_keyword){
    $this->db->select('product.*');
    $this->db->from('product');
    $this->db->like('product.product_name', $search_keyword, 'both');
    $this->db->or_like('sub_category.category_name', $search_keyword, 'both');
    $this->db->or_like('main_category.category_name', $search_keyword, 'both');
    $this->db->or_like('manufacturer.manufacturer_name', $search_keyword, 'both');
    // $this->db->where('mem_sch_status',1);
    $this->db->join('category as sub_category','product.category_id = sub_category.category_id','LEFT');
    $this->db->join('category as main_category','product.main_category_id = main_category.category_id','LEFT');
    $this->db->join('manufacturer','product.manufacturer_id = manufacturer.manufacturer_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function cust_membership_info($customer_id,$today){
    $this->db->select('*');
    $this->db->from('cust_membership');
    $this->db->where('customer_id',$customer_id);
    $this->db->where("str_to_date(cust_mem_start_date,'%d-%m-%Y') <= str_to_date('$today','%d-%m-%Y')");
    $this->db->where("str_to_date(cust_mem_end_date,'%d-%m-%Y') >= str_to_date('$today','%d-%m-%Y')");
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  /*************************** Coupon *************************/
  // public function get_coupon_info($coupon_code){
  //   $this->db->select('*');
  //   $this
  // }

  public function point_add_list_by_date($customer_id,$from_date,$to_date){
    $this->db->select('*');
    $this->db->from('point_add');
    $this->db->where('customer_id',$customer_id);
    $this->db->where("str_to_date(point_add_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function point_use_list_by_date($customer_id,$from_date,$to_date){
    $this->db->select('*');
    $this->db->from('point_use');
    $this->db->where('customer_id',$customer_id);
    $this->db->where('point_use_status','1');
    $this->db->where("str_to_date(point_use_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


}
?>
