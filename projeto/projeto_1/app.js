class Despesa {
	constructor(ano, mes, dia, tipo, descricao, valor){
		this.ano = ano
		this.mes = mes
		this.dia = dia
		this.tipo = tipo
		this.descricao = descricao
		this.valor = valor
	}

	
	validarDados(){
		//validação de campos vazios
		for(let i in this){
			if ( this[i] === undefined || this[i] === '' || this[i] === null ) {
				return false
			}
		}
		//validação de dias nulos ou negativos
		if (this.dia <= 0) {
			return false
		}else if (this.dia > 31) {
			return false
		}
		//validação de moeda corrente com valor negativo
		if (this.valor < 0) {
			return false
		}

		return true
	}

}

class Bd{

	constructor(){
		let id = localStorage.getItem('id')

		if (id === null){
			localStorage.setItem('id', 0)
		}
	}

	getProximoId(){
		let proximoId = localStorage.getItem('id')
		return parseInt(proximoId) + 1
	}

	gravar(d){
		let id = this.getProximoId()

		localStorage.setItem(id, JSON.stringify(d))
		localStorage.setItem('id', id)

	}

	recuperarTodosRegistros(){
		//array despesas
		let despesas = Array()

		let id = localStorage.getItem('id')

		//Recuperar todas as despesas cadastradas em localStorage
		for(let i = 1; i <= id; i++){
			//Recuperar a despesa
			let despesa = JSON.parse(localStorage.getItem(i))

			//Existe itens que foram pulados ou removidos
			if (despesa === null) {
				continue
			}

			despesa.id = i
			despesas.push(despesa)
		}
		return despesas

	}

	pesquisar(despesa){
		let despesasFiltradas = Array()

		despesasFiltradas = this.recuperarTodosRegistros()

		console.log(despesasFiltradas)
		console.log(despesa)

		//ano
		if (despesa.ano !== '') {
			console.log('Filtro de ano')
			despesasFiltradas = despesasFiltradas.filter(d => d.ano == despesa.ano)
		}
		//mês
		if(despesa.mes !== ''){
			console.log('Filtro de mes')
			despesasFiltradas = despesasFiltradas.filter(d => d.mes == despesa.mes)
		}
		//dia
		if(despesa.dia !== ''){
			console.log('filtro de dia')
			despesasFiltradas = despesasFiltradas.filter(d => d.dia == despesa.dia)
		}
		//tipo
		if(despesa.tipo !== ''){
			console.log('filtro de tipo')
			despesasFiltradas = despesasFiltradas.filter(d => d.tipo == despesa.tipo)
		}
		//descrição
		if(despesa.descricao !== ''){
			console.log('filtro de descricao')
			despesasFiltradas = despesasFiltradas.filter(d => d.descricao == despesa.descricao)
		}

		//valor
		if(despesa.valor !== ''){
			console.log('filtro de valor')
			despesasFiltradas = despesasFiltradas.filter(d => d.valor == despesa.valor)
		}

		return despesasFiltradas

	}

	remover(id){
		localStorage.removeItem(id)
	}

	confirmaAcao(id){
		document.getElementById('modal_titulo').innerHTML = 'Excluir despesa.'
		document.getElementById('modal_titulo_div').className = 'modal-header text-danger'
		document.getElementById('modal_conteudo').innerHTML = 'Tem certeza que deseja excluir esta despesa?'
		document.getElementById('modal_btn').innerHTML = 'Sim'
		//document.getElementById('modal_btn').value = true
		//document.getElementById('modal_btn').onclick = bd.botaoExcluir(id)
		document.getElementById('modal_btn_1').innerHTML = 'Não'
		//document.getElementById('modal_btn_1').value = false
		document.getElementById('modal_btn').className = 'btn btn-danger'

		$('#modalRegistraDespesa').modal('show')
		$('#modal_btn').on('click',()=>
		{
			id = id.replace('id_despesa_', '')
			bd.remover(id)
			window.location.reload()
		})
	}

}

let bd = new Bd()

function cadastrarDespesa(){
	let ano = document.getElementById('ano')
	let mes = document.getElementById('mes')
	let dia = document.getElementById('dia')
	let tipo = document.getElementById('tipo')
	let descricao = document.getElementById('descricao')
	let valor = document.getElementById('valor')

	let despesa = new Despesa(ano.value, mes.value, dia.value, tipo.value, descricao.value, valor.value)

	if(despesa.validarDados()){
		bd.gravar(despesa)
		//dialog de sucesso

		document.getElementById('modal_titulo').innerHTML = 'Despesa registrada com sucesso.'
		document.getElementById('modal_titulo_div').className =	'modal-header text-success'
		document.getElementById('modal_conteudo').innerHTML = 'Você pode conferir suas despesas clicando <a href="consulta.html">aqui</a> ou indo em consultas!'
		document.getElementById('modal_btn').innerHTML = 'ok'
		document.getElementById('modal_btn').className = 'btn btn-success'

		$('#modalRegistraDespesa').modal('show')

		//limpar dados
		mes.value = ''
		dia.value = ''
		tipo.value = ''
		descricao.value = ''
		valor.value = ''

	}else{
		//dialog de erro

		document.getElementById('modal_titulo').innerHTML = 'Falha ao cadastrar despesa.'
		document.getElementById('modal_titulo_div').className = 'modal-header text-danger'
		document.getElementById('modal_conteudo').innerHTML = 'Verifique se todos os campos foram corrigidos corretamente!'
		document.getElementById('modal_btn').innerHTML = 'voltar'
		document.getElementById('modal_btn').className = 'btn btn-danger'

		$('#modalRegistraDespesa').modal('show')
	}
	
}//Fim function cadastrarDespesa()

function carregaListaDespesas(despesas = Array(), filtro = false) {

	if (despesas.length == 0 && filtro == false) {
		despesas = bd.recuperarTodosRegistros()
	}

	//selecionando o elemento tbody da tabela
	let listaDespesas = document.getElementById('listaDespesas')
	listaDespesas.innerHTML = ''

	//Percorrendo o array despesas, listando cada despesa de forma dinâmica
	despesas.forEach(function(d){
		//criando a linha (tr)
		let linha = listaDespesas.insertRow()
		//criar as colunas (td)
		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano} `
		//ajustar o tipo
		switch(parseInt(d.tipo)){
			case 1: d.tipo = 'Alimentação'
				break
			case 2: d.tipo = 'Educação'
				break
			case 3: d.tipo = 'Lazer'
				break
			case 4: d.tipo = 'Saúde'
				break
			case 5: d.tipo = 'Transporte'
				break
		}
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = `R$${d.valor}`	

		//botão excluir despesa
		let btn = document.createElement("button")
		btn.className = 'btn btn-danger btn-sm'
		btn.innerHTML = '<i class="fas fa-times"></i>'
		btn.id = `id_despesa_${d.id}`
		btn.onclick = function(){

			bd.confirmaAcao(this.id)

			/*if (bd.botaoExcluir()) {
				let id = this.id.replace('id_despesa_', '')
				bd.remover(id)
				window.location.reload()
			}*/
			//window.location.reload()


			//alert(id)

		}
		linha.insertCell(4).append(btn)

		//console.log(d)
	})
}

function pesquisarDespesa(){

	let ano = document.getElementById('ano').value
	let mes = document.getElementById('mes').value
	let dia = document.getElementById('dia').value
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value
	let valor = document.getElementById('valor').value

	let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor)
	
	let despesas = bd.pesquisar(despesa)
	carregaListaDespesas(despesas, true)//vai exibir todas as despesas por causa do ano possuir valor fixo
}
