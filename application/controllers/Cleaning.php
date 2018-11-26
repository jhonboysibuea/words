<?php

Class Cleaning extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function index(){
		$this->load->view("cleaning");
	}
	function do_clean(){
		$start = !empty($this->input->get("s")) ? $this->input->get("s") : 0;
		$data = $this->db->select("word_id,id,definition")->from("m_words")->limit(1,$start)->get()->result();
		$result = array();
		$result["status"] = true;
		$result["start"] = (int)$start;
		$result["total"] = count($data);
		$result["data"] = $data;
		echo json_encode($result);
	}
	function do_send(){
		$id = !empty($this->input->get("id")) ? $this->input->get("id") : 0;
		$row = $this->db->select("word_id,id,definition")->from("m_words")->where("word_id", $id) ->get()->row();
		$result = false;
		if (!empty($row)){
			$definition = html_entity_decode($row->definition);
			$result = $this->db->where("word_id", $id)->update( "m_words", array("definition" => $definition) );
		}

		echo json_encode($result);
	}
}