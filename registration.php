<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="#"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
<?php
    require('db.php');
	require('../conexao.php');
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
	$reflink = "";
    // When form submitted, insert values into the database.
    if(isset($_REQUEST['ref'])){
        $reflink = $_REQUEST['ref'];
    }
    // When form submitted, check and create user session.
    if (isset($_GET['email']) && isset($_GET['username']) && isset($_GET['password'])) {
        $username = stripslashes($_REQUEST['email']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database

		$data = [
			'name' => $_GET['username'],
			'email' => $_GET['email'],
			'password' => md5($_GET['password']),
		];

        $query    = "INSERT INTO `users` (name,email,password) VALUES (:name,:email,:password)";
        $stmt= $pdo->prepare($query);
		$stmt->execute($data);
        if ($stmt == 1) {
			$query1 = $pdo->query("SELECT * FROM users where email = '$username'");
			//$query1->bindValue(":email", $username);
			$res = $query1->fetchAll(PDO::FETCH_ASSOC);
			$_SESSION['id_usuario'] = @$res[0]['id'];
            $_SESSION['email'] = @$res[0]['email'];
			$_SESSION['nivel_usuario'] = "jogador";
            // Redirect to user dashboard page
			echo "reflink: ";
			echo $reflink;
            //header("Location: ../index.php");
        } else {
            echo "<div class='form'>
                  <h3>Complete os campos.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
	}
?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26" style="color: #ffff">
						Registre-se
					</span>
					<span class="login100-form-title p-b-48">
						<img src="./images/logo.png" style="width: 250px;">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Digite seu nome de usuário"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Digite seu email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Digite sua senha"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Confirme a senha"></span>
					</div>

					<div class="container-login100-form-btn">
						
							<button onclick="indication()" class="	btn" style="width: 100%; background-color: #B92020; color: #ffff">
								<b>Entrar</b>
							</button>
	
					</div>

					<div class="text-center p-t-115">
						<span class="txt1" style="color: #ffff">
							Já tem conta? <br><br>
						</span>
						

						<a class="txt2" href="index.php">
							<b style="color: #ffff">Login</b>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<script>
    function indication(){
        //console.log("AAAAAAAAAAA")
        var valueToDeposit = 10;
        $.ajax({
                type: "POST",
                url: "indication/indication.php?ref='$'",
                data: { depositValue: valueToDeposit },
                success: function(response) {
                    console.log("depositando 10 coins!")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    }
</script>