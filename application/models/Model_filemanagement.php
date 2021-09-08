<?php

class Model_filemanagement extends CI_Model
{
    public function getFileHistory()
	{
		return $this->db->get('file_history')->result_array();
	}

    public function fileInsert($data)
    {
        $this->db->insert('file_history',$data);
    }

    public function fileDelete($file)
    {
        if($file) {
            $data = array('status' => '0');
            $this->db->where('file_name', $file);
            $update = $this->db->update('file_history',$data);
            return ($update == true) ? true : false;
        }
    }

}