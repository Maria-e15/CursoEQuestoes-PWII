// Pop-up de aviso. Qualquer elemento com data-aviso="mensagem" e a classe "bloqueado"
// mostra a mensagem ao ser clicado (em vez de seguir o link).
(function () {
    var atual = null, temporizador = null;

    function fechar() {
        clearTimeout(temporizador);
        if (!atual) return;
        var el = atual; atual = null;
        el.classList.remove('ativo');
        setTimeout(function () { if (el.parentNode) el.parentNode.removeChild(el); }, 120);
    }

    window.mostrarAviso = function (mensagem) {
        var tela = document.querySelector('.tela');
        if (!tela) return;
        fechar();

        var fundo = document.createElement('div');
        fundo.className = 'aviso-fundo';
        fundo.setAttribute('role', 'alertdialog');
        fundo.setAttribute('aria-live', 'assertive');

        var caixa = document.createElement('div');
        caixa.className = 'aviso-caixa';

        var texto = document.createElement('p');
        texto.textContent = mensagem;

        var botao = document.createElement('button');
        botao.type = 'button';
        botao.textContent = 'Entendi';
        botao.addEventListener('click', fechar);

        caixa.appendChild(texto);
        caixa.appendChild(botao);
        fundo.appendChild(caixa);
        fundo.addEventListener('click', function (e) { if (e.target === fundo) fechar(); });
        tela.appendChild(fundo);

        atual = fundo;
        requestAnimationFrame(function () { fundo.classList.add('ativo'); botao.focus(); });
        temporizador = setTimeout(fechar, 3500);
    };

    document.addEventListener('click', function (e) {
        var alvo = e.target.closest ? e.target.closest('[data-aviso]') : null;
        if (!alvo || !alvo.classList.contains('bloqueado')) return;
        e.preventDefault();
        window.mostrarAviso(alvo.getAttribute('data-aviso'));
    });

    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') fechar(); });
})();
