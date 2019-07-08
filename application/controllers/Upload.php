<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }
        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1000;
                $config['max_width']            = 10024;
                $config['max_height']           = 7068;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload())
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('pages/upload_form', $error);
                }
                else
                {
                        //$file_data = array('upload_data' => $this->upload->data());
                        // $file_data = $this->upload->data();
                        // $data['img'] = base_url().'/uploads/'.$file_data['']; 
                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('pages/upload_success', $data);
                }
        }
}
?>