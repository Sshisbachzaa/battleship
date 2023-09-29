<?php 
require_once("./conexao.php");
@session_start();
/*if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'jogador'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}*/
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * FROM users where id = '$_SESSION[id_usuario]'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$userId = @$res[0]['id'];
$nome_usu = @$res[0]['name'];
$picture= @$res[0]['picture'];

if(empty($picture)){
	$picture = "https://snookerball.bet/imagens/default_user.png";#https://lh3.googleusercontent.com/a/AAcHTtcrluTk3kUPvLqtSQCIrZELUdBjWL_zHV-5d-3Gr_0P=s96-c
}

?>

<nav class="navbar navbar-expand" style="background-color: #000">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

						<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown" style="color: #B92020;">
                            <img src=<?php echo $picture; ?> class="avatar img-fluid rounded me-1" alt="" /> <span style="color:#ffff"><?php echo $nome_usu ?></span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a style="color #ffff" class="dropdown-item" href="profile.php"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
								
								<div class="dropdown-divider"></div>
								<a style="color: ffff" class="dropdown-item" href="logout.php">Sair</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>