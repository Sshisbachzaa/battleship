<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'header.php';
    ?>
    <style>
        .img-cover {
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#editarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') // data-id
            var nome = button.data('nome')
            var mail = button.data('mail')
            var telefone = button.data('telefone')
            var estado = button.data('estado')

            var modal = $(this)
            //aplica valor ao id
            modal.find('.modal-title').text('Editando dados: ' + nome)
            modal.find('#nome').val(nome) // <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required autocomplete="off">
            modal.find('#id').val(id)
            modal.find('#mail').val(mail)
            modal.find('#telefone').val(telefone)
            modal.find('#estado').val(estado)

        });
    });


</script>

<script>
    $(function () {
        $('#excluirModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') // data-id
            var nome = button.data('nome')


            var modal = $(this)
            //aplica valor ao id
            modal.find('.modal-title').text('Excluindo Dados: ' + nome)
            modal.find('#nome').val(nome) // <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo" required autocomplete="off">
            modal.find('#id').val(id)


        });
    });



</script>


<body>
    <div class="wrapper">
        <?php include 'menu.php'; ?>

        <div class="main">
            <?php 
                include 'topo.php'; 
            ?>


            <main class="content" style="background: #000; ">
                <div class="container-fluid p-0"  >

                    <h1 class="h3 mb-3">Comprar Moedas</h1>

                    <div class="container">
                        <div class="row">                              

                            <div class="card" style="width: 20rem; background-color: #B92020;">

                                <div class="container" style="text-align: center">
                                <img style="width: 150px; height: 150px; margin-top: 20px;" class="card-img-top" src="img/icons/coin.png" alt="Card image cap">
                                </div>
                                
                                <div class="card-body">
                                    <h3 style="color: #ffff; text-align: center; font-size: 70px; font-weight: 800">10</h3>
                                    <h4 style="color: #ffff; text-align: center; font-size: 18px; font-weight: 800">Pacote de 10 Moedas</h4></br>
                                    <a href="#"><button type="button" class="btn btn-success" style="width: 100%"> COMPRAR</button></a>
                                    <p style="font-size: 12px;  color: #ffff; margin-top: 15px; text-align: center;" >O saldo será adicionado em sua conta no jogo.</p>
                                </div>
                            </div>

                                           

                            <div class="card" style="width: 20rem; background-color: #B92020;  margin-left: 15px">

                                <div class="container" style="text-align: center">
                                <img style="width: 150px; height: 150px; margin-top: 20px;" class="card-img-top" src="img/icons/coin.png" alt="Card image cap">
                                </div>
                                
                                <div class="card-body">
                                    <h3 style="color: #ffff; text-align: center; font-size: 70px; font-weight: 800">10</h3>
                                    <h4 style="color: #ffff; text-align: center; font-size: 18px; font-weight: 800">Pacote de 10 Moedas</h4></br>
                                    <a href="#"><button type="button" class="btn btn-success" style="width: 100%"> COMPRAR</button></a>
                                    <p style="font-size: 12px;  color: #ffff; margin-top: 15px; text-align: center;" >O saldo será adicionado em sua conta no jogo.</p>
                                </div>
                            </div>
                     

                    </div>

                    

                        






                       


        <div class="card" style="background-color: #B92020">
            <div class="col-sm" style="margin-left: 45px; margin-bottom: 10px; margin-top: 10px" >
                <img src="img/icons/coin.png" alt="coin" style="width: 80px; height: 80px;">
            </div>
        </div>

        <div class="card" style="background-color: #B92020">
            <div class="row">
                <div class="col-sm" style="text-align: center; margin-bottom: 10px; margin-top: 10px" >
                    <img src="img/icons/logo.png" alt="logo" >
                </div>
            </div>

        </div>

  </div>


                    


                </div>
            </main>
           

            <footer class="footer" style="background: #000">
                <?php include 'footer.php' ?>
            </footer>
        </div>
    </div>

    <script src="js/app.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
</body>

</html>


