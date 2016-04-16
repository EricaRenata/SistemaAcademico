document.addEventListener('DOMContentLoaded', function() {
	var tempo = 3000;
	var countNotificacao = document.querySelectorAll('.list-group a.notificacao').length;
	var countNoticia = document.querySelectorAll('.list-group a.noticia').length;
  if(document.querySelector('body').dataset.alert != '') {
    alert(document.querySelector('body').dataset.alert);
  }
	var verificaNotificacao = setInterval(function() {
		var obj = {
			acao: '',
		};
		ajax(obj, function(dados) {
			if(Object.keys(dados).length) {
				if(dados.notificacoes != 0 && dados.notificacoes > countNotificacao) {
					countNotificacao = dados.notificacoes;
					var obj = {
						acao: 'getUltimaNotificacao',
					};
					ajax(obj, function(dados) {
						if(Object.keys(dados).length) {
							insertNotificacao(dados);
						}
						
					});
					
				}else {
					tempo = 0;
				}
			} 
			tempo = 3000;
		});

		ajax(obj, function(dados) {
			if(Object.keys(dados).length) {
				if(dados.noticias != 0 && dados.noticias > countNoticia) {
					countNoticia = dados.noticias;
					var obj = {
						acao: 'getUltimaNoticia',
					};
					ajax(obj, function(dados) {
						if(Object.keys(dados).length) {
							alert();	
						}
					});
					
				}else {
					tempo = 0;
				}
			} 
			tempo = 3000;
		});
	}, tempo);

});


function ajax(obj, callback) {
	var http = new XMLHttpRequest();
	var url = "../ajax/notificacao.php";
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      callback(JSON.parse(http.responseText));
    }
	}
	var parametro = (obj != undefined) ? serializeObject(obj) : null;
	http.send(parametro);
}

function insertNotificacao(dados) {
	html = '<a href="#" class="list-group-item notificacao">' +
		'<h4 class="list-group-item-heading">Alunos <span class="label label-success data-notificacao pull-right"><span class="glyphicon glyphicon-calendar"> 16/04/2016</span></span></h4>'+
		'<p class="list-group-item-text">Aluno eliseu adicionado por Eliseu dos Santos      		</p>'+
	'</a>';
}

function serializeObject(obj) {
	var data = [];
	for (var prop in obj) {
		if (!obj.hasOwnProperty(prop)) {
			continue;
		}
		data.push(prop + '=' + obj[prop]);
	}
	return data.join('&');
}