// Barra de rolagem personalizada do menu.
// O trilho (escuro) faz parte do conteúdo e rola junto com a página, como no design;
// o polegar (gradiente branco → azul claro) acompanha o progresso da rolagem.
(function () {
    var pagina = document.querySelector('.pagina');
    var barra = document.querySelector('.barra');
    var polegar = document.querySelector('.barra .polegar');
    if (!pagina || !barra || !polegar) return;

    var ALTURA = 100; // altura do polegar (px)

    function medidas() {
        var trilho = barra.offsetHeight - 2;
        var max = pagina.scrollHeight - pagina.clientHeight;
        var curso = trilho - ALTURA;               // curso do polegar dentro do trilho
        var curso_tela = Math.max(curso - max, 1); // quanto ele realmente anda na tela
        return { max: max, curso: curso, curso_tela: curso_tela };
    }

    function atualizar() {
        var m = medidas();
        barra.style.display = m.max > 0 ? '' : 'none';
        var p = m.max > 0 ? pagina.scrollTop / m.max : 0;
        polegar.style.height = ALTURA + 'px';
        polegar.style.top = (1 + p * m.curso) + 'px';
    }

    pagina.addEventListener('scroll', atualizar);
    window.addEventListener('resize', atualizar);
    window.addEventListener('load', atualizar);

    // arrastar o polegar (mouse e toque), compensando a escala da tela
    var arrastando = false, y0 = 0, rolagem0 = 0;
    function escala() { return barra.getBoundingClientRect().height / barra.offsetHeight || 1; }

    polegar.addEventListener('pointerdown', function (e) {
        arrastando = true; y0 = e.clientY; rolagem0 = pagina.scrollTop;
        polegar.setPointerCapture(e.pointerId); e.preventDefault();
    });
    polegar.addEventListener('pointermove', function (e) {
        if (!arrastando) return;
        var m = medidas();
        var dy = (e.clientY - y0) / escala();
        pagina.scrollTop = rolagem0 + dy * (m.max / m.curso_tela);
    });
    function soltar() { arrastando = false; }
    polegar.addEventListener('pointerup', soltar);
    polegar.addEventListener('pointercancel', soltar);

    atualizar();
})();
