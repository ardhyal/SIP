<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	/*
	 * ***************************************************************
	 * Script :
	 * Version :
	 * Date :
	 * Author : ardhyal
	 * Email : ardialhadi@gmail.com
	 * Description :
	 * ***************************************************************
	 */

	/**
	 * Description of Dashboard
	 *
	 * @author ardhyal
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dataform_model');
		$this->load->library(array('form_validation','PHPExcel'));
                
	}

	function index()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$data['active']     = "Video";
			$this->load->view('/admin/header', $data);
			$this->load->view('/admin/video', $data);
			$this->load->view('/admin/footer');
		}
		else
		{
			redirect(site_url('login/index'), 'refresh');
		}
	}
        
        function addvideo(){
//            if (isset($video) && $video != " "){
                $date = date("ymd");
                $config['upload_path']      = './assets/video';
                $config['max_size']         = '500000';
//                $config['allowed_types']    = 'avi|flv|wmv|mp3|mp4|mkv';
                $config['allowed_types']    = '*';
                $config['overwrite']        = FALSE;
                $config['remove_spaces']    = TRUE;
//                $config['filename']         = $date.$video;
                
                $this->load->library('upload', $config);
//                echo "video";
//            print_r($config);
//            die();
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('video')){
                    echo $this->upload->display_errors();
                }else{
//                    $data['video_name']     = $config['filename'];
                    $data['video_detail']   = $this->upload->data();
                    redirect(site_url('video/index'), 'refresh');
                }
//            }else{
//                echo "Please select a file !!!";
//            }
        }
        
        
}

