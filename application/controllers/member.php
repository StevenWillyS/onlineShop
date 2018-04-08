<?php
	class member extends CI_Controller{
		public function __construct(){
            parent::__construct();
			$this->load->model('member_model');
			$this->load->model('iklan_model');
			$this->load->model('notif_model');
			$this->load->model('beli_model');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function profile($cari = null){
			if($cari==null){
				if(!isset($_SESSION['login'])){
					redirect(base_url('home'));
				}
				if(isset($_SESSION['id'])){
					$query = $this->beli_model->getCart($_SESSION['id']);
					$cart['cart'] = $query;
					$query = $this->notif_model->getNotif($_SESSION['id']);
					$cart['notif'] = $query;
					$this->load->view('header/header',$cart);
				} else {
					$this->load->view('header/header');	
				}
				$member = $this->member_model->profil($_SESSION['login']);
				$this->load->view('member/profile',$member);
			} else {
				if(isset($_SESSION['login'])){
					if($cari==$_SESSION['login']) redirect(base_url('member/profile'));
				}
				if(isset($_SESSION['id'])){
					$query = $this->beli_model->getCart($_SESSION['id']);
					$cart['cart'] = $query;
					$query = $this->notif_model->getNotif($_SESSION['id']);
					$cart['notif'] = $query;
					$this->load->view('header/header',$cart);
				} else {
					$this->load->view('header/header');	
				}
				$member = $this->member_model->profil($cari);
				if($member==null){
					$_SESSION['notif'] = "Username tidak ditemukan";
					redirect(base_url('home'));
				} else {
					$this->load->view('member/profilother',$member);
					$query = $this->iklan_model->tampilkanIklan(null,$member->ID_Member);
					$data['iklan'] = $query;
					$this->load->view('iklan/item_list2',$data);
				}
			}
		}
		public function profil($cari = null){
			// session_start();
			if($cari!=null){
				if(isset($_SESSION['login'])){
					if($cari==$_SESSION['login']){
						redirect('/member/profil');
					}
				}
				$member = $this->member_model->profil($cari);
				if($member==null){
					$_SESSION['notif'] = "Username tidak ditemukan";
					redirect('/member/login');
				} else {
					$this->load->view('member/profilother',$member);
				}
			} else {
				if(!isset($_SESSION['login'])){
					redirect('/member/login');
				} else {
					if(isset($_SESSION['notif'])){
						echo '<script>alert("'.$_SESSION['notif'].'")</script>';
						unset($_SESSION['notif']);
					}
					$member = $this->member_model->profil($_SESSION['login']);
					$query = $this->iklan_model->tampilkanIklan(null,$_SESSION['id']);
					$iklan['query'] = $query;
					$this->load->view('member/profil',$member);
					$this->load->view('iklan/daftarIklan',$iklan);
				}
			}
		}
		public function logout(){
			unset($_SESSION['login']);
			unset($_SESSION['id']);
			redirect('/home');			
		}
		public function login(){
			if(isset($_SESSION['login'])){
				redirect('/member/profil');
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run() == false) {
				redirect('/home');
			} else {
				$login = $this->member_model->login();
				if($login){
					$_SESSION['login'] = $login->Username;
					$_SESSION['id'] = $login->ID_Member;
					redirect('/home');
				} else {
					$_SESSION['notif'] = 'Username/Password Tidak Terdaftar';
					redirect('/home');
				}
			}
		}
		public function register(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required|is_unique[member.Username]');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('repassword','RePassword','required|matches[password]');
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('tglLahir','Tgl Lahir','required|callback_date_valid');
			$this->form_validation->set_rules('noHP','No HP','required|numeric|max_length[12]|min_length[6]');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.Email]');	
			if($this->form_validation->run() == false){
				$this->load->view('member/customer_registration.php');
			} else {
				$this->member_model->register();
				$_SESSION['notif'] = 'Registrasi Berhasil';
				redirect(base_url('home'));
			}
		}
		public function edit(){
			if(!isset($_SESSION['login'])){
				redirect(base_url('home'));
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$member = $this->member_model->profil($_SESSION['login']);
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('tglLahir','Tgl Lahir','required|callback_date_valid');
			$this->form_validation->set_rules('noHP','No HP','required|numeric|max_length[12]|min_length[6]');
			if($this->input->post('email')==$member->Email){
				$this->form_validation->set_rules('email','Email','required');
			} else {
				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member.Email]');
			}
			if($this->form_validation->run() == false){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);			
				$this->load->view('member/edit_profile',$member);
			} else {
				$this->member_model->edit('data',$member->ID_Member);
				$_SESSION['tanda'] = "Update Profil Sukses";
				redirect(base_url('member/profile'));
			}
		}
		public function editPass(){
			if(!isset($_SESSION['login'])){
				redirect(base_url('home'));
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('plama','Password Lama','required');
			$this->form_validation->set_rules('pbaru','Password Baru','required');
			$member = $this->member_model->profil($_SESSION['login']);
			if($this->input->post('plama')!=null){
				$pass = password_verify($this->input->post('plama'),$member->Password);
				if($pass==false) {
					$_SESSION['tanda'] = "Password Lama Salah";
					redirect(base_url('member/edit'));
				}
			}
			if($this->form_validation->run() == false || $pass==false){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);			
				$this->load->view('member/edit_profile_password',$member);
			} else {
				$st = $this->member_model->edit('password',$member->ID_Member);
				$_SESSION['tanda'] = "Update Password Sukses";
				redirect(base_url('member/edit'));
			}
		}
		public function editFoto(){
			if(!isset($_SESSION['login'])){
				redirect(base_url('home'));
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$member = $this->member_model->profil($_SESSION['login']);
			$config['upload_path'] = realpath(FCPATH.'assets/img/');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 500;
			$config['encrypt_name'] = true;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('foto')==false){
				$error = array('error' => $this->upload->display_errors());
				if(strpos($error['error'],'You did not select a file to upload')==true) {
					$error['error'] ='';
				}
				$_SESSION['tanda']=$error['error'];
				if($_SESSION['tanda']=='') {
					unset($_SESSION['tanda']);
				}
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);			
				$this->load->view('member/edit_profile_foto',$member);
			} else {
				$st = $this->member_model->edit('foto',$member->ID_Member);
				$_SESSION['tanda'] = "Update Foto Sukses";
				if($st) {
					$path = $config['upload_path'].'/'.$member->FotoProfil;
					if($member->FotoProfil!='default.jpg'){
						unlink($path);
					}
					redirect(base_url('member/edit'));
				}
			}
		}
		function date_valid($date){
			if(strlen($date)>10){
				return false;
			}
			$year = (int) substr($date,0,4);
			$month = (int) substr ($date,5,2);
			$day = (int) substr ($date,8,2);
			return checkdate($month,$day,$year);
		}
	}
?>