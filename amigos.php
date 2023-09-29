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

        <div class="main" style="background-image: url('img/bg_menu.jpg');>
            <?php 
                include 'topo.php'; 
            ?>


            <main class="content" style="background: #000; ">
                <div class="container-fluid p-0"  >

                    <h1 class="h3 mb-3" sytle="color: #ffff">Amigos</h1>

                    <div class="container">
                        <div class="row">
                        <div class="col-sm">
                        <div class="card bg-dark">
        <div class="container">
            <h4 style="text-align: center; margin-top: 10px; color: #ffff">Amigos</h4>
            <table class="table table-dark" style="margin-top: 20px">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nomes</th>
                    <th scope="col">Status</th>


                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>amigo 01</td>
                    <td style="color: green">Online</td>

                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>amigo 02</td>
                    <td style="color: green">Online</td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>amigo 03</td>
                    <td style="color: red">Offline</td>


                  </tr>
                </tbody>
              </table>
        </div>

                       



        <div class="card bg-dark">
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


