<?php

// Dados das aulas. Para trocar o vídeo ou incluir o PDF de uma aula, edite aqui.
//   'video'    => link do YouTube da videoaula (por enquanto o mesmo link em todas)
//   'material' => caminho do PDF do material didático (ex.: 'pdf/aula1.pdf'); null = ainda sem arquivo

$video_provisorio = 'https://www.youtube.com/watch?v=V5e8_Jp67M0&pp=ygUadG9kYSBtYXRlcmlhIHByb2JhYmlsaWRhZGU%3D';

return [
    1 => ['titulo' => 'Probabilidade:',  'subtitulo' => 'Conceitos básicos',        'video' => $video_provisorio, 'material' => 'pdf/aula1.pdf'],
    2 => ['titulo' => 'Fórmula:',        'subtitulo' => 'Cálculo da probabilidade', 'video' => $video_provisorio, 'material' => 'pdf/aula2.pdf'],
    3 => ['titulo' => 'Probabilidade:',  'subtitulo' => 'União de dois eventos',    'video' => $video_provisorio, 'material' => 'pdf/aula3.pdf'],
    4 => ['titulo' => 'Probabilidade:',  'subtitulo' => 'Intersecção',              'video' => $video_provisorio, 'material' => 'pdf/aula4.pdf'],
    5 => ['titulo' => 'Conceito final:', 'subtitulo' => 'Probabilidade condicional', 'video' => $video_provisorio, 'material' => 'pdf/aula5.pdf'],
];
