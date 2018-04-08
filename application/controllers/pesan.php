<?php
	class pesan extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('pesan_model');
			$this->load->model('member_model');
			$this->load->model('notif_model');
			$this->load->model('beli_model');
			$this->load->helper('url');
			$this->load->library('session');
		}
		public function tampilkanDaftar($idMember){
			$query = $this->pesan_model->getList($idMember);
			$data['query'] = $query;
			$this->load->view('pesan/chatlist',$data);
		}
		public function buatPesan($id,$s=null){
			$id1 = $_SESSION['id'];
			$cek1 = $this->pesan_model->getID($id1,$id);
			$cek2 = $this->pesan_model->getID($id,$id1);
			if($cek1!=null || $cek2!=null){
				if($cek1!=null){
					if($s==null) redirect("/pesan/bukapesan/$cek1/$id");
				} else if($cek2!=null){
					if($s==null) redirect("/pesan/bukapesan/$cek2/$id");
				}
			}
			$st = $this->pesan_model->buatPesan($id1,$id);
			if($st){
				if($s==null) redirect("/pesan/bukapesan/$st/$id");
			}
		}
		public function bukapesan($idP,$idM,$st=null){
			$query = $this->beli_model->getCart($_SESSION['id']);
			$cart['cart'] = $query;
			$query = $this->notif_model->getNotif($_SESSION['id']);
			$cart['notif'] = $query;
			$this->load->view('header/header',$cart);
			$this->load->helper('form');
			$this->load->library('form_validation');
			$query = $this->pesan_model->getPesan($idP);
			$pesan = str_replace('[:]','',$query->Pesan);
			$teks = explode('[;]',$pesan);
			$data['teks'] = $teks;
			$data['query'] = $query;
			if($st==null){
				$this->load->view('pesan/chat',$data);
			} else {
				$this->load->view('pesan/chatR',$data);
			}
		}
		public function kirimPesan(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$pesan = $this->input->post('pesan');
			$pesanLama = $this->input->post('pesanLama');
			$user = $_SESSION['login'];
			$id = $this->input->post('id');
			$idM = $this->input->post('idM');
			$break = explode('[;]',$pesanLama);
			$size = sizeof($break);
			$last = explode('[:]',$break[$size-2]);
			if(strpos($last[0],$user)!==false){
				$last[1] = $last[1].'<br>'.$pesan;
				$gabung = implode('[:]',$last);
				$break[$size-2] = $gabung;
				$pesan = implode('[;]',$break);
				$_SESSION['pesan']= $pesan;
			} else {
				$pesan = '<p class="biru">'.$user.'</p>[:]'.$pesan.'[;]';
				$_SESSION['pesan']= $pesanLama.$pesan;
			}
			if($this->pesan_model->kirimPesan($id)){
				$this->tambahNotif($idM,$id);
				redirect("/pesan/bukapesan/$id/$idM");
			}
		}
		function tambahNotif($id,$idp){
			$user = $_SESSION['login'];
			$url = base_url("pesan/bukapesan/$idp/$id");
			$notif = "Ada <a href='$url'>pesan</a> baru dari $user";
			$cek = $this->notif_model->cekNotif($id,$notif);
			if($cek->row()!=null){
				$data = $cek->row();
				$this->notif_model->rubahStatus($data->kode,0);
			} else {
				$this->notif_model->addNotif($id,$notif);
			}
		}
	}
?>