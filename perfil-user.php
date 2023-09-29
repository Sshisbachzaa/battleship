<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <?php 
require("config.php"); // Get config file
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

// Check for successful image upload
if (isset($_FILES["Media"]) && $_FILES["Media"]["error"] == 0) {

    // Get uploaded image content
    $uploadedImageContent = file_get_contents($_FILES['Media']['tmp_name']);
    
    $v = 'http://147.182.220.131/images/'.$_FILES['Media']['tmp_name'].'.png';
    

    $target = "./images".$_FILES['Media']['tmp_name'].'.png';
    $moved = move_uploaded_file( $_FILES['Media']['tmp_name'], $target);

	if( $moved ) {
	  //echo "Successfully uploaded";         
	} else {
	  echo "Not uploaded because of error #".$_FILES["Media"]["error"];
	}
    
    $data = [
        //'valor' => $_POST['depositValue'],
        'picture' => $uploadedImageContent,
        'id' => $userId,
    ];

    try{
    	$query2 = $pdo->prepare("UPDATE users SET picture='$v' WHERE id='$userId'");
    	if($query2->execute()){
		//echo "deu boa";
	    $url = 'http://147.182.220.131:5000/user/updatestats';
            $data = array(
                "email" => $_SESSION['email']
            );

            // encoding the request data as JSON which will be sent in POST
            $encodedData = json_encode($data);

            // initiate curl with the url to send request
            $curl = curl_init($url);

            // return CURL response
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Send request data using POST method
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

            // Data conent-type is sent as JSON
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json'
            ));
            curl_setopt($curl, CURLOPT_POST, true);

            // Curl POST the JSON data to send the request
            curl_setopt($curl, CURLOPT_POSTFIELDS, $encodedData);

            // execute the curl POST request and send data
            $result = curl_exec($curl);
            curl_close($curl);

            // if required print the curl response
            print $result;
            echo $result;
            print_r ($result);

    	} else {
            	echo "Ocorreu um erro ao processar o depósito.";
    	}
    } catch (PDOException $e) {
        echo "Erro na execução da consulta: " . $e->getMessage();
    }
    


}

?>

<style>
    * {
    margin: 0;
    padding: 0
}

body {
    background-color: #000
}

.card {
    width: 350px;
    background-color: #000;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
    color: #fff

}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px
}

.idd1 {
    font-size: 14px;
    

}

.number {
    font-size: 22px;
    font-weight: bold;
    m
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #B92020;
    color: #aeaeae;
    font-size: 15px;
    margin-top: 13px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}

.rounded-image {
  border-radius: 160px;
  overflow: hidden;
}
</style>



<main class="content" style="background-image: url('img/bg_menu.jpg');">
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
        <div class="card p-4"> 
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                 <button class="btn btn-secondary" style="margin-top: 20px; background-color: #000;  border-color: red"> 
                    <img src=<?php echo $picture; ?> height="100" width="100" class="rounded-image"/>
                </button> 
                <span class="name mt-3" style="margin-botton: 20px"><?php $nome_usu ?></span> 
                <span class="idd">Link de indicação</span> 
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    <span class="idd1">Oxc4c16a645_b21a</span> 
                    <span>
                        <i class="fa fa-copy"></i>
                    </span> 
                </div> 
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                   <span class="number">0 <span class="follow" style="color: #ffff; font-weight: bold">Amigos</span></span>  
                </div> 
                <div class=" d-flex mt-2"> 
                    <button class="btn1 btn-dark" type="submit" value="Upload">Editar Perfil</button>
		    <form action="" method="post" enctype="multipart/form-data">
        		<input type="file" name="Media" accept="image/*">
			<input type="submit" value="Upload">
   		    </form>
                </div> 
                <span style="color: #ffff; font-weight: bold; font-size:12px; margin-top: 20px" >Nivel <span class="follow" style="color: #ffff; font-weight: bold;font-size:12px">Bronze</span></span>  
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    
                </div> 
            </div> 
            </div>
            
            

    </div>
    
     <div style="">
        <div class="row">
            <div class="col-sm" style="text-align: center; margin-bottom: 10px; margin-top: 10px">
                <img src="img/icons/logo.png" alt="logo" style="width: 120px; height: 60px; ">
            </div>
        </div>

    </div>
</main>

    
</body>
</html>