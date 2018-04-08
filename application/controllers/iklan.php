<?php
	class iklan extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('iklan_model');
			$this->load->model('beli_model');
			$this->load->model('notif_model');
			$this->load->model('komentar_model');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function lihat($idI){
			if(isset($_SESSION['id'])){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);
			} else {
				$this->load->view('header/header');	
			}
			$data['data'] = $this->iklan_model->tampilkanIklan($idI);
			$data['foto']=$this->pecahFoto($data);
			$data['komentar']= $this->komentar_model->getKomentar($idI);
			$this->load->view('iklan/view_iklan',$data);
		}
		public function tulisKomen(){
			$this->komentar_model->tulisKomentar();
			if($_SESSION['id']!=$this->input->post('ID_Member2')){
				$this->tambahNotif($this->input->post('ID_Member2'),$this->input->post('ID_Iklan'));
			}
			redirect($this->input->post('page'));
		}
		function tambahNotif($id,$idI){
			$user = $_SESSION['login'];
			$url = base_url("iklan/lihat/$idI");
			$notif = "Ada <a href='$url'>Komentar</a> baru dari $user";
			$cek = $this->notif_model->cekNotif($id,$notif);
			if($cek->row()!=null){
				$data = $cek->row();
				$this->notif_model->rubahStatus($data->kode,0);
			} else {
				$this->notif_model->addNotif($id,$notif);
			}
		}
		public function buatIklan(){
			if(!isset($_SESSION['login'])){
				redirect(base_url('home'));
			}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('judul','Judul','required|max_length[40]');
			$this->form_validation->set_rules('kategori','Kategori','required');
			$this->form_validation->set_rules('harga','Harga','required|numeric');
			$this->form_validation->set_rules('jumlah','Jumlah','required|numeric');
			if($this->form_validation->run()==false){
				if(isset($_SESSION['id'])){
					$query = $this->beli_model->getCart($_SESSION['id']);
					$cart['cart'] = $query;
					$query = $this->notif_model->getNotif($_SESSION['id']);
					$cart['notif'] = $query;
					$this->load->view('header/header',$cart);
				} else {
					$this->load->view('header/header');	
				}
				$this->load->view('iklan/tambah_barang');
			} else {
				//Penanganan Foto
				$this->load->library('upload');
				$files = $_FILES;
				$count = count($_FILES['foto']['name']);
				for($i=0; $i<$count; $i++){
					$_FILES['foto']['name']= $files['foto']['name'][$i];
					$_FILES['foto']['type']= $files['foto']['type'][$i];
					$_FILES['foto']['tmp_name']= $files['foto']['tmp_name'][$i];
					$_FILES['foto']['size']= $files['foto']['size'][$i];
					$this->upload->initialize($this->set_upload_options());
					if($this->upload->do_upload('foto')==false) {
						$error['err'] = $this->upload->display_errors();
						$query = $this->beli_model->getCart($_SESSION['id']);
						$cart['cart'] = $query;
						$query = $this->notif_model->getNotif($_SESSION['id']);
						$cart['notif'] = $query;
						$this->load->view('header/header',$cart);
						$this->load->view('iklan/tambah_barang',$error);
						return false;
					}
					$upload_data = $this->upload->data();
					$name_array[] = $upload_data['file_name'];
					$fileName = $upload_data['file_name'];
					echo $fileName;
					$images[] = $fileName;
				}
				$fileName = $images;
				$nama = '';
				foreach($fileName as $name){
					$nama = $nama.$name.';';
				}
				$_SESSION['foto'] = $nama;
				$st = $this->iklan_model->buatIklan();
				unset($_SESSION['foto']);
				if($st){
					$_SESSION['tanda'] = 'Tambah Iklan Berhasil';
					redirect(base_url('iklan/daftarIklan'));
				}
			}
		}
		 function set_upload_options(){ 
			$config['upload_path'] = realpath(FCPATH.'assets/img/iklan/');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1000;
			$config['encrypt_name'] = true;
			return $config;
		}
		function pecahFoto($data){
			return explode(';',$data['data']->Foto);
		}
		public function edit($id,$id2=null,$idf=null,$fstatus=null){
			if(!isset($_SESSION['login'])){
				redirect(base_url('home'));
			}
			$query = $this->beli_model->getCart($_SESSION['id']);
			$cart['cart'] = $query;
			$query = $this->notif_model->getNotif($_SESSION['id']);
			$cart['notif'] = $query;
			$this->load->view('header/header',$cart);
			$this->load->helper('form');
			$this->load->library('form_validation');
			$data = $this->iklan_model->tampilkanIklan($id,null);
			$this->form_validation->set_rules('judul','Judul','required|max_length[40]');
			$this->form_validation->set_rules('kategori','Kategori','required');
			$this->form_validation->set_rules('harga','Harga','required|numeric');
			$this->form_validation->set_rules('jumlah','Jumlah','required|numeric');
			if($id=='foto'){
				$this->load->library('upload');
				if($fstatus=='delete'){
					$data = $this->iklan_model->tampilkanIklan($id2,null);
					$nlama = $data->Foto;
					$_SESSION['foto'] = str_replace("$idf","","$nlama");
					$st = $this->iklan_model->editFoto($id2);
					if($st){
						$path = $config['upload_path'].'/'.$idf;
						if($idf!='default.jpg'){
							unlink($path);
						}
						redirect("/iklan/edit/foto/$id2");
					}
				} else if($fstatus=='edit'){
					$config = $this->set_upload_options();
					$this->upload->initialize($config);
					if($this->upload->do_upload('foto')==false){
						$error = $this->upload->display_errors();
						$_SESSION['error'] = $error;
						redirect("/iklan/edit/foto/$id2");
					} else {
						$data = $this->iklan_model->tampilkanIklan($id2,null);
						$nama = $this->upload->file_name;
						$nlama = $data->Foto;
						$_SESSION['foto'] = str_replace("$idf","$nama","$nlama");
						$st = $this->iklan_model->editFoto($id2);
						if($st){
							$path = $config['upload_path'].'/'.$idf;
							if($idf!='default.png'){
								unlink($path);
							}
							redirect("/iklan/edit/foto/$id2");
						}
					}
				} else if($fstatus=='tambah'){
					$config = $this->set_upload_options();
					$this->upload->initialize($config);
					if($this->upload->do_upload('tambahFoto')==false){
						$error = $this->upload->display_errors();
						$_SESSION['error'] = $error;
						redirect("/iklan/edit/foto/$id2");
					} else {
						$data = $this->iklan_model->tampilkanIklan($id2,null);
						$nama = $this->upload->file_name;
						$nlama = $data->Foto;
						$_SESSION['foto'] = $nlama.$nama.';';
						$st = $this->iklan_model->editFoto($id2);
						if($st){
							redirect("/iklan/edit/foto/$id2");
						}
					}
				} else {
					$data['data'] = $this->iklan_model->tampilkanIklan($id2,null);
					$data['foto']=$this->pecahFoto($data);
					$this->load->view('iklan/editFoto1',$data);
				}
			} else {
				if($this->form_validation->run()==false){
					$this->load->view('iklan/update_barang',$data);
				} else {
					$st = $this->iklan_model->editIklan($data->ID_Iklan);
					if($st){
						$_SESSION['tanda'] = 'Edit Iklan Berhasil';
						redirect(base_url('iklan/daftarIklan'));	
					}
				}
			}
		}
		public function cariIklan(){
			$keyword = $this->input->post('search');
			$query = $this->iklan_model->seleksiIklan($keyword);
			$data['cari'] = 'Pencarian: '.$keyword;
			$data['iklan'] = $query;
			if(isset($_SESSION['id'])){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);
			} else {
				$this->load->view('header/header');	
			}
			$this->load->view('index.php',$data);
		}
		public function kategori($keyword){
			str_replace('-',' ',$keyword);
			$query = $this->iklan_model->seleksiIklan(null,$keyword);
			// $data['cari'] = 'Kategori: '.$keyword;
			$data['query'] = $query;
			$this->load->view('iklan/cariIklan',$data);
		}
		public function daftarIklan(){
			if(isset($_SESSION['id'])){
				$query = $this->beli_model->getCart($_SESSION['id']);
				$cart['cart'] = $query;
				$query = $this->notif_model->getNotif($_SESSION['id']);
				$cart['notif'] = $query;
				$this->load->view('header/header',$cart);
				$query = $this->iklan_model->tampilkanIklan(null,$_SESSION['id']);
				$data['iklan'] = $query;
				$this->load->view('iklan/item_list',$data);
			} else {
				redirect(base_url('home'));
			}
		}
	}
?>