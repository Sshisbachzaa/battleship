<?php 
require_once("./conexao.php");
@session_start();
/*if(@$_SESSION['nivel_usuario'] == null || @$_SESSION['nivel_usuario'] != 'jogador'){
    echo "<script language='javascript'> window.location='../index.php' </script>";
}*/
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//RECUPERAR DADOS DO USUÁRIO
$query = $pdo->query("SELECT * FROM users where id = 1");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$userId = @$res[0]['id'];
$nome_usu = @$res[0]['name'];
$email_usu = @$res[0]['email'];
$saldo = @$res[0]['coins'];
$level_usu = @$res[0]['level'];
$foto_usu = @$res[0]['picture'];
$amigos = @$res[0]['amigos'];
$indicados = @$res[0]['indicados'];



    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "depositar";
    $menu2 = "sacar";
    $menu3 = "transacoes";
    $menu4 = "historico";
    
    if(isset($_POST['depositar10'])){
        echo "deposito 10 pila";
        header("Location: index.php?pag=$pag");
    }

    if(isset($_GET['depositar10'])){
        echo "deposito 10 pila";
        header("Location: index.php?pag=$pag");
    }
  
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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <main class="content" style="background-image: url('img/bg_menu.jpg');">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-12"
                style="margin-botton:15px; margin-top:15px; padding-botton: 10px; text-align:center">
                <div class="small-box" style="background-color: #000;padding: 23px">
                    <img style="width: 73px; height: 73px; margin-top: 20px;" class="card-img-top"
                        src="img/icons/coin.png" alt="Card image cap">
                    <div class="inner">
                        <h3 style="color: #e3e3e3; text-align: center; font-size: 70px; font-weight: 800">10</h3>
                        <h4 style="color: #e3e3e3; text-align: center; font-size: 18px; font-weight: 800">Pacote de 10
                            Moedas</h4></br>
                        <a href="#"><button onclick="doC10()" type="button" class="btn"
                                style="width: 100%; background-color: #B92020; color: #fff "> COMPRAR</button></a>
                        <p style="font-size: 12px;  color: #e3e3e3; margin-top: 15px; text-align: center;">O saldo será
                            adicionado em sua conta no jogo.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-12"
                style="margin-botton:15px; margin-top:15px; padding-botton: 10px; text-align:center">
                <div class="small-box" style="background-color: #000;padding: 23px">
                    <img style="width: 73px; height: 73px; margin-top: 20px;" class="card-img-top"
                        src="img/icons/coin.png" alt="Card image cap">
                    <div class="inner">
                        <h3 style="color: #e3e3e3; text-align: center; font-size: 70px; font-weight: 800">50</h3>
                        <h4 style="color: #e3e3e3; text-align: center; font-size: 18px; font-weight: 800">Pacote de 50
                            Moedas</h4></br>
                        <a href="#"><button onclick="doC50()" type="button" class="btn"
                                style="width: 100%; background-color: #B92020; color: #fff "> COMPRAR</button></a>
                        <p style="font-size: 12px;  color: #e3e3e3; margin-top: 15px; text-align: center;">O saldo será
                            adicionado em sua conta no jogo.</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-12"
                style="margin-botton:15px; margin-top:15px; padding-botton: 10px; text-align:center">
                <div class="small-box" style="background-color: #000 ;padding: 23px">
                    <img style="width: 73px; height: 73px; margin-top: 20px;" class="card-img-top"
                        src="img/icons/coin.png" alt="Card image cap">
                    <div class="inner">
                        <h3 style="color: #e3e3e3; text-align: center; font-size: 70px; font-weight: 800">100</h3>
                        <h4 style="color: #e3e3e3; text-align: center; font-size: 18px; font-weight: 800">Pacote de 100
                            Moedas</h4></br>
                        <a href="#"><button onclick="doC100()" type="button" class="btn"
                                style="width: 100%; background-color: #B92020; color: #fff "> COMPRAR</button></a>
                        <p style="font-size: 12px;  color: #e3e3e3; margin-top: 15px; text-align: center;">O saldo será
                            adicionado em sua conta no jogo.</p>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <div style="margin-top: 30px;">
        <div class="row">
            <div class="col-sm" style="text-align: center; margin-bottom: 10px; margin-top: 10px">
                <img src="img/icons/logo.png" alt="logo" style="width: 120px; height: 60px; ">
            </div>
        </div>

    </div>

</main>





<script>
    function doC10(){
        //console.log("AAAAAAAAAAA")
        var valueToDeposit = 10;
        $.ajax({
                type: "POST",
                url: "deposito/deposito.php",
                data: { depositValue: valueToDeposit },
                success: function(response) {
                    console.log("depositando 10 coins!")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    }

    function doC50(){
        //console.log("AAAAAAAAAAA")
        var valueToDeposit = 50;
        $.ajax({
                type: "POST",
                url: "deposito/deposito.php",
                data: { depositValue: valueToDeposit },
                success: function(response) {
                    console.log("depositando 50 coins!")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    }

    function doC100(){
        //console.log("AAAAAAAAAAA")
        var valueToDeposit = 100;
        $.ajax({
                type: "POST",
                url: "deposito/deposito.php",
                data: { depositValue: valueToDeposit },
                success: function(response) {
                    console.log("depositando 100 coins!!")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
    }
</script>