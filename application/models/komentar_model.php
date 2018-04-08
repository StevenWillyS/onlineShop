 <?php
	class komentar_model extends CI_Model{
		public function getKomentar($idI){
			$this->db->where('ID_Iklan',$idI);
			return $this->db->get('komentar');
		}
		public function tulisKomentar(){
			$data = array(
				'ID_Komentar' => null,
				'Username' => $_SESSION['login'],
				'ID_Iklan' => $this->input->post('ID_Iklan'),
				'Komentar' => $this->input->post('komentar')
			);
			$this->db->insert('komentar',$data);
		}
	}
?>