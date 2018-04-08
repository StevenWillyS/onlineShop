<?php
	class admin_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function getMember(){
			return $this->db->get('member');
		}
		public function deleteMember($id){
			$this->db->where('ID_Member',$id);
			return $this->db->delete('member');
		}
		public function login(){
			$this->db->where('Username',$this->input->post('username'));
			$result = $this->db->get('admin');
			if($result->num_rows()){
				$hasil = $result->row();
				if(password_verify($this->input->post('password'),$hasil->Password)){
						return $hasil;
				}
			} else {
				return false;
			}	
		}
	}
?>