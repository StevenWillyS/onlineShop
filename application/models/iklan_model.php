<?php
	class iklan_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function buatIklan(){
			$data = array(
				'ID_Iklan' => null,
				'ID_Member' => $this->input->post('id'),
				'Judul' => $this->input->post('judul'),
				'Kategori' => $this->input->post('kategori'),
				'Deskripsi' => $this->input->post('deskripsi'),
				'Foto' => $_SESSION['foto'],
				'Harga' => $this->input->post('harga'),
				'Jumlah' => $this->input->post('jumlah'),
				'Verifikasi' => 0,
				'ID_Admin' => null
			);
			return $this->db->insert('iklan',$data);
		}
		public function tampilkanIklan($idIklan = null,$idMember = null){
			if($idIklan == null&&$idMember!=null){
				$this->db->where('ID_Member',$idMember);
				return $this->db->get('iklan');
			} else if($idIklan==null&&$idMember==null){
				$this->db->from('iklan I, member M');
				$this->db->where('I.ID_Member=M.ID_Member');
				return $this->db->get();
			} if($idMember==null&&$idIklan!=null){
				$this->db->from('iklan I, member M');
				$this->db->where('I.ID_Member=M.ID_Member');
				$this->db->where('ID_Iklan',$idIklan);
				return $this->db->get()->row();
			}
		}
		public function semuaIklan(){
			$this->db->from('iklan I, member M');
			$this->db->where('I.ID_Member=M.ID_Member');
			$this->db->where('Verifikasi',1);
			return $this->db->get();
		}
		public function seleksiIklan($keyword=null,$kategori=null){
			if($keyword!=null){
				$this->db->like('Judul',$keyword);
				$this->db->where('Verifikasi',1);
				return $this->db->get('iklan');
			} else {
				$this->db->where('Kategori',$kategori);
				$this->db->where('Verifikasi',1);
				$this->db->order_by('Judul','asc');
				return $this->db->get('iklan');
			}
		}
		public function verifikasi($id){
			$this->db->set('Verifikasi',1);
			$this->db->set('ID_Admin',$_SESSION['idA']);
			$this->db->where('ID_Iklan',$id);
			return $this->db->update('iklan');
		}
		public function editIklan($id){
			$data = array(
				'Judul' => $this->input->post('judul'),
				'Kategori' => $this->input->post('kategori'),
				'Harga' => $this->input->post('harga'),
				'Deskripsi' => $this->input->post('deskripsi'),
				'Jumlah' => $this->input->post('jumlah')
			);
			$this->db->where('ID_Iklan',$id);
			return $this->db->update('iklan',$data);
		}
		public function editFoto($id){
			$data = array (
				'Foto' => $_SESSION['foto']
			);
			unset($_SESSION['foto']);
			$this->db->where('ID_Iklan',$id);
			return $this->db->update('iklan',$data);
		}
		public function hapusIklan($id = null){
			$this->db->where('ID_Iklan',$id);
			return $this->db->delete('iklan');
		}
	}
?>