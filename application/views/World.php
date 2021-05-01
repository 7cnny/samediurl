<?php

?>

<!DOCTYPE html>
<html>
    
    <head>
		<meta charset="utf-8">
		<title>Covid19 dans les autres pays du monde</title>
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
                    <h1>COVID-19 DANS LE MONDE</h1>
                </div>

                <div id="descriptionMain">
                    <h2>
                        &emsp;&emsp; Le virus Corona aussi appelé <strong>Covid19</strong> est un virus
                        apparu pour la premiere en Decembre 2019 dans la ville de Wuhan en Chine. En 2020
                        le virus a commencé a se propager dans tout les <strong>pays</strong> du <strong>monde</strong>.
                        Vers la fin de l'année 2020 elle semblait diminuer et les nombres de patients <strong>gueris</strong>
                        augmentaient mais en debut de cette nouvelle année, les nouveaux cas <strong>positifs</strong> 
                        de <strong>Covid19</strong> et de <strong>deces</strong> ont augmenté en fleche partout dans le <strong>
                        monde</strong> annoncant ce qui semble etre une deuxieme vague de l'epidemie, bien plus 
                        inquietante que la premiere. Voici les chiffres de son evolution:
                    <h2>
                </div>

                <div>
                    <table>
                        <tr>
                            <th scope="col">PAYS</th>
                            <th scope="col">POSITIFS</th>
                            <th scope="col">GUERIS</th>
                            <th scope="col">DECES</th>
                        </tr>
                    <?php 
                        for($i=0;$i<sizeof($evolutionPays);$i++) { 
                    ?>
                        <tr>
                            <td scope="col" > 
                                <h3> <a class="ph3"> <?php echo ucwords($evolutionPays['nom_pays'][$i]) ?> </a> </h3> 
                            </th>
                            <td scope="col"> <?php echo $evolutionPays['positifs'][$i] ?> </th>
                            <td scope="col"> <?php echo $evolutionPays['gueris'][$i] ?> </th>
                            <td class="td-last" scope="col"> <?php echo $evolutionPays['deces'][$i] ?> </th>
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
