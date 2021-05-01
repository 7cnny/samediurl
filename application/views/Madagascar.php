<?php
    $province = ["antananarivo","antsiranana","mahajanga","toamasina","fianarantsoa","toliara"];
?>

<!DOCTYPE html>
<html>
    
    <head>
		<meta charset="utf-8">
		<title>Covid19 dans les provinces de Madagascar</title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>assets/css/design.css">
    </head>

    <body>
        <br>
        
        <div id="main-content">

            <div id="actualites">
                <div class="hActus">ACTUALITES</div>
                <?php for($a=0 ; $a<4 ;$a++){ ?>
                <a href="covid19-actualite-<?php echo $a ?>.html" style="text-decoration:none;color:black">
                    <div id="SingleActu">           
                        <div class="nomOffre"> L'Inde en crise sanitaire ! </div>
                        <div class="valeurOffre">La situation sanitaire en Inde se degrade de plus en plus</div>
                    </div>
                </a>
                <?php } ?>
            </div>

            <div id="tabListe"> 
                <div id="titreMain"> 
                    <h1>COVID-19 A MADAGASCAR</h1>
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
                    <table>
                        <tr>
                            <th scope="col">PROVINCE</th>
                            <th scope="col">POSITIFS</th>
                            <th scope="col">GUERIS</th>
                            <th scope="col">DECES</th>
                        </tr>
                    <?php 
                        for($i=0;$i<sizeof($evolutionProvinces);$i++) { 
                    ?>
                        <tr>
                            <td scope="col" > 
                                <h3> <a class="ph3" href="madagascar-province-<?php echo $evolutionProvinces[$i]['nom_province'] ?>.html"> <?php echo ucwords($province[$i]) ?></a> </h3> 
                            </th>
                            <td scope="col"> <?php echo $evolutionProvinces[$i]['positifs'] ?> </th>
                            <td scope="col"> <?php echo $evolutionProvinces[$i]['gueris'] ?> </th>
                            <td class="td-last" scope="col"> <?php echo $evolutionProvinces[$i]['deces'] ?> </th>
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
