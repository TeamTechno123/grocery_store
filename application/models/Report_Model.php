<?php
class Report_Model extends CI_Model{

  public function vendor_report_list($vendor_id,$from_date,$to_date){
    $this->db->select('*');
    $this->db->from('purchase');
    if($vendor_id != ''){
      $this->db->where('vendor_id', $vendor_id);
    }
    $this->db->where("str_to_date(purchase_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function order_report_list($order_status_id,$from_date,$to_date){
    $this->db->select('order_tbl.*,order_status.*');
    $this->db->from('order_tbl');
    if($order_status_id != ''){
      $this->db->where('order_tbl.order_status', $order_status_id);
    }
    $this->db->where("str_to_date(order_tbl.order_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->join('order_status','order_tbl.order_status = order_status.order_status_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function customer_report_list($user_id,$today,$from_date,$to_date){
    $this->db->select('customer.*,customer.customer_id as cust_id,cust_membership.*,membership_scheme.mem_sch_name');
    $this->db->from('customer');
    if($user_id != ''){
      $this->db->where('customer.customer_addedby', $user_id);
    }
    $this->db->where("str_to_date(customer.customer_date,'%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->where("str_to_date(cust_membership.cust_mem_start_date,'%d-%m-%Y') <= str_to_date('$today','%d-%m-%Y')");
    $this->db->where("str_to_date(cust_membership.cust_mem_end_date,'%d-%m-%Y') >= str_to_date('$today','%d-%m-%Y')");

    $this->db->join('cust_membership','customer.customer_id = cust_membership.customer_id','LEFT');
    $this->db->join('membership_scheme','membership_scheme.mem_sch_id = cust_membership.mem_sch_id','LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

}
?>
