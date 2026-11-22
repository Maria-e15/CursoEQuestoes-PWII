// Texto em movimento sobre a curva do menu: acompanha o desenho da curva
// e corre continuamente da esquerda para a direita.
(function () {
    var tp = document.getElementById('tp');
    var caminho = document.getElementById('arco');
    if (!tp || !caminho) return;

    var unidade = tp.getAttribute('data-texto');
    var VELOCIDADE = 45; // pixels por segundo
    var NS = 'http://www.w3.org/2000/svg';

    function iniciar() {
        var svg = tp.ownerSVGElement;

        // mede a largura de uma repetição do texto
        var medida = document.createElementNS(NS, 'text');
        medida.setAttribute('visibility', 'hidden');
        medida.setAttribute('xml:space', 'preserve');
        medida.textContent = unidade;
        svg.appendChild(medida);
        var periodo = medida.getComputedTextLength();
        svg.removeChild(medida);
        if (!periodo) return;

        // repete o texto o bastante para cobrir toda a curva
        var vezes = Math.ceil((caminho.getTotalLength() + periodo) / periodo) + 1;
        tp.textContent = new Array(vezes + 1).join(unidade);

        if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

        var t0 = null;
        function quadro(t) {
            if (t0 === null) t0 = t;
            var deslocamento = (((t - t0) / 1000) * VELOCIDADE) % periodo - periodo;
            tp.setAttribute('startOffset', deslocamento);
            requestAnimationFrame(quadro);
        }
        requestAnimationFrame(quadro);
    }

    if (document.fonts && document.fonts.ready) document.fonts.ready.then(iniciar); else iniciar();
})();
