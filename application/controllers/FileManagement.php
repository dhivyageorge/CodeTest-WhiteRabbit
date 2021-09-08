<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FileManagement extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();

		$this->data['page_title'] = 'Product Type';
		$this->load->model('Model_filemanagement', 'uploadModel');
		$this->load->library('pagination');
        $this->load->helper('directory');
        $this->load->helper("file");
	}

    public function index($page = 0)
	{
        $countFile = 0;
        $files = directory_map('upload/', 1);
        $countFile = count($files);
        
        //Pagination
		$limit = 1;
		$page = $page && $page > 0 ? $page : 1;
		$this->data['files'] = [];

		$config['base_url'] = base_url() . 'index/';
		$config['total_rows'] = $countFile;
		$config['per_page'] = $limit;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 3;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="javascript:void(0)"><b>';
		$config['cur_tag_close'] = '</b></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');
		$this->pagination->initialize($config);	

        
        $this->data['files'] = $files;
        $this->data['links'] = $this->pagination->create_links();
        // $this->render_template('index', $this->data);
        $this->load->view('index', $this->data);
    }

    public function uploadFile()
    {
        $this->load->view('uploadFile', array('error' => ' ' ));
    }

    public function insertFile()
    {
        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "txt|doc|docx|png|jpeg|jpg|gif|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000",
            'max_height' => "768",
            'max_width' => "1024"
            );
            
            
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        if($this->upload->do_upload())
        { 
            $data = array('upload_data' => $this->upload->data());
    
            $file_name =  $data['upload_data']['raw_name'].$data['upload_data']['file_ext'];
    
                $insert_data = array(
                                'file_name' => $file_name,
                                'created_at' => date('Y-m-d H:i:s'),
                                'status' => '1'
                                );
                $this->uploadModel->fileInsert($insert_data);
                redirect('FileManagement', 'refresh');
        }
        else
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('uploadFile', $error);
        }
    }

    public function history()
    {
        $fileHistory = $this->uploadModel->getFileHistory();
        $this->data['fileHistory'] = $fileHistory;
        $this->load->view('history', $this->data);
    }

    public function deleteFile($file)
    {
        unlink('upload/'.$file);
        $this->uploadModel->fileDelete($file);
        redirect('FileManagement', 'refresh');
    }
}