document.addEventListener('DOMContentLoaded', function() {
  var notas = document.querySelectorAll('.notas');
  var resultado;
  for (var i = 0; i < notas.length; i++) {
    verificaValor(notas[i]);
    notas[i].addEventListener('keyup', function(e) {
      verificaValor(this);
    });
    notas[i].addEventListener('keypress', function(e) {
      if (e.keyCode != 46 && e.keyCode > 31 && (e.keyCode < 48 || e.keyCode > 57)) {
        e.preventDefault();
        return false;
       }
    });
  }
});

function verificaValor(elemento) {
  let nota1 = elemento.children[3].children[0];
  let nota2 = elemento.children[4].children[0];
  let status = elemento.children[5].children[1];
  if(nota1.value.length <= 3 && nota2.value.length <= 3) {
    valor_nota1 = (nota1.value == 'NaN' || nota1.value == '') ? 0 : nota1.value;
    valor_nota2 = (nota2.value == 'NaN' || nota2.value == '') ? 0 : nota2.value;
    resultado = (parseFloat(valor_nota1) + parseFloat(valor_nota2)) / 2;
    if(nota1.value.length != 0 && nota2.value.length != 0) {
      setaStatusAluno(elemento.dataset.aluno, resultado, status);
    }
  }
}


function setaStatusAluno(id, resultado, status) {
  var status_aluno = document.querySelector('label[data-id="'+id+'"]');
  if(resultado >= 6) {
    status_aluno.classList.remove('label-danger')
    status_aluno.classList.remove('status-aluno')
    status_aluno.classList.add('label');
    status_aluno.classList.add('label-success');
    console.log(status_aluno);
    status_aluno.innerHTML = 'Aprovado';
    status.value = 1;
  } else if(resultado == 0 || resultado == 0.0) {
    status_aluno.classList.remove('label');
    status_aluno.classList.remove('label-danger');
    status_aluno.classList.remove('label-success');
    status_aluno.innerHTML = ' - ';
    status.value = 0;
  } else {
    status_aluno.classList.remove('status-aluno')
    status_aluno.classList.remove('label-success')
    status_aluno.classList.add('label');
    status_aluno.classList.add('label-danger');
    status_aluno.innerHTML = 'Reprovado';
    status.value = 0;
  }
}