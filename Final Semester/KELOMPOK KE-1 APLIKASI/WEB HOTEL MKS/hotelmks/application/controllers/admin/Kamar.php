<?php
class Kamar extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_kamar','m_kamar');
		
	}
	function index(){
		$x['kamar']=$this->m_kamar->get_all_room();
		$this->load->view('backend/v_kamar',$x);
	}

	function add_new(){
		$x['type']=$this->m_kamar->get_room_type();
		$this->load->view('backend/v_add_room',$x);
	}

	function get_edit(){
		$kode=$this->uri->segment(4);
		$x['record']=$this->m_kamar->get_room_by_kode($kode);
		$x['type']=$this->m_kamar->get_room_type();
		$this->load->view('backend/v_edit_room',$x);
	}

	function simpan_room(){
		$data = array();
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('userfile')) {
		    $error = array('error' => $this->upload->display_errors());
		}else{
		    $fileData = $this->upload->data();
		    $data['userfile'] = $fileData['file_name'];
		}

		if (!$this->upload->do_upload('userfile2')) {
		    $error = array('error' => $this->upload->display_errors()); 
		}else{
		    $fileData = $this->upload->data();
		    $data['userfile2'] = $fileData['file_name'];
		}

		$img_large=$data['userfile'];
		$img_thumb=$data['userfile2'];
		$deskripsi=$this->input->post('xdeskripsi');
		$room_type=strip_tags($this->input->post('xtype'));
		$room_rate=strip_tags($this->input->post('xrate'));

		$this->m_kamar->simpan_room($room_type,$img_large,$img_thumb,$deskripsi,$room_rate);
	    redirect('admin/kamar');
	}

	function update_room(){
		$data = array();
		$config['upload_path'] = './assets/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->load->library('upload', $config);

	    if(!empty($_FILES['userfile']['name']) && !empty($_FILES['userfile2']['name'])){
		    
		    if (!$this->upload->do_upload('userfile')) { //upload image 1
			    $error = array('error' => $this->upload->display_errors());
			}else{
			    $fileData = $this->upload->data();
			    $data['userfile'] = $fileData['file_name'];
			    
			}

			if (!$this->upload->do_upload('userfile2')) { //upload image 2
			    $error = array('error' => $this->upload->display_errors()); 
			}else{
			    $fileData = $this->upload->data();
			    $data['userfile2'] = $fileData['file_name'];
			}

			$img_large=$data['userfile'];
			$img_thumb=$data['userfile2'];
			$kode=$this->input->post('xkode');
			$deskripsi=$this->input->post('xdeskripsi');
			$room_type=strip_tags($this->input->post('xtype'));
			$room_rate=strip_tags($this->input->post('xrate'));

			$this->m_kamar->update_room($kode,$room_type,$img_large,$img_thumb,$deskripsi,$room_rate);
		    redirect('admin/kamar');

	    }elseif (!empty($_FILES['userfile']['name']) || !empty($_FILES['userfile2']['name'])) {

	    	if(!empty($_FILES['userfile']['name'])){
	    		if (!$this->upload->do_upload('userfile')) { //upload image 1
			    $error = array('error' => $this->upload->display_errors());
				}else{
				    $fileData = $this->upload->data();
				    $data['userfile'] = $fileData['file_name'];
				    
				}
				$img_large=$data['userfile'];
				$kode=$this->input->post('xkode');
				$deskripsi=$this->input->post('xdeskripsi');
				$room_type=strip_tags($this->input->post('xtype'));
				$room_rate=strip_tags($this->input->post('xrate'));

				$this->m_kamar->update_room_img_large($kode,$room_type,$img_large,$deskripsi,$room_rate);
			    redirect('admin/kamar');
	    	}else{
	    		if (!$this->upload->do_upload('userfile2')) { //upload image 2
			    $error = array('error' => $this->upload->display_errors()); 
				}else{
				    $fileData = $this->upload->data();
				    $data['userfile2'] = $fileData['file_name'];
				}
				$img_thumb=$data['userfile2'];
				$kode=$this->input->post('xkode');
				$deskripsi=$this->input->post('xdeskripsi');
				$room_type=strip_tags($this->input->post('xtype'));
				$room_rate=strip_tags($this->input->post('xrate'));

				$this->m_kamar->update_room_img_thumb($kode,$room_type,$img_thumb,$deskripsi,$room_rate);
			    redirect('admin/kamar');
	    	}
	    
	    }else{
	    	$kode=$this->input->post('xkode');
			$deskripsi=$this->input->post('xdeskripsi');
			$room_type=strip_tags($this->input->post('xtype'));
			$room_rate=strip_tags($this->input->post('xrate'));

			$this->m_kamar->update_room_no_img($kode,$room_type,$deskripsi,$room_rate);
			redirect('admin/kamar');
	    }

	    
	}

	function hapus_room(){
		$kode=$this->input->post('kode');
		$this->m_kamar->hapus_room($kode);
		redirect('admin/kamar');
	}

	

}