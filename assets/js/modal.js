$(document).ready(function() {
  $('body').on('click', '.desc-disciplina', function(){
    var objetoAjax = {
      tipo: 'html',
      url: 'ajax/modal.php',
      data: {
        acao: 'getDescDisciplina',
        cd_disciplina: this.dataset.disciplina
      }
    }
    callAjax(objetoAjax, function(dados) {
      var resposta = JSON.parse(dados);
      var html = resposta.html;
      var data = JSON.parse(resposta.data)[0];
      $('#conteudo-pagina').after(html);
      $('.modal').find('.modal-title').html(data.nome_disciplina);
      $('.modal').find('.modal-body').html(data.desc_disciplina);
      $('.modal').modal('show');
    })
  });
  $('body').on('hidden.bs.modal', '.modal', function(e){
    $('.modal').remove();
  });
});