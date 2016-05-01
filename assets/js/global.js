var host = window.location.host;
var baseUrl = 'http://';
var baseUrl = (host.substring(0, 9) == 'localhost') ? baseUrl + host + '/' +
window.location.pathname.split('/')[1] + '/' : baseUrl + host + '/';
document.addEventListener('DOMContentLoaded', function() {
	var tempo = 3000;
	var countNotificacao = document.querySelectorAll('.list-group a.notificacao').length+1;
	var countNoticia = document.querySelectorAll('.list-group a.noticia').length+1;
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

	$('#foto-aluno').click(function() {
		$('#foto').trigger('click');
	});

	$('.foto-noticia').click(function() {
		$('#noticia').trigger('click');
	});

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
	var nova = document.createElement('a');
	nova.innerHTML = '<a href="#" class="list-group-item notificacao">' +
		'<h4 class="list-group-item-heading">'+ dados[0].tp_notificacao+' <span class="label label-success data-notificacao pull-right"><span class="glyphicon glyphicon-calendar"> 16/04/2016</span></span></h4>'+
		'<p class="list-group-item-text">'+dados[0].desc_notificacao+'</p>'+
	'</a>';
	document.querySelector('.list-group a').appendChild(nova);
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

function callAjax(data, callback) {
  var dados = (data.data != '' && data.data != undefined) ? data.data : null;
  var ajax = $.ajax({
    type : 'POST',
    url : baseUrl + data.url,
    dataType : data.tipo,
    data: dados,
    cache: false,
    success: function(data) {
      callback(data);
    }
  });
  return ajax;
}

function previewUpload(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $(input).next().attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}