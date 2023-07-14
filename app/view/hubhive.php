<?php
include 'head.php';
include 'header.php';
?>

<div class="column">
    <div class="init">
        <div id="texto_init" class="column">
            <img id="bee" src="<?= assets('imgs/hubhive_bee1.png') ?>" alt="hubhive_bee">
            <h1 class="uppercase">Descubra novas possibilidades</h1>
            <p>
                Simplifique o gerenciamento, otimize a colaboração e leve seus projetos de informática ao próximo nível.</p>
            <a class="btn_glow" href="<?= route('login?new') ?>" id="btn_start">
                Começar
            </a>
        </div>

        <div class="cards">
            <a href="#ideias" class="card">
                <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.75 15.75H1.5a.75.75 0 0 1-.657-1.116l7.125-12.75a.75.75 0 0 1 1.31 0l7.125 12.75a.75.75 0 0 1-.653 1.117Z"></path>
                    <path d="M15.75 7.5a7.55 7.55 0 0 0-1.527.156l3.491 6.247a2.25 2.25 0 0 1-1.964 3.347H8.594A7.5 7.5 0 1 0 15.75 7.5Z"></path>
                </svg>
                <p class="tip uppercase">elabore ideias</p>
            </a>

            <a href="#organizacao" class="card">
                <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2.25A9.75 9.75 0 0 0 2.25 12 9.75 9.75 0 0 0 12 21.75 9.75 9.75 0 0 0 21.75 12 9.75 9.75 0 0 0 12 2.25ZM8.14 7.61l4.923 3.328a1.523 1.523 0 0 1-1.746 2.496 1.557 1.557 0 0 1-.375-.375L7.613 8.138a.381.381 0 0 1 .531-.531l-.003.003ZM12 20.25c-4.547 0-8.25-3.7-8.25-8.25a8.182 8.182 0 0 1 2.525-5.94.663.663 0 1 1 .92.955A6.869 6.869 0 0 0 5.078 12 6.931 6.931 0 0 0 12 18.923 6.931 6.931 0 0 0 18.923 12a6.93 6.93 0 0 0-6.26-6.89v2.577a.663.663 0 0 1-1.326 0V4.413A.663.663 0 0 1 12 3.75c4.55 0 8.25 3.703 8.25 8.25 0 4.547-3.7 8.25-8.25 8.25Z"></path>
                </svg>
                <p class="tip uppercase">organize objetivos</p>
            </a>
            <a href="#inspira" class="card">
                <svg width="40" height="40" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m21.407 19.753-4.41-4.41a8.148 8.148 0 0 0 1.633-4.903c0-4.516-3.674-8.19-8.19-8.19s-8.19 3.674-8.19 8.19 3.674 8.19 8.19 8.19a8.148 8.148 0 0 0 4.902-1.633l4.41 4.41a1.171 1.171 0 0 0 1.655-1.654ZM4.59 10.44a5.85 5.85 0 1 1 5.85 5.85 5.857 5.857 0 0 1-5.85-5.85Z"></path>
                </svg>
                <p class="tip uppercase">busque inspirações</p>
            </a>

        </div>
    </div>

</div>

<section class="secao bk" id="ideias">
    <div class="conteudo">
        <div class="column gap flex">
            <h2 class="uppercase">Elabore suas ideias</h2>
            <p>
                Incentivamos todos a compartilhar suas ideias, não importa o tamanho.
                Acreditamos no potencial de cada pensamento e valorizamos cada contribuição.
                Aqui é onde você pode expandir seus horizontes, encontrar inspiração em várias áreas e compartilhar ideias sobre projetos, iniciativas sociais, arte, design, tecnologia e muito mais.
                Nossa comunidade é diversa e acolhedora, pronta para apoiar e fornecer feedback construtivo.
            </p>
        </div>
        <img src="<?= assets('imgs/lamp.png') ?>" alt="" class="img_conteudo">
    </div>
</section>

<hr>

<section class="divsaosec secao">
    <h2 class="uppercase yl">Navegue entre projetos dos mais variados tipos e estilos</h2>
    <div class="divisao">
        <div class="card_new">
            <div class="card-details">
                <p class="text-title uppercase">Programação web</p>
                <p class="text-body">É a criação de aplicativos e sites acessíveis via navegadores, utilizando linguagens como HTML, CSS e JavaScript para construir interfaces interativas.</p>
            </div>
        </div>
        <div class="card_new">
            <div class="card-details">
                <p class="text-title uppercase">Eletrônica </p>
                <p class="text-body">A aplicação de circuitos eletrônicos que operam com sinais digitais, permitindo o processamento e armazenamento eficiente de informações em dispositivos eletrônicos.</p>
            </div>
        </div>
        <div class="card_new">
            <div class="card-details">
                <p class="text-title uppercase">Arquitetura de redes</p>
                <p class="text-body">A arquitetura de redes no campo da informática é o projeto e a estruturação de sistemas de comunicação que conectam dispositivos e recursos de computação.</p>
            </div>
        </div>
        <div class="card_new">
            <div class="card-details">
                <p class="text-title uppercase">Inteligência articfial</p>
                <p class="text-body">O desenvolvimento de Inteligências Artificiais (IA) envolve a criação de sistemas computacionais capazes de simular habilidades humanas, como aprendizado, raciocínio e tomada de decisão.</p>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="secao bk" id="organizacao">
    <div class="conteudo">
        <div class="column gap flex">
            <h2 class="uppercase">Planeje e organize</h2>
            <p>
            Você pode compartilhar suas ideias para projetos de pesquisa, trabalhos de conclusão de curso, teses, dissertações e muito mais. Nossa comunidade acadêmica é diversificada e acolhedora, pronta para apoiá-lo e fornecer feedback construtivo. Aqui, você encontrará recursos valiosos para ajudá-lo a planejar melhor seu projeto, desde a definição do tema e dos objetivos até a estruturação do cronograma e a análise dos resultados.
            </p>
        </div>
        <img src="<?= assets('imgs/notes.png') ?>" alt="" class="img_conteudo">
    </div>
</section>

<hr>

<section class="secao bk" id="inspira">
    <div class="conteudo">
        <div class="column gap flex">
            <h2 class="uppercase">Busque inspirações</h2>
            <p>
                Queremos encorajar todos os usuários a compartilhar suas ideias, independentemente de quão grandes ou pequenas possam ser. Acreditamos que cada pensamento tem o potencial de se transformar em algo extraordinário, e é por isso que valorizamos cada contribuição.
                Este é o lugar ideal para expandir seus horizontes e encontrar inspiração em diversas áreas. Você pode compartilhar ideias para projetos, iniciativas sociais, arte, design, tecnologia e muito mais. Nossa comunidade é diversificada e receptiva, pronta para apoiá-lo e fornecer feedback construtivo.
            </p>
        </div>
        <img src="<?= assets('imgs/magnify.png') ?>" alt="" class="img_conteudo">
    </div>
</section>

<?php
include 'footer.php';
?>