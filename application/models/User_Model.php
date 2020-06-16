<?php
class User_Model extends CI_Model{

  function check_login($mobile_no, $password){
    $query = $this->db->select('*')
      ->where('user_mobile', $mobile_no)
      ->where('user_password', $password)
      ->from('user')
      ->get();
    $result = $query->result_array();
    return $result;
  }
 /************************* Save, Update, Delete ****************************/
  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

/*************************************** List *****************************************/
  public function get_list($company_id,$id,$order,$tbl_name){
    $this->db->select('*');
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->order_by($id, $order);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list2($id,$order,$tbl_name){
    $this->db->select('*');
    $this->db->order_by($id, $order);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id2($select_fields,$field_name,$value,$table_name){
    $this->db->select($select_fields);
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id($col_name1,$col_val1,$col_name2,$col_val2,$order_col,$order,$tbl_name){
    $this->db->select('*');
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id3($col_name1,$col_val1,$col_name2,$col_val2,$col_name3,$col_val3,$order_col,$order,$tbl_name){
    $this->db->select('*');
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($col_name3 != ''){
      $this->db->where($col_name3,$col_val3);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id_fields($select_fields,$col_name1,$col_val1,$col_name2,$col_val2,$col_name3,$col_val3,$order_col,$order,$tbl_name){
    $this->db->select($select_fields);
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($col_name3 != ''){
      $this->db->where($col_name3,$col_val3);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id_com($company_id,$col_name1,$col_val1,$col_name2,$col_val2,$order_col,$order,$tbl_name){
    $this->db->select('*');
    if($company_id != ''){
      $this->db->where('company_id',$company_id);
    }
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_info($id_type, $id, $tbl_name){
    $this->db->select('*');
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_info_arr($id_type, $id, $tbl_name){
    $this->db->select('*');
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_info_arr2_fields($fields, $col_name1, $val1, $col_name2, $val2, $col_name3, $val3, $tbl_name){
    $this->db->select($fields);
    if($col_name1 != ''){
      $this->db->where($col_name1, $val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2, $val2);
    }
    if($col_name3 != ''){
      $this->db->where($col_name3, $val3);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
    // $q = $this->db->last_query();
    // return $q;
  }

  public function get_info_arr_fields($fields,$id_type, $id, $tbl_name){
    $this->db->select($fields);
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function user_list($company_id){
    $this->db->select('*');
    $this->db->where('is_admin', 0);
    $this->db->where('role_id', 2);
    $this->db->or_where('role_id', 5);
    $this->db->or_where('role_id', 6);
    $this->db->or_where('role_id', 7);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->from('user');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function check_dupli_num($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $num = $query->num_rows();
    return $num;
  }

  // Get Count...
  public function get_count($id_type,$col1,$val1,$col2,$val2,$col3,$val3,$tbl_name){
    $this->db->select($id_type);
    if($col1 != ''){
      $this->db->where($col1, $val1);
    }
    if($col2 != ''){
      $this->db->where($col2, $val2);
    }
    if($col3 != ''){
      $this->db->where($col3, $val3);
    }
    $this->db->from($tbl_name);
    $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function get_count_no($field_name, $tbl_name){
    $this->db->select('MAX('.$field_name.') as num');
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result =  $query->result_array();
    if($result){ $old_num = $result[0]['num']; }
    else{ $old_num = 0; }
    $value = $old_num + 1;
    return $value;
  }

  public function get_sum($company_id,$tot_field_name,$field1_name,$field1_val,$field2_name,$field2_val,$tbl_name){
    $this->db->select('SUM('.$tot_field_name.') as total');
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    if($field1_name != ''){
      $this->db->where($field1_name, $field1_val);
    }
    if($field2_name != ''){
      $this->db->where($field2_name, $field2_val);
    }
    $this->db->from($tbl_name);
    $query =  $this->db->get();
    $result = $query->result_array();
    if($result){ $total = $result[0]['total']; }
    else{ $total = 0;  }
    return $total;
  }

  /********************************************** Product ****************************************/
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

/********************************************** Transaction **************************************/

  public function get_tot_sale($product_id){
    $this->db->select('SUM(order_pro.order_pro_tot_weight) as total_sale');
    $this->db->from('order_pro');
    $this->db->where('order_pro.product_id',$product_id);
    $this->db->where('order_tbl.order_status',6);
    $this->db->join('order_tbl','order_tbl.order_id = order_pro.order_id','LEFT');
    $query = $this->db->get();
    $result = $query->result_array();
    if($result){ $total = $result[0]['total_sale']; }
    else{ $total = 0;  }
    return $total;
  }


}
?>
