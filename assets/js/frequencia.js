document.addEventListener('DOMContentLoaded', function() {
	var elementos = document.querySelectorAll('.presente');
	var countElementos = elementos.length;
	for (var i = 0; i < countElementos; i++) {
		elementos[i].addEventListener('click', function() {
      this.closest('tr').children[3].value = true;
      if(!this.classList.contains('glyphicon-ok')) {
        this.classList.remove('glyphicon-thumbs-up');
        this.classList.add('glyphicon-ok');
        this.style.color = 'green';
        this.closest('tr').classList.add('success');
      }else {
        this.classList.remove('glyphicon-ok');
        this.classList.add('glyphicon-thumbs-up');
        this.style.color = '';
        this.closest('tr').classList.remove('success');
      }
	  });
	}

  document.querySelector('body').addEventListener('click', function(event) {
    if (event.target.id == 'salva-freq') {
      document.querySelector('.salvaf').value = 'salvaF';
      document.querySelector('form[name=lista]').submit();
    }
  });

});