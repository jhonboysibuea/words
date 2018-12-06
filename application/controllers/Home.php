<?php
header("Access-Control-Allow-Origin: *");
Class Home extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}
	function index(){
		$data["description"] = "carikata.id sarana elektronik untuk mencari kata yang berada dalam kamus besar bahasa indonesia";
		$data["keywords"] = "kbbi online, web kamus, kamus lengkap, kamus besar, bahasa indonesia";
		$data["base_url"]=base_url();
		$this->load->view("home/header",$data);
		$this->load->view("home/home",$data);
		$this->load->view("home/footer",$data);
	}
	function find(){
		$word = $this->input->post('word');
		$result=$this->db->select('word_id,id,definition')->from('m_words')->where('id',$word)->limit(20)->order_by('id','asc')->get()->result();
		echo json_encode($result);
	}
	function arti_kata($kata){
		$word = str_replace("-", " ", $kata);
		$data["description"] = "arti kata ".$word." dalam kamus besar bahasa indonesia";
		$data["title"] = "arti kata ".$word." dalam kamus besar bahasa indonesia";
		$data["keywords"] = "arti kata ".$word.", kbbi online, kamus besar, bahasa indonesia";
		$row=$this->db->select('word_id,id,definition')->from('m_words')->where('id',$word)->limit(20)->order_by('id','asc')->get()->row();
		$data["base_url"]=base_url();
		$data["row"]=$row;
		$this->load->view("home/header",$data);
		$this->load->view("home/arti_kata",$data);
		$this->load->view("home/footer",$data);
	}
	function hubungi_kami(){
		$data["base_url"]=base_url();
		$this->load->view("home/header",$data);
		$this->load->view("home/hubungi_kami",$data);
		$this->load->view("home/footer",$data);
	}
	function tentang_kami(){
		$data["base_url"]=base_url();
		$this->load->view("home/header",$data);
		$this->load->view("home/tentang_kami",$data);
		$this->load->view("home/footer",$data);
	}
	function kebijakan_privasi(){
		$data["base_url"]=base_url();
		$this->load->view("home/header",$data);
		$this->load->view("home/kebijakan_privasi",$data);
		$this->load->view("home/footer",$data);
	}
	function robots(){
		$base_url = base_url();
		$data = <<<'EOF'
User-agent: Mediapartners-Google
Disallow: 

User-agent: *
Disallow: /search
Allow: /

Sitemap: {$base_url}/sitemap.xml
EOF;
		file_put_contents("robots.txt", $data);
	}
	function sitemap(){
		$data = 
		'<?xml version=\'1.0\' encoding=\'UTF-8\'?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		$result=$this->db->select('word_id,id,definition')->from('m_words')->order_by('id','asc')->get()->result();
		// var_dump($result);
		foreach ($result as $row) {
			$word_id = trim($row->id);
			$word_id = str_replace(" ", "-", $word_id);
			$data .= '<url><loc>'.base_url().'arti-kata/'.$word_id.'</loc></url>';

		}

		$data .= '</urlset>';
		file_put_contents("sitemap.xml", $data);
	}
}