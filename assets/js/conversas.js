document.addEventListener('DOMContentLoaded', function() {
    var elementos = document.querySelectorAll('.li-conversa');

    elementos.forEach(function(elemento) {
        elemento.addEventListener('click', function() {
            // Remove a classe 'active' de todos os elementos primeiro
            elementos.forEach(function(el) {
                el.classList.remove('active');
            });

            // Adiciona a classe 'active' apenas ao elemento clicado
            this.classList.add('active');
        });
    });
});