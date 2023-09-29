<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
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

    <nav class="navbar navbar-expand" style="background-color: #000;">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                
                  <button type="button" class="btn-deposito btn-lg btn-block;" style=" text-align: center; background-color: #0000ff; color: #ffff; border: none; width: 100px; height:40px; font-size:15px">DEPOSITAR</button>
                  <button onclick="window.location.href = './game/index.html';" type="button" class="btn-deposito btn-lg btn-block;" style=" text-align: center; background-color: #0000ff; color: #ffff; border: none; width: 100px; height:40px; font-size:15px">JOGAR</button>
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"
                        style="color: #B92020;">
                        <img src=<?php echo $picture; ?> class="avatar img-fluid rounded me-1" alt="" /> <span style="color:#ffff"><?php echo $nome_usu ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a style="color #ffff" class="dropdown-item" href="pages-Profile.html"><i
                                class="align-middle me-1" data-feather="user"></i> Perfil</a>

                        <div class="dropdown-divider"></div>
                        <a style="color:  #B92020" class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>