<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
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
$query->bindValue(":id", $_SESSION['id_usuario']);
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$userId = @$res[0]['id'];
$nome_usu = @$res[0]['name'];
$email_usu = @$res[0]['email'];
$saldo = @$res[0]['coins'];
$level_usu = @$res[0]['level'];
$foto_usu = @$res[0]['picture'];
$vitoria = @$res[0]['vitoria'];
$derrota = @$res[0]['derrota'];



    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "depositar";
    $menu2 = "sacar";
    $menu3 = "transacoes";
    $menu4 = "historico";
  
  
    if (isset($_GET['funcao']) && $_GET['funcao'] === 'excluir' && isset($_GET['id'])) {
        $idExclusao = $_GET['id'];
    
        // Execute a query de exclusão aqui
        $queryExclusao = $pdo->prepare("DELETE FROM deposito WHERE id = :id");
        $queryExclusao->bindValue(":id", $idExclusao);
        
        if ($queryExclusao->execute()) {
            echo "Registro excluído com sucesso!";
            // Redirecionar para a página de listagem após a exclusão
            header("Location: index.php?pag=$pag");
            exit;
        } else {
            echo "Erro ao excluir o registro.";
        }
    }
    

?>

<main class="content" style="background-image: url('img/bg_menu.jpg');">
<div class="container-fluid" >

            <div class="row">

                <div class="col-lg-3 col-12" style="margin-botton:20px; margin-top:20px;">
                    <div class="small-box" style="background-color: #000;padding: 23px">
                        <div class="inner">
                            <p style="color: #e3e3e3">Vitória</p>
                            <h1 style="color: #e3e3e3"><?php echo $vitoria; ?></h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: #e3e3e3">Mais detalhes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12" style="margin-top:20px">
                    <div class="small-box>" style="background-color: #000;padding: 20px">
                        <div class="inner">
                            <h3></h3>
                            <p style="color: #e3e3e3">Derrota</p>
                            <h1 style="color: #e3e3e3; "><?php echo $derrota ?></h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: #e3e3e3">Mais detalhes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12" style="margin-top:20px">
                    <div class="small-box" style="background-color: #000;padding: 20px">
                        <div class="inner">
                            <h3></h3>
                            <p style="color: #e3e3e3">Saldo</p>
                            <h1 style="color: #e3e3e3"><?php echo $saldo; ?></h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: #e3e3e3">Mais detalhes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-12" style="margin-top:20px">
                    <div class="small-box" style="background-color: #000;padding: 20px">
                        <div class="inner">
                            <h3></h3>
                            <p style="color: #e3e3e3">Disponivel para saque</p>
                            <h1 style="color: #e3e3e3"><?php echo $saldo; ?></h1>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: #e3e3e3">Mais detalhes <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                <!-- </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger bg-danger shadow h-100 py-2">
                        <div class="card-body bg-dark">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Dados</div>
                                    
                                    <div class="sidebar-heading">
                                        <?php echo $userId; ?>
                                    </div>
                                    <div class="sidebar-heading">
                                        <?php echo $nome_usu; ?>
                                    </div>
                                    <div class="sidebar-heading">
                                        //<?php echo $email_usu; ?>
                                    </div>

                                    <div class="h5 mb-0 font-weight-bold text-white-800"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

        
		
    </div>
    
     <div style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm" style="text-align: center; margin-bottom: 10px; margin-top: 10px">
                <img src="img/icons/logo.png" alt="logo" style="width: 120px; height: 60px; ">
            </div>
        </div>

    </div>
</main>
    
</body>
</html>