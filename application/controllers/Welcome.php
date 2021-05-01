<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	session_start();

	class Welcome extends CI_Controller {

		public function index()
		{	 
			$this->load->model('Fonctions');
			//$data['evolutionPays']=$this->Fonctions->getEvolutionParPays();

			$evolution['nom_pays'] = ["Angleterre","Japon","Suede","Finland","Australie","Zimbabwe"];
			$evolution['positifs'] = [12000,561,5615,515,451,1000];
			$evolution['gueris'] = [12000,561,5615,515,451,1000];
			$evolution['deces'] = [12000,561,5615,515,451,1000];
			$data['evolutionPays'] = $evolution;

			$this->load->view('templates/header');
			$this->load->view('World',$data);
			$this->load->view('templates/footer');
		}	

		public function to_world()
		{	
			$this->load->model('Fonctions');
			//$data['evolutionPays']=$this->Fonctions->getEvolutionParPays();

			$evolution['nom_pays'] = ["Angleterre","Japon","Suede","Finland","Australie","Zimbabwe"];
			$evolution['positifs'] = [12000,561,5615,515,451,1000];
			$evolution['gueris'] = [12000,561,5615,515,451,1000];
			$evolution['deces'] = [12000,561,5615,515,451,1000];
			$data['evolutionPays'] = $evolution;

			$this->load->view('templates/header');
			$this->load->view('World',$data);
			$this->load->view('templates/footer');
		}

		public function to_madagascar()
		{
			$this->load->model('Fonctions');
			//$data['evolutionProvinces']=$this->Fonctions->getEvolutionParProvince("madagascar");

			$evolution['nom_province'] = ["antananarivo","antsiranana","mahajanga","toamasina","fianarantsoa","toliara"];
			$evolution['positifs'] = [12000,561,5615,515,451,1000];
			$evolution['gueris'] = [12000,561,5615,515,451,1000];
			$evolution['deces'] = [12000,561,5615,515,451,1000];
			$data['evolutionProvinces'] = $evolution;

			$this->load->view('templates/header');
			$this->load->view('Madagascar',$data);
			$this->load->view('templates/footer');
		}
	}
?>