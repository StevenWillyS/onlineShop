 <?php
	class member_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function register(){
			$data = array(
				'ID_Member' => null,
				'Username' => $this->input->post('username'),
				'Password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'Nama' => $this->input->post('nama'),
				'TglLahir' => $this->input->post('tglLahir'),
				'FotoProfil' => 'default.jpg',
				'No_HP' => $this->input->post('noHP'),
				'Email' => $this->input->post('email')
			);
			$this->db->insert('member',$data);
		}
		public function edit($status,$id){
			$st='';
			$this->db->where('ID_Member',$id);
			if($status=="data"){
				$data = array (
					'Nama' => $this->input->post('nama'),
					'TglLahir' => $this->input->post('tglLahir'),
					'No_HP' => $this->input->post('noHP'),
					'Email' => $this->input->post('email')
				);
				$st = $this->db->update('member',$data);
				
			} else if ($status=="password"){
				$data = array(
					'Password' => password_hash($this->input->post('pbaru'),PASSWORD_DEFAULT)
				);
				$st = $this->db->update('member',$data);
			} else {
				$data = array(
					'FotoProfil' => $this->upload->file_name
				);
				$st = $this->db->update('member',$data);
			}
			return $st;
		}
		public function login(){
			$this->db->where('Username',$this->input->post('username'));
			$result = $this->db->get('member');
			if($result->num_rows()){
				$hasil = $result->row();
				if(password_verify($this->input->post('password'),$hasil->Password)){
					return $hasil;
				}
			} else {
				return false;
			}
		}
		public function profil($data){
			$this->db->where('Username',$data);
			return $this->db->get('member')->row();
		}
		public function getProfil($id){
			$this->db->where('ID_Member',$id);
			return $this->db->get('member')->row();
		}
	}
 ?>