<?php
//buat kelas model wajib extends CI_Model
class News_model extends CI_Model {

        public function __construct()
        {
				//inisialisasi database di CI
                $this->load->database();
        }
		//method get_news buat query berita dari database
		//di kontroler di pakai di method index sama view
		public function get_news($slug = FALSE)
		{	
		//kalau $slug = false (tidak dikasih parameter) masuk ke if
		//tanpa parameter ini buat query semua berita (dipakai di index)
        if ($slug === FALSE)
        {
                $query = $this->db->get('news'); // querynya "SELECT * FROM news"
                return $query->result_array(); // return hasilnya dalam bentuk array
        }
		//kalau $slug diisi (dipakai di method view)
        $query = $this->db->get_where('news', array('slug' => $slug));//querynya "SELECT * FROM news WHERE slug = $slug (nilai di parameter) 
        //kondisi where biasanya dimasukin dalem array, jadi kalau ada kondisi banyak bisa dikasih koma
		//contoh array('slug' => $slug, 'judul' => $judul) 
		return $query->row_array(); //return hasilnya dalam bentuk array (cuma 1 baris pertama)
		}
		
		//buat insert di database, dipanggil di method create
		public function set_news()
		{
			//url helper awal di kelas news dipakai disini
			$this->load->helper('url');
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
			//$this->input->post('title') ini dipakai buat ambil nilai sama kyk $_POST['title']
			//url_title akan ganti spasi sama dash (-) jadi kalau judulnya
			// Berita Utama Minggu Ini --> berita-utama-minggu-ini

			//data yang mau diinsert ke database dimasukin dalam array
			// 'title' => $this->input->post('title')
			// 'title' ini nama kolom tabelnya
			// $this->input->post('title') ini value yang dimasukin ke kolom 'title'
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);
			//operasi insertnya pakai $this->db->insert('news',$data)
			//'news' nama tabelnya , $ data ini array di baris 42
			return $this->db->insert('news', $data);
		}
}