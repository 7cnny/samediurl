<?php
    $province = $_GET['province'];
?>

<!DOCTYPE html>
<html>
    
    <head>
		<meta charset="utf-8">
		<title></title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>assets/css/design.css">
    </head>

    <body>
        <br>
        
        <div id="main-content">

            <div id="actualites">
                <div class="hActus">ACTUALITES</div>
                <?php for($a=0 ; $a<4 ;$a++){ ?>
                <div id="SingleActu">           
                    <div class="nomOffre"> L'Inde en crise sanitaire ! </div>
                    <div class="valeurOffre">La situation sanitaire en Inde se degrade de plus en plus</div>
                </div>
                <?php } ?>
            </div>

            <div id="tabListe"> 
                <div id="titreMain"> 
                    <h1>STATISTIQUES COVID-19 DANS LA PROVINCE <?php echo strtoupper($province) ?></h1>
                </div>

                <div id="descriptionMain">
                    &emsp;&emsp; Le virus Corona aussi appelé Covid-19 est apparu a Madagascar en mois de Mars 2020.
                    Cela fait maintenant plus d'un an que le virus s'est installé et propagé partout ici 
                    a Madagascar. Depuis le debut de l'annee 2021, le nombre de cas positif n'a cessé d'
                    augmenter, contrairement a l'année derniere. Nous assistons en ce moment a ce qui semble 
                    etre une deuxieme vague de l'epidemie. Voici les chiffres: 
                </div>

                <div>
                    <table>
                        <tr>
                            <th scope="col">PROVINCE</th>
                            <th scope="col">POSITIFS</th>
                            <th scope="col">GUERIS</th>
                            <th scope="col">DECES</th>
                        </tr>
                    <?php 
                        for($i=0;$i<5;$i++) { 
                    ?>
                        <tr>
                            <td scope="col" > 
                                <h3> <a class="ph3" href="madagascar-province-<?php echo $province ?>.html"> <?php echo ucwords($province) ?></a> </h3> 
                            </th>
                            <td scope="col">9000</th>
                            <td scope="col">100</th>
                            <td class="td-last" scope="col">50</th>
                        </tr>
                    <?php 
                        }
                    ?>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">TOTAL</th> 
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>

