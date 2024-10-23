<!DOCTYPE html>
<html lang="pt_BR">
<head>

    <meta charset="utf-8">
    <title>SuaMelhorFace</title>
    <meta name="viewport" content="width=device-width initial-scale=1">

    <!-- Bootstrap início -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="arquivos/fontawesome/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="imagens_index/favicon.png">

    <!-- Estilo Personalizado -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- fontes Personalizado -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">

    <!-- Script personalizado -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>

    <!-- Biblioteca AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Biblioteca alertas Js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head>
<body onload="loading()">

  <div class="box-load">
    <div class="pre-load"></div>
  </div>

  <div class="conteudo-pagina">

  <header><!--Início Cabeçalho-->
      <nav class="navbar navbar-expand-md fixed-top navbar-customizado"><!--Início nav-->
          
          <a href="" class="logo"><span class="sua">SUA</span><span class="melhorface">MELHORFACE</span></a>


            <i class="fa-solid fa-bars navbar-toggler" data-toggle="collapse" data-target="#nav-principal"></i>


          <div class="collapse navbar-collapse" id="nav-principal"><!--Início navegação-->

            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="#" class="nav-link"></a>
              </li>
              <li class="nav-item">
                <a href="#ferramentas" class="nav-link">Ferramentas</a>
              </li>
              <li class="nav-item">
                <a href="#mensagem" class="nav-link">Contatos</a>
              </li>
              <li class="nav-item">
                <a href="projeto/index.html" class="nav-link">Projetos</a>
              </li>

            </ul>

          </div><!--Fim navegação-->
    
      </nav><!--Fim nav-->
    </header><!--Fim Cabeçalho-->

    <!-- Inicio home -->

    <section class="d-flex" id="home"><!--Início seção section1-->
      
      <img src="imagens_index/site_projeto.jpg" class="img-fluid img-home">

    </section><!--Fim seção section1-->


    <!-- Inicio Section ferramentas -->
    <section id="ferramentas">
      <div class="container">

          <h1 class="titulo-ferramentas">Ferramentas para expandir seus negócios</h1>

        <div class="row">

          <div class="col-lg-6">
            <img src="imagens_index/ferramentas_site.jpg" class="img-fluid img-ferramentas">
            <p class="subtitulo-ferramentas">Paleta de cores</p>
            <p class="texto-ferramentas">Crie um site que levará sua empresa para ainda mais longe, com um design amigável e com personalidade própria.</p>
          </div>
          <div class="col-lg-6">
            <img src="imagens_index/ferramentas_email.jpg" class="img-fluid img-ferramentas">
            <p class="subtitulo-ferramentas">E-mails automáticos</p>
            <p class="texto-ferramentas">Mostre profissionalismo aos seus clientes com e-mails automáticos personalizados. Adquira um E-mail Profissional hoje mesmo.</p>
          </div>

        </div><!-- Fim row 1 -->

        <div class="row divisor-ferramentas">

          <div class="col-lg-6">
            <img src="imagens_index/ferramentas_jogo.jpg" class="img-fluid img-ferramentas">
            <p class="subtitulo-ferramentas">Jogos</p>
            <p class="texto-ferramentas">Querendo um diferencial? <br> Podemos produzir um jogo com o tema da sua marca que mantenha a navegação mais atraente.
            </p>
          </div>
          <div class="col-lg-6">
            <img src="imagens_index/ferramentas_dispositivo.jpg" class="img-fluid img-ferramentas">
            <p class="subtitulo-ferramentas">Compatibilidade</p>
            <p class="texto-ferramentas">Não basta apenas ter um site, é necessário que ele se adapte á diversos dispositivos WEB. Tenha seu site visto por todo tipo de cliente.</p>
          </div>

        </div><!-- Fim row 2 -->

      </div>
    </section>

    <!-- Inicio Section ferramentas -->
    <section id="add">
      <main class="l-main">

        <article class="c-card c-card--index js-card is-active" id="index-card"> <!--Inicio Card-->

          <div class="c-card__content">
            <h2 class="c-card__title">
              Material social<br><span class="c-card__title-emphasis">Card</span>
            </h2>

            <p class="c-card__explanation">
              Aqui estão todas as minhas redes sociais e meios de contato. Fique à vontade para mandar uma mensagem quando quiser!
            </p>

            <span class="c-button" id="teste" disabled>Escolha um dos ícones a baixo</span>
          </div>

        </article> <!--Fim Card-->
        
        <article class="c-card c-card--instagram js-card" id="instagram-card"> <!--Inicio Card-->

          <div class="c-card__content">
            <h2 class="c-card__title">
              Este é meu<br><span class="c-card__title-emphasis">Instagram</span>
            </h2>

            <p class="c-card__explanation">
              Este é meu instagram de uso pessoal.
            </p>

            <a href="https://www.instagram.com/pires_lima/" class="c-button">Ir para o meu Instagram</a>
          </div>

        </article> <!--Fim Card-->
        
        <article class="c-card c-card--linkedin js-card" id="linkedin-card"> <!--Inicio Card-->

          <div class="c-card__content">
            <h2 class="c-card__title">
              Este é meu<br><span class="c-card__title-emphasis">LinkedIn</span>
            </h2>

            <p class="c-card__explanation">
              Este é meu perfil no linkedIn.
            </p>

            <a href="https://br.linkedin.com/in/arthur-pires-de-paula-lima-9b1092249" class="c-button">Ir para o meu LinkedIn</a>
          </div>

        </article> <!--Fim Card-->
        
        <article class="c-card c-card--email js-card" id="email-card"> <!--Inicio Card-->

          <div class="c-card__content">
            <h2 class="c-card__title">
              Este é meu<br><span class="c-card__title-emphasis">E-mail</span>
            </h2>

            <p class="c-card__explanation">
              Este é meu email de contato. Mas se preferir, pode mandar uma mensagem no campo a baixo
            </p>

            <a href="mailto:suamelhorface@gmail.com" class="c-button">Ir para o meu E-mail</a>
          </div>

        </article> <!--Fim Card-->
        
        <article class="c-card c-card--whatsapp js-card" id="whatsapp-card"> <!--Inicio Card-->

          <div class="c-card__content">
            <h2 class="c-card__title">
              Este é meu<br><span class="c-card__title-emphasis">WhatsApp</span>
            </h2>

            <p class="c-card__explanation">
              Caso precise pode me ligar ou enviar uma mensagem por aqui, responderei assim que possível.
            </p>

            <a href="https://wa.me/5561994307411" class="c-button">Ir para o meu WhatsApp</a>
          </div>

        </article> <!--Fim Card-->

        <ul class="c-menu js-menu">
          
          <li class="c-menu__item c-menu__item--index is-active" id="toggle-index">
            <a class="c-menu__toggle js-section-toggle-index">
              <i class="fas fa-home"></i>
            </a>
          </li>

          <li class="c-menu__item c-menu__item--instagram" id="toggle-instagram">
            <a class="c-menu__toggle js-section-toggle-instagram" id="toggle-instagram">
              <i class="fab fa-instagram"></i>
            </a>
          </li>

          <li class="c-menu__item c-menu__item--linkedin" id="toggle-linkedin">
            <a class="c-menu__toggle js-section-toggle-linkedin">
              <i class="fab fa-linkedin"></i>
            </a>
          </li>
                
          <li class="c-menu__item c-menu__item--email" id="toggle-email">
            <a class="c-menu__toggle js-section-toggle-email">
              <i class="far fa-envelope"></i>
            </a>
          </li>
                
          <li class="c-menu__item c-menu__item--whatsapp" id="toggle-whatsapp">
            <a class="c-menu__toggle js-section-toggle-whatsapp">
              <i class="fab fa-whatsapp"></i>
            </a>
          </li>

        </ul>
        
      </main>

    </section>

    <!-- nova seção -->

    <section id="mensagem">
      <div class="container-mensagem">

        <h1 class="titulo-mensagem">Entre em contato,</h1>
        <hr>

        <form action="processa_envio.php" method="post">
          <label for="nome">Nome:</label>
          <input type="text" id="nome" name="nome" placeholder="Seu nome..." required>

          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="Seu e-mail..." required>

          <label for="assunto">Assunto:</label>
          <select id="assunto" name="assunto" required>
            <option value="" disabled selected>Selecione o assunto...</option>
            <option value="criação de site">Criação de site</option>
            <option value="duvida">Dúvida</option>
            <option value="sugestao">Sugestão</option>
            <option value="outro">Outro</option>
          </select>

          <label for="mensagem">Mensagem:</label>
          <textarea id="mensagem" name="mensagem" placeholder="Sua mensagem..." required></textarea>
            
          <input class="mt-3 d-block" type="submit" value="Enviar">
        </form>

        <?php if (isset($_GET['message']) && $_GET['message'] == 'send') { ?>
          <script type="text/javascript">swal("Mensagem enviada!", "Entraremos em contato assim que possível!", "success");</script>
        <?php }?>

      </div>
    </section>

    <!-- footer -->

    <footer>

      <div id="footer-content">
        <div id="footer-contacts">
          <p class="footer-logo"><span class="sua">SUA</span>MELHORFACE</p>
          <p class="footer-complemento">.com.br</p>

          <div id="footer-social-media">
             <a class="footer-link" id="linkedin" href="https://br.linkedin.com/in/arthur-pires-de-paula-lima-9b1092249" target="_blank" rel="external">
               <i class="fab fa-linkedin-in"></i>
             </a>
             <a class="footer-link" id="email" href="mailto:suamelhorface@gmail.com" href="https://wa.me/5561994307411">
               <i class="far fa-envelope"></i>
             </a>
             <a class="footer-link" id="whatsApp" href="https://wa.me/5561994307411" target="_blank" rel="external">
               <i class="fa-brands fa-whatsapp"></i>
             </a>
          </div>

        </div><!-- Fim footer-contacts -->

        <ul class="footer-list">
          <li>
            <h3>Serviços</h3>
          </li>
          <li>
            <p class="footer-link">Criação de sites</p>
          </li>
          <li>
            <p class="footer-link">Divulgação</p>
          </li>
          <li>
            <a href="#" class="footer-link"></a>
          </li>
        </ul>

        <ul class="footer-list">
          <li>
            <h3>Contatos</h3>
          </li>
          <li>
            <a class="footer-link" href="https://www.instagram.com/pires_lima/" target="_blank" rel="external">@pires_lima</a>
          </li>
          <li>
            <a class="footer-link" href="mailto:suamelhorface@gmail.com" target="_blank" rel="external">suamelhorface@gmail.com</a>
          </li>
          <li>
            <a class="footer-link" href="https://wa.me/5561994307411" target="_blank" rel="external">(61) 99430-7411</a>
          </li>
        </ul>

        

      </div><!-- Fim footer-content -->

      <div id="footer-copyright">
        &#169 2023 todos os direitos reservados.
      </div>

      
    </footer>

  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    AOS.init();
  </script>


</body>
</html>