<?php
header("Access-Control-Allow-Origin: *");
Class Home extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}
	function index(){
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
		$word = $kata;
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
}