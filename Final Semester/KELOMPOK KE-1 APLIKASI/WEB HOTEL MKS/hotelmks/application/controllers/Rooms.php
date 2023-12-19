<?php 
class Rooms extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_kamar','m_kamar');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_kamar->get_all_room();
		$this->load->view('frontend/rooms_view',$x);
	}
}