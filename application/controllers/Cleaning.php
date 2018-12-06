<?php
header("Access-Control-Allow-Origin: *");
Class Cleaning extends CI_Controller{
	var $start=12190;
	var $limit=50;

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper("url");
	}
	function index(){
		$data["start"]=$this->start;
		$data["limit"]=$this->limit;
		$data["base_url"]=base_url();
		$this->load->view("cleaning",$data);
	}
	function do_clean(){
		
		$start = !empty($this->input->get("s")) ? $this->input->get("s") : 0;
		$data = $this->db->select("word_id,id,definition")->from("m_words")->limit($this->limit,$start)->get()->result();
		$result = array();
		$result["status"] = true;
		$result["start"] = (int)$start;
		$result["total"] = count($data);
		$result["data"] = $data;
		echo json_encode($result);
	}
	function do_send(){
		$data = $this->input->post("data");
		$success = 0;
		foreach ($data as $row) {
			$word_id = $row["word_id"];
			$definition = $row["definition"];
			// $row = $this->db->select("word_id,id,definition")->from("m_words")->where("word_id", $word_id) ->get()->row();
			
			if (false!=$word_id){
				$update = $this->db->where("word_id", $word_id)->update( "m_words", array("definition" => $definition) );
				if ($update) $success++;
			}
		}

		$result = $success>0;
		echo json_encode($result);
	}
	function test(){

	}
}