<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Fonctions extends CI_Model
    {
        public function getEvolutionParPays(){

            $sql = "SELECT  * FROM evolutions_pays ORDER BY nom_pays";
            $query = $this->db->query($sql);
            $evolution = array();
            $i = 0;

            foreach($query->result_array() as $row)
            {   
                $evolution[$i]['nom_pays']=$row['nom_pays'];
                $evolution[$i]['positifs']=$row['positifs'];
                $evolution[$i]['gueris']=$row['gueris'];
                $evolution[$i]['deces']=$row['deces'];
                $i++;
            }

            return $evolution;
        }

        public function getEvolutionParProvince($pays){

            $sql = "SELECT * FROM evolutions_provinces WHERE nom_pays = '".$pays."' ORDER BY nom_pays";
            $query = $this->db->query($sql);
            $evolution = array();
            $i = 0;

            foreach($query->result_array() as $row)
            {   
                $evolution[$i]['nom_province']=$row['nom_province'];
                $evolution[$i]['positifs']=$row['positifs'];
                $evolution[$i]['gueris']=$row['gueris'];
                $evolution[$i]['deces']=$row['deces'];
                $i++;
            }

            return $evolution;
        }



        public function getCommande($ref){

            $sql = "select produit.designation,produit.type,commande.quantite,produit.prixUnitaire,commande.remise from commande,produit where commande.idproduit=produit.idproduit and reference = '".$ref."'";
            $query = $this->db->query($sql);
            $commande = array();
            $i = 0;

            foreach($query->result_array() as $row)
            {   
                $commande[$i]['designation']=$row['designation'];
                $commande[$i]['type']=$row['type'];
                $commande[$i]['quantite']=$row['quantite'];
                $commande[$i]['prixUnitaire']=$row['prixUnitaire'];
                $commande[$i]['remise']=$row['remise'];
                $commande[$i]['montant'] = $this->Fonctions->montant($commande[$i]['quantite'],$commande[$i]['prixUnitaire'],$commande[$i]['remise']);
                $i++;
            }

            return $commande;
        }

        public function getBonDeSortie($ref){

            $sql = "select produit.designation,produit.type,commande.quantite from commande,produit where commande.idproduit=produit.idproduit and reference = '".$ref."'";
            $query = $this->db->query($sql);
            $commande = array();
            $i = 0;

            foreach($query->result_array() as $row)
            {   
                $commande[$i]['designation']=$row['designation'];
                $commande[$i]['type']=$row['type'];
                $commande[$i]['quantite']=$row['quantite'];
                $i++;
            }

            return $commande;
        }

        public function get_session()
        {
            $sql = "Select max(numero)as numero from commande";
            $query = $this->db->query($sql);
            $num = null;
            foreach($query->result_array() as $row)
            {
                $num = $row['numero'];
            }

            return $num;
        }

        public function sommeMontant($montant)
        {
            $total=0;
            for($i=0;$i<sizeof($montant);$i++)
            {
                $total=$total+$montant[$i];
            }
            return $total; 
        }

        public function tva($totalHT)
        {
            $tva = 20;
            $reponse = ($totalHT * $tva) / 100 ; 
            return $reponse;
        }
    }
    /*  
        public function montant($quantite,$PU,$reduction)
        {
            $montant=0;
            $reduc=100-$reduction;
            $montant=($PU*$reduc)/100;
            $montant=$montant*$quantite;
            return $montant;
        }

        public function passer_commande($idproduit,$quantite,$unite,$remise,$ref)
        {
            $four = "1";
            $numero = $_SESSION['numero'];
            //var_dump($numero);
            
            $sq1="insert into commande(idfournisseur,idproduit,quantite,unite,remise,numero,datecommande,reference) 
            values('".$four."',".$idproduit.",".$quantite.",'".$unite."',".$remise.",".$numero.",now(),'".$ref."')";
            $this->db->query($sq1);
        }

        public function getCommandesClient(){

            $numero = $_SESSION['numero'];

            $sq2="select produit.designation,produit.type,commande.quantite,produit.prixUnitaire,((produit.prixUnitaire*((100-remise)/100))
            *commande.quantite)as montant,commande.remise from commande,produit where commande.idproduit=produit.idproduit and numero = ".$numero;
            //echo($sq2);

            $query1=$this->db->query($sq2);
            $commande=array();
            $i=0;
            foreach($query1->result_array() as $row)
            {   
                $commande[$i]['designation']=$row['designation'];
                $commande[$i]['type']=$row['type'];
                $commande[$i]['quantite']=$row['quantite'];
                $commande[$i]['prixUnitaire']=$row['prixUnitaire'];
                $commande[$i]['montant']=$row['montant'];
                $commande[$i]['remise']=$row['remise'];
                $i++;
            }
            
            return $commande;
        }

        public function addEvent($equ,$eve,$min){

            $id = 3000;
            $ins1 = "INSERT INTO Evenement VALUES($id,'".$equ."','".$eve."','".$min."')";
            $this->db->query($ins1);
        }

        public function getEvent($equipe,$min){

            $id = 3000;
            $stats1 = array();
            $events = array('But','Tir','Penalty','Touche','Faute','Carton Jaune','Carton Rouge');
            $indEv = 0;
            $indSt = 0;

            for($indSt = 0 ; $indSt<7 ; $indSt++ , $indEv++) {

                $stat1 = "SELECT * FROM 
                        (SELECT *,Count(Evenement) as Nombre FROM EventGroupe WHERE minute<=".$min." GROUP BY Evenement,Equipe) as EveCount
                        WHERE idMatch=$id AND Evenement='".$events[$indEv]."' AND Equipe='".$equipe."'";

                $query1 = $this->db->query($stat1);
                $row = $query1->row_array();
                $stats1[$indSt]=($row['Nombre']-1);
            }

            return $stats1;
        }

        public function getPourcentage($stats1,$stats2){

            $pourc = array();
            $p = 0;
            $s = 0;

            while($s < 7){

                $somme = $stats1[$s]+$stats2[$s];

                if($somme==0){
                    $somme=1;
                }

                $pourc[$p] = $stats1[$s] * 100 / $somme;
                $pourc[$p+1] = $stats2[$s] * 100 / $somme;

                $s++;
                $p=$p+2;
            }

            return $pourc;
        }
    }
    */


    /*
        public function voter($pro,$can,$nvo)
        {
            $ins0="INSERT INTO Vote VALUES('".$can."','".$can."',".$nvo.")";
            echo($ins0);
            
            $this->db->query($ins0);
            
            $sommeP="SELECT Candidat,Vote,SUM(Vote) as somme FROM VoteTrie WHERE Province='".$pro."' GROUP BY Candidat ORDER BY Candidat";
            $query1=$this->db->query($sommeP);
            $row=$query1->row_array();
            $rep1=array();
            $i=0;
            $j=0;
            $somme=0;
            foreach($query1->result_array() as $row)
            {   
                $rep1[$i]=$row['Vote'];
                $somme=$row['sommme'];
                $i++;
            }
            //Rajao Rajoe Rava Tab

            $p1=($rep[0]*100)/$somme;
            $p2=($rep[1]*100)/$somme;
            $p3=($rep[2]*100)/$somme;
            $p4=($rep[3]*100)/$somme;

            $up1="UPDATE Pourcentage SET Rajaonary=".$p1." WHERE Province='".$pro."'";
            $up2="UPDATE Pourcentage SET Rajoelina=".$p1." WHERE Province='".$pro."'";
            $up3="UPDATE Pourcentage SET Ravalomanana=".$p1." WHERE Province='".$pro."'";
            $up4="UPDATE Pourcentage SET Tabera=".$p1." WHERE Province='".$pro."'";
            $this->db->query($up1);
            $this->db->query($up2);
            $this->db->query($up3);
            $this->db->query($up4);

            $retour=array();

            $final="SELECT * FROM Pourcentage";
            $query2=$this->db->query($final);
            $row=$query2->row_array();
            $a=0;
            $b=0;
            foreach($query2->result_array() as $row)
            {   
                $retour[$a]=array();
                $retour[$a][$b]=$row['Province'];
                $retour[$a][$b+1]=$row['Rajaonary'];
                $retour[$a][$b+2]=$row['Rajoelina'];
                $retour[$a][$b+3]=$row['Ravalomanana'];
                $retour[$a][$b+4]=$row['Tabera'];
                $a++;
            }

            return retour;
            
        }*/
?>