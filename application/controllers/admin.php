 <?php
	class admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model('iklan_model');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function showIklan(){
			if(!isset($_SESSION['loginA'])){
				redirect(base_url('admin/login'));
			}
			$query = $this->iklan_model->tampilkanIklan();
			$iklan['query'] = $query;
			$iklan['header'] = 'Daftar Iklan';
			$this->load->view('admin/header');
			$this->load->view('admin/admin_item',$iklan);
		}
		public function verifikasi($id){
			$st = $this->iklan_model->verifikasi($id);
			if($st){
				$_SESSION['tanda']='Verifikasi Iklan Berhasil';
				redirect('/admin/showIklan');
			}
		}
		public function hapus($id){
			$st = $this->iklan_model->hapusIklan($id);
			if($st){
				$_SESSION['tanda']='Hapus Iklan Berhasil';
				redirect('/admin/showIklan');
			}
		}
		public function showMember(){
			if(!isset($_SESSION['loginA'])){
				redirect(base_url('admin/login'));
			}
			$query = $this->admin_model->getMember();
			$data['query'] = $query;
			$this->load->view('admin/header');
			$this->load->view('admin/admin',$data);
		}
		public function deleteMember($id){
			$st = $this->admin_model->deleteMember($id);
			if($st){
				redirect(base_url('admin/showMember'));
			}
		}
		public function login(){
			if(isset($_SESSION['loginA'])){
				redirect(base_url('admin/showMember'));
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run() == false) {
				$this->load->view('admin/login');
			} else {
				$login = $this->admin_model->login();
				if($login){
					$_SESSION['loginA'] = $login->Username;
					$_SESSION['idA'] = $login->ID_Admin;
					redirect('/admin/showMember');
				} else {
					setcookie('notif','Username/Password Tidak Terdaftar');
					redirect('/admin/login');
				}
			}
		}
		public function logout(){
			unset($_SESSION['loginA']);
			unset($_SESSION['idA']);
			redirect(base_url('home'));			
		}
	}
 ?>