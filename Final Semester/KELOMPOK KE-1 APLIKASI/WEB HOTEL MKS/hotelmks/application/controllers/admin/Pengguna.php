<?php
class Pengguna extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('M_pengguna','m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->session->userdata('idadmin');
			$x['user']=$this->m_pengguna->get_pengguna_login($kode);
			$x['data2']=$this->m_pengguna->get_all_pengguna();
			$this->load->view('backend/v_pengguna',$x);
		}else{
            redirect('administrator');
        }
	}

	function simpan_pengguna(){
		if($this->session->userdata('akses')=='1'){
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                        $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                        $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                        $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                            $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                            $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                            $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                            $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);
     						if ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/pengguna');
     						}else{
	               				$this->m_pengguna->simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','success');
	               				redirect('admin/pengguna');
	               				
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pengguna');
	                }
	                 
	            }else{
	            	$nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);
	            	if ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_pengguna->simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','success');
	               		redirect('admin/pengguna');
	               	}
	            } 

	    }else{
            redirect('administrator');
        }

	}

	function update_pengguna(){
		if($this->session->userdata('akses')=='1'){
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 300;
	                        $config['height']= 300;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
	                        $nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                		$jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                		$username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                		$password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    		$konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    		$email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    		$nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    		$level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);

                            if (empty($password) && empty($konfirm_password)) {
                            	$this->m_pengguna->update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/pengguna');
     						}elseif ($password <> $konfirm_password) {
     							echo $this->session->set_flashdata('msg','error');
	               				redirect('admin/pengguna');
     						}else{
	               				$this->m_pengguna->update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level);
	                    		echo $this->session->set_flashdata('msg','info');
	               				redirect('admin/pengguna');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/pengguna');
	                }
	                
	            }else{
	            	$kode=htmlspecialchars($this->input->post('kode'),ENT_QUOTES);
	            	$nama=htmlspecialchars($this->input->post('xnama'),ENT_QUOTES);
	                $jenkel=htmlspecialchars($this->input->post('xjenkel'),ENT_QUOTES);
	                $username=htmlspecialchars($this->input->post('xusername'),ENT_QUOTES);
	                $password=htmlspecialchars($this->input->post('xpassword'),ENT_QUOTES);
                    $konfirm_password=htmlspecialchars($this->input->post('xpassword2'),ENT_QUOTES);
                    $email=htmlspecialchars($this->input->post('xemail'),ENT_QUOTES);
                    $nohp=htmlspecialchars($this->input->post('xkontak'),ENT_QUOTES);
                    $level=htmlspecialchars($this->input->post('xlevel'),ENT_QUOTES);

	            	if (empty($password) && empty($konfirm_password)) {
                       	$this->m_pengguna->update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','info');
	               		redirect('admin/pengguna');
     				}elseif ($password <> $konfirm_password) {
     					echo $this->session->set_flashdata('msg','error');
	               		redirect('admin/pengguna');
     				}else{
	               		$this->m_pengguna->update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level);
	                    echo $this->session->set_flashdata('msg','warning');
	               		redirect('admin/pengguna');
	               	}
	            } 
	    }else{
            redirect('administrator');
        }

	}

	function hapus_pengguna(){
		if($this->session->userdata('akses')=='1'){
			$kode=$this->input->post('kode');
			$this->m_pengguna->hapus_pengguna($kode);
		    echo $this->session->set_flashdata('msg','success-hapus');
		    redirect('admin/pengguna');
	    }else{
            redirect('administrator');
        }
	}

	function reset_password(){
   		if($this->session->userdata('akses')=='1'){
	        $id=$this->uri->segment(4);
	        $get=$this->m_pengguna->getusername($id);
	        if($get->num_rows()>0){
	            $a=$get->row_array();
	            $b=$a['pengguna_username'];
	        }
	        $pass=rand(123456,999999);
	        $this->m_pengguna->reset_password($id,$pass);
	        echo $this->session->set_flashdata('msg','show-modal');
	        echo $this->session->set_flashdata('uname',$b);
	        echo $this->session->set_flashdata('upass',$pass);
		    redirect('admin/pengguna');
   		}else{
            redirect('administrator');
        }
    }


}