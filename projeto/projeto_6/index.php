<?php
  session_start();
  if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == 'SIM') {
    header('location:tarefas_pendentes.php');
  }
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');

      body{
        /*background: url('img/bancada.jpg') no-repeat left top;*/
        background-size: cover;
      }

      img{
        margin: auto;
        margin-top: 10px;
        width: 15%;
      }
      h1{
        text-align: center;
        font-size: 2em;
        font-family: 'Dancing Script', cursive;
        font-weight: 100;
      }
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
      .cadastro{
        background: white;
        text-align: center;
        padding-top: 12px;
        border-radius: 5px;
      }
      .btn{
        font-size: 1.2em;
      }
      .texto{
        text-align: center;
        margin-top: 20px;
        margin-bottom: -20px;
        font-size: 0.9em;
      }
      .texto a{
        color: black;
        text-decoration: none;
      }
      .texto a:hover{
        color: black;
        text-decoration: none;
      }
      .cadastro a{
        color: #007BFF;
        text-decoration: none;
      }
      .cadastro a:hover{
        color: #007BFF;
        text-decoration: none;
      }
    </style>
  </head>

  <body>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">

            <img src="img/logo.png">
            <h1>App Lista-Tarefas</h1>

            <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 2) {?>     
              <div class="bg-success">
                <h5 class="text-white py-2 text-center"><strong>Cadastro realizado</strong></h5>
              </div>
            <?php }?>

            <div class="card-body">
              <form action="controller.php?acao=login" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php if (isset($_GET['login']) && $_GET['login'] == 1) {?>
                  <div class="">
                    <p class="text-danger"><strong>E-mail ou senha inválidos!</strong></p>
                  </div>     
                <?php }?>

                <?php if (isset($_GET['login']) && $_GET['login'] == 2) {?>
                  <div class="">
                    <p class="text-danger"><strong>Sessão expirada!</strong></p>
                  </div>     
                <?php }?>    

                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

                <!--<p class="texto"><a href="#">Esqueceu a senha?</a></p>-->

              </form>
            </div>
          </div>

          <div class="border mt-2 cadastro">
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
          </div>
        </div>

    </div>
  </body>
</html>