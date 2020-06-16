<?php
class Admin_Model extends CI_Model{
  function check_login($email, $password){
    $query = $this->db->select('*')
        ->where('admin_email', $email)
        ->where('admin_password', $password)
        ->from('admin')
        ->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_company_list(){
    $query = $this->db->select('*')
    ->from('company')
    ->get();
    $result = $query->result();
    return $result;
  }

  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_info($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $query = $this->db->select($field_name)
      ->where('company_id', $company_id)
      ->where($field_name,$value)
      ->from($table_name)
      ->get();
    $result = $query->result();
    return $result;
  }

}
?>
