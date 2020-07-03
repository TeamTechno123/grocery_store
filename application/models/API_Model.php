<?php
class API_Model extends CI_Model{

  public function product_attribute_list($product_id){
    $this->db->select('pro_attr.pro_attri_id, pro_attr.product_id, pro_attr.pro_attri_weight, pro_attr.pro_attri_mrp, pro_attr.pro_attri_price, pro_attr.pro_attri_dis_per, pro_attr.pro_attri_dis_amt, unit.unit_name');
    $this->db->from('product_attribute as pro_attr');
    if($product_id != ''){
      $this->db->where('pro_attr.product_id',$product_id);
    }
    $this->db->where('pro_attr.pro_attri_status',1);
    $this->db->join('unit','pro_attr.pro_attri_unit = unit.unit_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


}
?>
