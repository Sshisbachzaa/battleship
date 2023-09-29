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
$saldo = @$res[0]['coins'];
    

?>

            <main class="content" style="background-image: url('img/bg_menu.jpg'); ">
                <div class="container"  >

               
                    <div class="container">
                    <div class="card" style="background-color: #000">
            <div class="container">
                <div class="row" style="text-align: center">
                    <div class="col-lg-4 col-12" style="">
                        <img src="img/icons/coin.png" alt="coin" style="width: 70px; height: 70px;  margin-bottom: 10px; margin-top: 15px">
                    </div>
                    <div class="col-lg-3 col-12" style=" margin-bottom: 10px; margin-top: 40px; ">
                       
                        <h5 style="color: #ffff; font-size: 18px; text-align: center">SALDO:</h5>
                    </div>
                    <div class="col-lg-3 col-12" style="margin-bottom: 10px; margin-top: 40px">
                    <h5 style="color: #e3e3e3; font-size: 28px;">150</h5>
                    </div>
                </div>
            </div>
        </div>
                    </div>

                    <div class="card" style="background-color: #000">
        <div class="container">
            <h4 style="text-align: center; margin-top: 10px; color: #e3e3e3">Indicados</h4>
            <table class="table" style="margin-top: 20px; bacground-color:#000">
                <thead style="color: #e3e3e3">
                  <tr style="color: #e3e3e3">
                    <th scope="col">#</th>
                    <th scope="col">Nomes</th>
                    <th scope="col">Status</th>


                  </tr>
                </thead>
                <tbody>
                  <tr style="color: #e3e3e3">
                    <th scope="row">1</th>
                    <td>Indicado 01</td>
                    <td style="color: #e3e3e3">Ativo</td>

                  </tr>
                  <tr style="color: #e3e3e3">
                    <th scope="row">2</th>
                    <td>Indicado 02</td>
                    <td style="color: #e3e3e3">Ativo</td>

                  </tr>
                  <tr style="color: #e3e3e3">
                    <th scope="row">3</th>
                    <td>Indicado 03</td>
                    <td style="color: #e3e3e3">Pendente</td>


                  </tr>
                </tbody>
              </table>
        </div>



    </div>




       <div style="margin-top: 30px; margin-botton: 30px">
        <div class="row">
            <div class="col-sm" style="text-align: center; margin-bottom: 10px; margin-top: 10px">
                <img src="img/icons/logo.png" alt="logo" style="width: 120px; height: 60px; ">
            </div>
        </div>

    </div>


       




                    


                </div>
            </main>
           

