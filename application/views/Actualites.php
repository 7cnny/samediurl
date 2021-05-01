<?php

?>

<!DOCTYPE html>
<html>
    
    <head>
		<meta charset="utf-8">
		<title>Actualites du Covid19</title>
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
                    <h1>ACTUALITES DU COVID-19</h1>
                </div>

                <div id="descriptionMain">
                    <h2>
                        &emsp;&emsp; Le virus Corona aussi appelé <strong>Covid19</strong> est apparu a <strong>
                        Madagascar</strong> en mois de Mars 2020. Cela fait maintenant plus d'un an que le virus 
                        s'est installé et propagé partout ici a <strong>Madagascar</strong>. Depuis le debut de 
                        l'annee 2021, le nombre de cas <strong>positifs</strong> mais aussi de <strong>deces</strong> 
                        n'a cessé d'augmenter, mais egalement de patients <strong>gueris</strong>. Nous assistons 
                        en ce moment a ce qui semble etre une deuxieme vague de l'epidemie. Voici les chiffres: 
                    </h2>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    </body>

</html>
