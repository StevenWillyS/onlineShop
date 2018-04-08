<?php
	class beli_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function addCart($idM,$idI,$jml){
			$data = array(
				"ID_Member" => $idM,
				"ID_Iklan" => $idI,
				"Jumlah" => $jml
			);
			return $this->db->insert('keranjang',$data);
		}
		public function getCart($idM){
			$this->db->select('*,I.ID_Member as idm');
			$this->db->from('iklan I,keranjang K');
			$this->db->where('K.ID_Iklan=I.ID_Iklan');
			$this->db->where('K.ID_Member',$idM);
			return $this->db->get();
		}
		public function hapusCart($idM){
			$this->db->where('ID_Member',$idM);
			$this->db->delete('keranjang');
		}
		
	}
?>