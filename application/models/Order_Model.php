<?php
class Order_Model extends CI_Model{
  public function product_list($company_id){
    $this->db->select('product.*,product.product_id as prod_id, product_attribute.*, unit.*');
    $this->db->from('product');
    if ($company_id != '') {
      $this->db->where('product.company_id',$company_id);
    }
    $this->db->where('product.product_status',1);
    $this->db->order_by('product.product_name','ASC');
    // $this->db->where('product_attribute.pro_attri_status',1);
    $this->db->join('product_attribute','product.product_id = product_attribute.product_id','LEFT');
    $this->db->join('unit','product_attribute.pro_attri_unit = unit.unit_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  //
  public function order_product_list($company_id){
    $this->db->select('product.*,product.product_id as prod_id, product_attribute.*, unit.*');
    $this->db->from('product_attribute');
    if ($company_id != '') {
      $this->db->where('product.company_id',$company_id);
    }
    $this->db->where('product.product_status',1);
    $this->db->order_by('product.product_name','ASC');
    $this->db->where('product_attribute.pro_attri_status',1);
    $this->db->join('product','product.product_id = product_attribute.product_id','LEFT');
    $this->db->join('unit','product_attribute.pro_attri_unit = unit.unit_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }

  public function product_details_by_attr_id($pro_attri_id){
    $this->db->select('product.*, product_attribute.*, unit.*');
    $this->db->from('product_attribute');
    $this->db->where('product_attribute.pro_attri_id',$pro_attri_id);
    $this->db->join('product','product.product_id = product_attribute.product_id','LEFT');
    $this->db->join('unit','product_attribute.pro_attri_unit = unit.unit_id','LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    $q = $this->db->last_query();
    return $result;
  }

  // Order List.  Used In - 1.Order/order_list.
  public function order_list(){
    $this->db->select('order_tbl.*,order_status.*, customer.*');
    $this->db->from('order_tbl');
    $this->db->order_by('order_tbl.order_id','DESC');
    $this->db->join('order_status','order_tbl.order_status = order_status.order_status_id','LEFT');
    $this->db->join('customer','order_tbl.customer_id = customer.customer_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }



  public function delivery_boy_order_list($eco_user_id){
    $this->db->select('order_tbl.*,order_status.*, customer.*');
    $this->db->from('order_tbl');
    $this->db->where('order_tbl.order_assign_to',$eco_user_id);
    $this->db->where('order_tbl.order_status',4);
    $this->db->or_where('order_tbl.order_status',5);
    $this->db->or_where('order_tbl.order_status',6);
    $this->db->order_by('order_tbl.order_id','DESC');
    $this->db->join('order_status','order_tbl.order_status = order_status.order_status_id','LEFT');
    $this->db->join('customer','order_tbl.customer_id = customer.customer_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    return $result;
  }
}
?>
