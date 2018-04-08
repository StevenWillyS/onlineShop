<?php
	class home extends CI_Controller{
		public function __construct(){
            parent::__construct();
			$this->load->model('member_model');
			$this->load->model('iklan_model');
			$this->load->model('beli_model');
			$this->load->model('notif_model');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function index(){
			$this->load->helper('form');
			$query = $this->iklan_model->semuaIklan();
			$data['iklan'] = $query;
			if(isset($_SESSION['id'])){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$query = $this->iklan_model->seleksiIklan(null,'Alat Olahraga');
				$data['alatOlahraga'] = $query;
				$query = $this->iklan_model->seleksiIklan(null,'Elektronik');
				$data['elektronik'] = $query;
				$query = $this->iklan_model->seleksiIklan(null,'HP & Laptop');
				$data['hpLaptop'] = $query;
				$query = $this->iklan_model->seleksiIklan(null,'Kendaraan');
				$data['kendaraan'] = $query;
				$query = $this->iklan_model->seleksiIklan(null,'Alat Dapur');
				$data['alatDapur'] = $query;
				$this->load->view('header/header',$cart);
				$this->load->view('index2.php',$data);
			} else {
				$this->load->view('header/header');	
				$this->load->view('index.php',$data);
			}
		}
		public function register(){
			$this->load->helper('form');
			$this->load->view('member/customer_registration.php');
		}
		public function kategori($keyword){
			$keyword = str_replace('-',' ',$keyword);
			$keyword = urldecode($keyword);
			$query = $this->iklan_model->seleksiIklan(null,$keyword);
			$data['iklan'] = $query;
			$this->load->view('iklan/cariIklan',$data);
		}
		public function profil(){
			$query = $this->beli_model->getCart($_SESSION['id']);
			$cart['cart'] = $query;
			$query = $this->notif_model->getNotif($_SESSION['id']);
			$cart['notif'] = $query;
			$this->load->view('header/header',$cart);
			$this->load->view('member/profile');
		}
	}
?>