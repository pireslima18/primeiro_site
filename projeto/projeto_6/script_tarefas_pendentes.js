function editar(id, txt_tarefa) {
				//Criar form de edição
				let form = document.createElement('form')
				form.action = 'tarefas_pendentes.php?pag=tarefas_pendentes&acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//Criar input de edição
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'tarefa'
				inputTarefa.className = ' col-9 form-control'
				inputTarefa.value = txt_tarefa

				//Input hidden para guardar id_tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//Criar button de edição
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluir elementos no form
				form.appendChild(inputTarefa)
				form.appendChild(button)
				form.appendChild(inputId)

				//Selecionar a div tarefa
				let tarefa = document.getElementById('tarefa_'+id)

				//limpar texto para inclusão do form
				tarefa.innerHTML = ''

				//incluir form na págna
				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id){
				location.href = 'tarefas_pendentes.php?pag=tarefas_pendentes&acao=remover&id=' + id
			}

			function marcarRealizada(id){
				location.href = 'tarefas_pendentes.php?pag=tarefas_pendentes&acao=marcarRealizada&id=' + id
			}