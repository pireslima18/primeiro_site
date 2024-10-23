$(document).ready(() => {

	$('#dashboard').on('click',()=>{
		//$('#pagina').load('index.html')

		$.get('index.html', data =>{
			$('body').html(data)
		})

	})
	
	$('#graficos').on('click',()=>{
		//$('#pagina').load('documentacao.html')

		/*$.get('documentacao.html', data =>{
			$('#pagina').html(data)
		})*/

		$('#graficos').addClass('disabled')
		$('#dashboard').removeClass('disabled')
		$.post('graficos.html', data =>{
			$('#pagina').html(data)
		})

		$.ajax({
			type: 'GET',
			url: 'getgraficos.php',
			data: 'acao=graficos',
			dataType: 'json',
			success: dados=>{
				var clientesAtivos = dados.clientesAtivos
				var clientesInativos = dados.clientesInativos
				//console.log(dados.clientesAtivos)
				//console.log(dados.clientesInativos)
			},
			error: ()=>{
				console.log('error1')
			}
		})

	})
	
	$('#suporte').on('click',()=>{
		//$('#pagina').load('suporte.html')

		/*$.get('suporte.html', data =>{
			$('#pagina').html(data)
		})*/

		$.post('suporte.html', data =>{
			$('#pagina').html(data)
		})

	})

	//Ajax
	$('#competencia').on('change', e=>{

		$.post('dados.html', data =>{
			$('#conteudo').html(data)
		})

		let competencia = $(e.target).val()

		//método, url, dados, sucesso, erro
		$.ajax({
			type: 'GET',
			url: 'app.php',
			data: 'competencia=' + competencia,
			dataType:'json',
			success: dados=>{
				$('#numeroVendas').html(dados.numeroVendas)
				$('#totalVendas').html(dados.totalVendas)
				$('#clientesAtivos').html(dados.clientesAtivos)
				$('#clientesInativos').html(dados.clientesInativos)
				$('#reclamacoes').html(dados.reclamacoes)
				$('#elogios').html(dados.elogios)
				$('#sugestoes').html(dados.sugestoes)
				$('#despesas').html(dados.totalDespesas)
				console.log('Exibindo dados')
				console.log(dados)
			},
			error: erro=>{console.log(erro)}
		})
	})
	
})