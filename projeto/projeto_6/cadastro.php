<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap');
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
      .btn{
        font-size: 1.2em;
      }
      .cadastro{
        text-align: center;
        padding-top: 12px;
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

            <div class="card-body">
              <form action="controller.php?acao=cadastro" method="post">
                <div class="form-group">
                  <input name="nome" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 1) {?>
                  <div class="bg-danger">
                    <h5 class="text-white py-2 text-center"><strong>Usuário já cadastrado</strong></h5>
                  </div>     
                <?php }?>

                <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 2) {?>     
                  <div class="bg-success">
                    <h5 class="text-white py-2 text-center"><strong>Cadastro realizado</strong></h5>
                  </div>
                <?php }?>

                <?php if (isset($_GET['cadastro']) && $_GET['cadastro'] == 3) {?>     
                  <div class="bg-warning">
                    <h5 class="py-2 text-center"><strong>Preencha todos os campos</strong></h5>
                  </div>
                <?php }?>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Criar conta</button>
              </form>
            </div>
          </div>

          <div class="border mt-2 cadastro">
            <p>Já tem uma conta? <a href="index.php">Conecte-se</a></p>
          </div>

        </div>
    </div>
  </body>
</html>