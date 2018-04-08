<?php
//waktu buat kelas kontroler wajib extends CI_Controller
// cara akses alamat di CI misal folder hasil download CI ditaruh di htdocs/CodeIgniter
// akses file2nya pakai localhost/CodeIgniter/index.php/'namaKelasKontroler'/'NamaMethod'/'ParameterMethod'/
// contoh localhost/CodeIgniter/index.php/News/create
class News extends CI_Controller {
		//konstruktor
        public function __construct()
        {
				//konstruktor dari CI_Controller
                parent::__construct();
				//ini buat manggil modelnya, nanti tinggal diganti ganti aja yang 
				//dalem tanda petik sesuai nama model yang dibuat, biar method2nya dari kelas modelnya bisa dipakai
                $this->load->model('news_model');
				//helper dari CI, buat seputar url, disini dipakai di set_news
                $this->load->helper('url_helper');
        }
		//index bisa diakses tanpa kasih nama method, tinggal nama kelas
		//localhost/CodeIgniter/index.php/News
		//localhost/CodeIgniter/index.php/News/index
		//2 diatas sama
        public function index()
        {
			//array data untuk di parsing ke view
			//disini $this->news_model->get_news(), cara manggil kelas+method dari modelnya
			//wajib di load model dulu sebelum bisa manggil seperti ini (baris 14)
			//news_model (nama kelas modelnya), get_news (nama method di kelas news_model)
			$data['news'] = $this->news_model->get_news();
			$data['title'] = 'News archive';
			//manggil viewnya, disini fungsi utama buat load halaman html yang dibuat di view
			//kalau 3 dibawah dihapus, waktu akses index, gk keluar apa2
			//di dalem parameter view bisa dikasih 2 parameter, 1 alamat dari view atau halaman html yang udah dibuat
			//2 variabel yang mau dikirim ke view, jadi nanti di view bisa echo $data['news'] sama $data['title'] yang
			//dibuat di baris 28-29. nama variabelnya di dalem view nanti sudah gk pakai $data['news'] atau $data['title'] lagi, tapi jadi
			//$news sama $title. nanti waktu echo $title di view keluarnya 'News archive'
			//jadi kalau mau ngirim sesuatu buat ditampilin wajib dimasukin di array asosiasi
			$this->load->view('templates/header', $data); //alamatnya ada di views/templates/header
			$this->load->view('news/index', $data); //alamatnya ada di views/news/index
			$this->load->view('templates/footer'); //alamatnya ada di templates/footer
			//habis bikin view wajib dimasukin di folder views nanti aksesnya tinggal seperti diatas
			//contoh bikin buatIklan.php (isinya halaman html) dimasukin di folder views
			//nanti kalau ingin nampilin halaman itu tinggal $this->load->view('buatIklan');
			
			//disini halaman htmlnya dipecah jadi 3, header, isi, sama footer
			//nanti tampilnya akan sesuai urutan
			// isi templates/header
			// isi news/index
			// isi templates/footer
			// ini biar mudah maintenancenya dan header cukup dibuat di file templates/header tinggal ganti ganti isinya aja
        }
		//method view buat nampilin berita
		//parameter $slug disini buat judul/kata kunci dari url berita
		//jadi misal mau lihat berita bisa diakses pakai
		// localhost/CodeIgniter/index.php/News/view/Berita1
		// localhost/CodeIgniter/index.php/News/view/Berita2
		// localhost/CodeIgniter/index.php/News/view/Berita3
		//cukup buat 1 method sama 1 view ntar beritanya bisa beda2
		//dikasih = null buat nilai defaultnya kalau gk dikasih parameter
        public function view($slug = NULL)
        {
				//manggil method get_news dari file model, news_model
				//parameter $slug biar dapet berita yang sesuai sama yang dicari
				//lebih lengkap bisa dilihat di news_model
                $data['news_item'] = $this->news_model->get_news($slug);
				//kalau berita yang dicari gk ada atau kosong, nampilin 404 (not found)
				if (empty($data['news_item']))
				{
					show_404();
				}
				//kalau gk kosong lanjut kesini
				// $this->news_model->get_news ini ngembaliin data berupa array
				//jadi disini $data['title'] diisi sama isi kolom title dari database yang diquery di get_news
				$data['title'] = $data['news_item']['title'];
				//nampilin viewnya, prosesnya sama kyk diatas
				//disini header sama footernya tetep, tinggal ganti isinya aja dari diatas news/index sekarang jadi news/view
				$this->load->view('templates/header', $data);
				$this->load->view('news/view', $data);
				$this->load->view('templates/footer');
        }
		//operasi create crud
		public function create()
		{
			//helper sama library dibawah buat form sama validasinya
			$this->load->helper('form');
			$this->load->library('form_validation');
			//title buat di headernya
			$data['title'] = 'Create a news item';
			//disini buat aturan validasinya
			//didalem set_rules ada 3 parameter
			//parameter 1 nama inputnya, jadi misal di viewnya ada
			//<input type="text" name="title">, di parameter pertama ditulis sesuai isi dari name
			//parameter 2 untuk keterangan errornya, jadi misal diisi 'Title' nanti kalau belum diisi tapi disubmit
			//kurang lebih muncul "Title belum diisi", atau misal diganti 'Judulnya' keluar "Judulnya belum diisi"
			//parameter 3 buat aturannya, ada banyak bisa dilihat di manualnya
			//disini required berarti wajib diisi, kalau ada lebih dari 1 aturan di pisah sama '|'
			//misal set_rules('title','Title','required|numeric|dst')
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			
			//disini buat cek apakah sudah sesuai sama rules yang dibuat tadi atau belum
			//$this->form_validation->run() ini buat cek sesuai rules atau belum, kalau sesuai ngembaliin true kalau gk sesuai false
			//kalau misal masih ada yang kosong bakalan masuk ke bagian if, karena bernilai false
			//waktu akses create pertama kali (localhost/CodeIgniter/index.php/News/create
			//langsung masuk ke bagian false, karena belum diisi textnya, dan langsung nampilin 
			//header, create, sama footer
			//jadi waktu ada yang gk sesuai rules atau waktu pertama kali akses create akan masuk ke bagian false
			//buat nampilin form input create berita
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');

			}
			else //kalau udah bener (true) masuk ke bagian else 
			{
				//manggil method set_news dari kelas model: news_model
				$this->news_model->set_news();
				//nampilin view 'news/success' sambil dikasih argumen $data (isinya di baris 87)
				$this->load->view('news/success', $data);
			}
		}
}