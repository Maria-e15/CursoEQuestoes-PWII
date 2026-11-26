// Questionários: só envia se TODAS as questões estiverem respondidas.
// No lugar da mensagem padrão do navegador, mostra o aviso do site, rola até a primeira
// questão que falta e destaca as pendentes.
(function () {
    var form = document.querySelector('form.q-lista');
    var pagina = document.querySelector('.pagina');
    if (!form) return;

    form.noValidate = true; // desliga o balão padrão do navegador

    function lista(numeros) {
        if (numeros.length === 1) return String(numeros[0]);
        return numeros.slice(0, -1).join(', ') + ' e ' + numeros[numeros.length - 1];
    }

    form.addEventListener('submit', function (e) {
        var cartoes = form.querySelectorAll('.q-card');
        var faltam = [], primeiro = null;

        cartoes.forEach(function (cartao, i) {
            var respondida = cartao.querySelector('input[type="radio"]:checked');
            cartao.classList.toggle('pendente', !respondida);
            if (!respondida) { faltam.push(i + 1); if (!primeiro) primeiro = cartao; }
        });

        if (!faltam.length) return; // tudo respondido: envia normalmente
        e.preventDefault();

        var detalhe = faltam.length === 1
            ? 'Falta responder a questão ' + faltam[0] + '.'
            : 'Faltam as questões ' + lista(faltam) + '.';
        window.mostrarAviso('Responda todas as questões!', detalhe);

        // rola até a primeira questão pendente (compensando a escala da tela)
        if (pagina && primeiro) {
            var escala = pagina.getBoundingClientRect().height / pagina.offsetHeight || 1;
            var delta = (primeiro.getBoundingClientRect().top - pagina.getBoundingClientRect().top) / escala;
            pagina.scrollTo({ top: Math.max(0, pagina.scrollTop + delta - 90), behavior: 'smooth' });
        }
    });

    // ao responder, o destaque da questão some
    form.addEventListener('change', function (e) {
        var cartao = e.target.closest ? e.target.closest('.q-card') : null;
        if (cartao) cartao.classList.remove('pendente');
    });
})();
