<?php
class beli extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('member_model');
		$this->load->model('iklan_model');
		$this->load->model('beli_model');
		$this->load->model('pesan_model');
		$this->load->model('notif_model');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function tambahCart(){
		$idM = $_SESSION['id'];
		$idI = $this->input->post('ID_Iklan');
		$jml = $this->input->post('jumlah');
		$this->beli_model->addCart($idM,$idI,$jml);
		if (strpos($this->input->post('page'), 'kategori') !== false) {
			redirect(base_url('home'));
		}
		redirect($this->input->post('page'));
	}
	public function clearCart(){
		$this->beli_model->hapusCart($_SESSION['id']);
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function beli(){
		$dataCart = $this->beli_model->getCart($_SESSION['id']);
		$idsaya = $_SESSION['id'];
		$username = $_SESSION['login'];
		foreach($dataCart->result() as $cart){
			$idp = $this->pesan_model->getID($idsaya,$cart->idm);
			if($idp==null){
				$idp = $this->pesan_model->getID($cart->idm,$idsaya);	
			}
			if($idp==null){
				if($idsaya==$cart->idm){
					$_SESSION['notif'] = 'Pembelian Error, ada iklan sendiri yang termasuk';
					redirect(base_url('home'));
				} else {
					$this->pesan_model->buatPesan($idsaya,$cart->idm,'not');
					$idp = $this->pesan_model->getID($idsaya,$cart->idm);
				}
			}
			$dataPesan = $this->pesan_model->getPesan($idp);
			$pesanLama = $dataPesan->Pesan;
			$id = $dataPesan->ID_Pesan;
			$idM = $dataPesan->ID_Member1==$_SESSION['id']? $dataPesan->ID_Member2 : $dataPesan->ID_Member1;
			$pesan = "Member $username ingin membeli barang anda pada iklan yang berjudul $cart->Judul";
			$this->kirimPesan($pesan,$idM,$id,$pesanLama);
		}
		// hapus Cart
		$this->beli_model->hapusCart($_SESSION['id']);
		$_SESSION['notif'] = 'Pembelian Berhasil, Tunggu info lebih lanjut dari penjual';
		// redirect($_SERVER['HTTP_REFERER']);
		redirect(base_url('home'));
	}
	function kirimPesan($pesan,$idM,$id,$pesanLama){
		$user = $_SESSION['login'];			
		$pesan = '<p class="hitam">System</p>[:]'.$pesan.'[;]';
		$_SESSION['pesan']= $pesanLama.$pesan;
		if($this->pesan_model->kirimPesan($id)){
			$this->tambahNotif($idM,$id);
		}
	}
	function tambahNotif($id,$idp){
		$user = $_SESSION['login'];
		$url = base_url("pesan/bukapesan/$idp/$id");
		$notif = "Ada <a href='$url'>pemesanan</a> baru dari $user";
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