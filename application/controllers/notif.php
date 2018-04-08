 <?php
	class notif extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('notif_model');
		}
		public function tambahNotif($id,$kode,$beli=null,$id1=null,$id2=null){
			$user = $_SESSION['login'];
			if($kode==1){
				$notif = "Ada pesan baru dari $user";
				$cek = $this->notif_model->cekNotif($id,$notif);
				if($cek!=null){
					$data = $cek->row();
					$this->notif_model->rubahStatus($data->kode,0);
				} else {
					$this->notif_model->addNotif($id,$notif);
				}
				redirect("/pesan/bukapesan/$id1/$id2");
			} else if ($kode==2){
				$notif = "Ada komentar baru pada iklan $beli";
				$this->notif_model->addNotif($id,$notif);
			} else if ($kode==3){
				$notif = "$user membeli $beli";
				$this->notif_model->addNotif($id,$notif);
			}
		}
		public function bacaNotif(){
			$this->notif_model->readAll($_SESSION['id']);
		}
	}
 ?>