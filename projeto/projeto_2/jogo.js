var largura = 0
var altura = 0
var vidas = 1
var tempo = 15

var criaMosquitoTempo = 1500

var nivel = window.location.search
nivel = nivel.replace('?','')

if (nivel === 'normal') {
  criaMosquitoTempo = 1500
}else if (nivel === 'dificil') {
  criaMosquitoTempo = 1000
}else if(nivel === 'chucknorris') {
  criaMosquitoTempo = 750
}

function ajustaTamanhoPalcoJogo() {
  largura = window.innerWidth
  altura = window.innerHeight
  console.log(largura, altura)
}//Fim ajustaTamanhoPalcoJogo()

ajustaTamanhoPalcoJogo()

var cronometro = setInterval(function(){
  tempo -= 1
  if (tempo < 0) {
    clearInterval(cronometro)
    clearInterval(criaMosca)
    window.location.href = 'vitoria.html'
  }else{
    document.getElementById('cronometro').innerHTML = tempo
  }
  }, 1000)

function posicaoRandomica(){

  //Remover mosquito caso exista
  //Remover vidas
  if (document.getElementById('mosquito')) {
    document.getElementById('mosquito').remove()

    console.log('O elemento selecionado foi: v' + vidas)

    if (vidas > 3) {
      window.location.href = 'fim_de_jogo.html'
    }else{
    document.getElementById('v' + vidas).src = "imagens/coracao_vazio.png"

    vidas++

    }//Fim else
  }//Fim if 1


  var posicaoX = Math.floor(Math.random() * largura) -90
  var posicaoY = Math.floor(Math.random() * altura) -90

  if (posicaoX < 0) {
    posicaoX = 0
  }else{
    posicaoX
  }

  if (posicaoY < 0) {
    posicaoY = 0
  }else{
    posicaoY
  }

  console.log(posicaoX,posicaoY)

  //criando elemento html

  var mosquito = document.createElement('img')
  mosquito.src = 'imagens/mosquito.png'
  mosquito.className = tamanhoAleatorio() + ' ' + ladoAleatorio()
  mosquito.style.left = posicaoX + 'px'
  mosquito.style.top = posicaoY + 'px'
  mosquito.style.position = 'absolute'
  mosquito.id = 'mosquito'
  mosquito.onclick= function(){
    document.getElementById('mosquito').remove()
  }

  document.body.appendChild(mosquito)

}//Fim posicaoRandomica()

function tamanhoAleatorio(){
  var classe = Math.floor(Math.random() * 2)
  switch(classe){
    case 0:
      return 'mosquito1'

    case 1:
      return 'mosquito2'

    case 2: 
      return 'mosquito3'
  }
}

function ladoAleatorio(){

  var classe = Math.floor(Math.random() * 2)

  switch(classe){

    case 0:
      return 'ladoA'

    case 1:
      return 'ladoB'
  }

}
