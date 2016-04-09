document.addEventListener('DOMContentLoaded', function() {
	var elementos = document.querySelectorAll('.presente');
	var countElementos = elementos.length;
	for (var i = 0; i < countElementos; i++) {
		elementos[i].addEventListener('click', function() {
			this.closest('tr').children[1].value = 1;
			this.classList.remove('glyphicon-thumbs-up');
			this.classList.add('glyphicon-ok');
			this.style.color = 'green';
			this.closest('tr').classList.add('success');
		});
	};

		// if(document.querySelector('.salva-frequencia') != undefined) {
		// 	document.querySelector('.salva-frequencia').addEventListener('click', function() {
		// 		// document.querySelector('.salvaf').value = 'salvaF';
		// 		// document.querySelector('form[name=lista]').submit();
		// 	});
		// }
});