<?php
class Facility extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_facility','m_facility');
		$this->load->model('M_pengunjung','m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}

	function index(){
		$x['data']=$this->m_facility->get_all_falilitas();
		$this->load->view('frontend/facility_view',$x);
	}
}