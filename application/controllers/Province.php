<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	session_start();

	class Province extends CI_Controller {

		public function province_info()
		{	 
            $data['province'] = $_GET['province'];

            $this->load->view('templates/header');
			$this->load->view('Province',$data);
            $this->load->view('templates/footer');
		}	
    }
?>