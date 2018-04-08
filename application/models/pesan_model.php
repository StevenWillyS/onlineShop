 <?php
	class pesan_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function getList($id){
			$this->db->where('ID_Member1',$id)
					 ->or_where('ID_Member2',$id);
			return $this->db->get('pesan');
		}
		public function getPesan($idP){
			$this->db->where('ID_Pesan',$idP);
			return $this->db->get('pesan')->row();
		}
		public function kirimPesan($idP){
			$data = array(
				"Pesan" => $_SESSION['pesan']
			);
			unset($_SESSION['pesan']);
			$this->db->where('ID_Pesan',$idP);
			return $this->db->update('pesan',$data);
		}
		public function getID($idS,$idR){
			$this->db->where('ID_Member1',$idS);
			$this->db->where('ID_Member2',$idR);
			$id = $this->db->get('pesan')->row();
			if($id!=null){
				return $id->ID_Pesan;
			} else {
				return false;
			}
		}
		public function buatPesan($idS,$idR){
			$data = array(
				"ID_Pesan" => null,
				"ID_Member1" => $idS,
				"ID_Member2" => $idR,
				"Pesan" => null
			);
			$st = $this->db->insert('pesan',$data);
			if($st==true){
				return $this->getID($idS,$idR);
			} else {
				return null;
			}
		}
	}
 ?>