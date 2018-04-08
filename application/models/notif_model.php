 <?php
	class notif_model extends CI_Model{
		public function addNotif($id,$notif){
			$data = array(
				"kode" => null,
				"ID_Member" => $id,
				"Pesan" => $notif,
				"Terbaca" => 0
			);
			$this->db->insert('notifikasi',$data);
		}
		public function getNotif($id){
			$this->db->where('ID_Member',$id);
			$this->db->order_by('Terbaca','asc');
			$this->db->order_by('kode','desc');
			return $this->db->get('notifikasi');
		}
		public function cekNotif($id,$notif){
			$this->db->where('ID_Member',$id);
			$this->db->where('Pesan',$notif);
			return $this->db->get('notifikasi');
		}
		public function rubahStatus($kode,$status){
			$this->db->set("Terbaca",$status);
			$this->db->where('kode',$kode);
			$this->db->update('notifikasi');
		}
		public function readAll($id){
			$this->db->set('Terbaca',1);
			$this->db->where('ID_Member',$id);
			$this->db->update('notifikasi');
		}
	}
 ?>