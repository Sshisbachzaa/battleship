<?php 
@session_start();
if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'jogador'){
    echo "<script language='javascript'> window.location='./login/index.php' </script>";
}
    

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta property="og:title" content="snookerball" />
	<meta property="og:type" content="" />
	<meta property="og:url" content="https://snookerball.bet/" />
	<meta property="og:image" content="https://snookerball.bet/img/icons/logo-rs.jpg" />
	
    
    
    
    
	<?php
        include 'header.php';
    ?>

<body>
	<div class="wrapper">
		<?php include 'menu.php'; ?>

		<div class="main">
            <?php 
                include 'topo.php'; 
            ?>

			<?php include 'perfil-user.php'; ?>

            <?php include 'footer.php'; ?>
			
		</div>
	</div>

	<script src="js/app.js"></script>

	

</body>

</html>