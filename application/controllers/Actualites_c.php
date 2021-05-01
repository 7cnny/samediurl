<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	session_start();

	class Actualites_c extends CI_Controller {

		public function details_actu()
		{	 
            $data['id_actu'] = $_GET['id_actu'];

            $this->load->view('templates/header');
			$this->load->view('Actualites',$data);
            $this->load->view('templates/footer');
		}	
    }
?>