// Página da videoaula: toca o vídeo do YouTube e libera os exercícios quando ele termina.
(function () {
    var alvo = document.getElementById('player');
    if (!alvo) return;

    var aula = alvo.getAttribute('data-aula');
    var idVideo = alvo.getAttribute('data-video-id');
    var botao = document.getElementById('btn-exercicios');
    var cadeado = document.getElementById('icone-cadeado');
    var legenda = document.getElementById('legenda-exercicios');

    function desbloquear() {
        if (!botao || !botao.classList.contains('bloqueado')) return;
        botao.classList.remove('bloqueado');
        if (cadeado) cadeado.src = cadeado.getAttribute('data-aberto');
        if (legenda) legenda.textContent = legenda.getAttribute('data-liberada');
    }

    function concluirVideo() {
        desbloquear();
        // guarda no servidor para continuar liberado depois de recarregar a página
        var dados = new URLSearchParams();
        dados.append('aula', aula);
        fetch('marcar_video.php', { method: 'POST', body: dados, credentials: 'same-origin' });
    }

    window.onYouTubeIframeAPIReady = function () {
        new YT.Player('player', {
            width: 331,
            height: 186,
            videoId: idVideo,
            playerVars: { rel: 0, modestbranding: 1, playsinline: 1 },
            events: {
                onStateChange: function (e) {
                    if (e.data === YT.PlayerState.ENDED) concluirVideo();
                }
            }
        });
    };

    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/iframe_api';
    document.head.appendChild(tag);
})();
