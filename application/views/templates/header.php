<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>assets/css/design.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>assets/css/style_header.css">
    </head>

    <nav id="nav-principale">
        <div class="navLogo">
            <a style="text-decoration:none;color:rgb(197, 0, 0)">COVITU-19</a>
        </div>
    
        <div class="nav4">
            <a class="textMenu" routerLink="/login" routerLinkActive="active" style="text-decoration:none;color:rgb(197, 0, 0)">Se connecter</a>
        </div>
    </nav>

    <div id="floatMenu">
        <div id="fm1">
            <a href="covid19-dans-le-monde.html" style="color:rgba(255, 255, 255);text-decoration:none;">MONDE</a>
        </div>
        <div id="fm2">
            <a href="covid19-a-madagascar.html" style="color:rgb(255, 255, 255);text-decoration:none;">MADAGASCAR</a>
        </div>
    </div>
</html>
