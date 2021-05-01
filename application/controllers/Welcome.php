<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	session_start();

	class Welcome extends CI_Controller {

		public function index()
		{	 
			$this->load->model('Fonctions');
			$data['evolutionPays']=$this->Fonctions->getEvolutionParPays();

			$this->load->view('templates/header');
			$this->load->view('World',$data);
			$this->load->view('templates/footer');
		}	

		public function to_world()
		{	
			$this->load->model('Fonctions');
			$data['evolutionPays']=$this->Fonctions->getEvolutionParPays();

			$this->load->view('templates/header');
			$this->load->view('World',$data);
			$this->load->view('templates/footer');
		}

		public function to_madagascar()
		{
			$this->load->model('Fonctions');
			$data['evolutionProvinces']=$this->Fonctions->getEvolutionParProvince("madagascar");

			$this->load->view('templates/header');
			$this->load->view('Madagascar',$data);
			$this->load->view('templates/footer');
		}
	}
?>
