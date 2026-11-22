// Ajusta a tela de 402x874 (iPhone 17) para caber na janela, sem distorcer.
(function () {
    var moldura = document.querySelector('.moldura');
    var tela = document.querySelector('.tela');
    if (!moldura || !tela) return;

    function ajustar() {
        var s = Math.min(window.innerWidth / 402, window.innerHeight / 874, 1.3);
        tela.style.transform = 'scale(' + s + ')';
        moldura.style.width = (402 * s) + 'px';
        moldura.style.height = (874 * s) + 'px';
    }
    window.addEventListener('resize', ajustar);
    ajustar();
})();
