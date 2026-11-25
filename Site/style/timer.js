// Cronômetro da avaliação final.
// - Conta regressivamente em MM:SS:CC (minutos : segundos : centésimos).
// - Ao rolar a página, o cronômetro grande acompanha a rolagem, encolhe e se fixa no canto superior direito.
// - Quando o tempo acaba, as respostas são enviadas automaticamente.
(function () {
    var el = document.getElementById('timer');
    var pagina = document.querySelector('.pagina');
    var form = document.getElementById('form-prova');
    if (!el || !pagina) return;

    var GRANDE = { left: 40, top: 379, w: 321, h: 76, fonte: 38, raio: 28 };
    var PEQUENO = { left: 239, top: 14, w: 130, h: 28, fonte: 15, raio: 14 };

    var fim = performance.now() + parseFloat(el.getAttribute('data-restante') || '0');
    var enviado = false;

    function dois(n) { return (n < 10 ? '0' : '') + n; }

    function formatar(ms) {
        ms = Math.max(0, ms);
        var cent = Math.floor(ms / 10) % 100;
        var seg = Math.floor(ms / 1000) % 60;
        var min = Math.floor(ms / 60000);
        return dois(min) + ':' + dois(seg) + ':' + dois(cent);
    }

    function lerp(a, b, p) { return a + (b - a) * p; }

    // posição/tamanho conforme a rolagem
    function posicionar() {
        var rolagem = pagina.scrollTop;
        var topo = Math.max(PEQUENO.top, GRANDE.top - rolagem);          // sobe junto com o conteúdo até chegar ao canto
        var p = (GRANDE.top - topo) / (GRANDE.top - PEQUENO.top);       // 0 = grande · 1 = pequeno
        el.style.left = lerp(GRANDE.left, PEQUENO.left, p) + 'px';
        el.style.top = topo + 'px';
        el.style.width = lerp(GRANDE.w, PEQUENO.w, p) + 'px';
        el.style.height = lerp(GRANDE.h, PEQUENO.h, p) + 'px';
        el.style.lineHeight = lerp(GRANDE.h, PEQUENO.h, p) + 'px';
        el.style.fontSize = lerp(GRANDE.fonte, PEQUENO.fonte, p) + 'px';
        el.style.borderRadius = lerp(GRANDE.raio, PEQUENO.raio, p) + 'px';
    }

    function enviar() {
        if (enviado || !form) return;
        enviado = true;
        form.submit(); // envia o que já foi respondido (não exige todas as questões)
    }

    function quadro() {
        var restante = fim - performance.now();
        el.textContent = formatar(restante);
        el.classList.toggle('pouco', restante < 5 * 60 * 1000);
        if (restante <= 0) { enviar(); return; }
        requestAnimationFrame(quadro);
    }

    pagina.addEventListener('scroll', posicionar, { passive: true });
    window.addEventListener('resize', posicionar);
    posicionar();
    quadro();

    // seta de voltar: pede confirmação, pois o cronômetro não para
    var voltar = document.querySelector('[data-confirmar]');
    if (voltar) {
        voltar.addEventListener('click', function (e) {
            if (!window.confirm(voltar.getAttribute('data-confirmar'))) e.preventDefault();
        });
    }
})();
