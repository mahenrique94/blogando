<aside class="bg-p-aside--{{$blog->aparencia->temaaside->slug}}">
    <h1 class="bg-p-aside__titulo">
        <svg class="bg-p-aside__logo" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 400" style="enable-background:new 0 0 500 400;" xml:space="preserve">
            <style type="text/css">
                .st0{fill:none;stroke:#FDFDFD;stroke-width:10;stroke-miterlimit:10;}
                .st1{fill:#FDFDFD;}
            </style>
            <circle class="st0" cx="248.2" cy="194.5" r="185"/>
            <path class="st1" d="M347.6,212.9c-7.7-12.3-19.5-22.6-35.3-30.7l-44.2-14.1v40.5c2.4,0.6,4.9,1.2,7.3,1.8c9,2.5,17.3,6.3,24.9,11.6 c6.2,3.9,10.8,8.9,13.8,14.8c3,5.9,4.4,12.2,4.4,18.7c0,12.5-4.2,22.2-12.6,29.1s-18.2,11.9-29.6,15c-11.3,3.1-22.9,5-34.8,5.7 c-11.8,0.7-21.2,1-28.1,1v-98.6c0.2,0,0.4,0,0.6,0v-43.9c-0.2,0-0.4,0-0.6,0V83c6.5-2.6,13.4-4.4,20.5-5.4V37.1 c-4.2,0.6-8.6,1.5-13.4,2.5c-12,2.6-23.6,6.3-34.8,11.1c-4.5,1.9-8.8,4-12.8,6.2V134h0v183.2c-1.3,3.3-2,6.1-2,8.4 c0,4.6,1.7,9,5.2,13.1c3.5,4.1,8.8,6.5,16,7.1c4.6,0.3,9.1,0.5,13.6,0.5c4.4,0,9,0,13.6,0c12.5,0,25.1-0.6,37.7-1.7 c12.7-1.2,25.1-3.7,37.2-7.6c9.5-3,18.2-7.3,26.1-13.1c7.9-5.7,14.7-12.4,20.5-20c5.7-7.6,10.3-15.7,13.6-24.4 c3.3-8.7,4.9-17.7,4.9-26.9C359.4,238.8,355.5,225.6,347.6,212.9z"/>
        </svg>
        <a href="/painel">@lang("messages.menu.titulo")</a>
    </h1>
    <div class="bg-p-aside__opcoes">
        <a class="bg-p-aside__link" href="/painel/post/formulario"><i class="icon-pencil"></i>&nbsp;@lang("messages.botao.escrever")</a>
         <a class="bg-p-aside__perfil" href="#perfilUsuario" onclick="togglePerfil(this, event);"><img alt="{{Auth::user()->nome}}" class="bg-p-aside__foto" src="/arquivo/download/usuarios/{{Auth::user()->imagem}}"></a> 
        <a class="bg-p-aside__navegacao" href="#navegacaoOpcoes" onclick="toggleNavegacao(this, event);"><i class="icon-th"></i></a>
    </div>
</aside>
<aside class="bg-p-navegacao--{{$blog->aparencia->temanavegacao->slug}}" id="navegacaoOpcoes">
    <ul class="bg-p-navegacao__lista" role="menubar">
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/dashboard"><i class="icon-th-large bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.dashboard")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/post"><i class="icon-newspaper bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.post")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/configuracoes/geral"><i class="icon-cog-alt bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.configuracoes")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/administrador/grupos"><i class="icon-male bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.administrador")</a></li>
        {{--  <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-picture bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.midia")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-chat bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.comentarios")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-wrench bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.ferramentas")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-users bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.usuarios")</a></li>
         --}}
    </ul>
</aside>
 <aside class="bg-p-usuario--{{$blog->aparencia->temaperfil->slug}}" data-animacao-situacao="desanimado" id="perfilUsuario">
    <div class="bg-p-usuario__info">
        <img alt="" class="bg-p-usuario__foto" src="/arquivo/download/usuarios/{{Auth::user()->imagem}}">
        <span class="bg-p-usuario__nome"><i class="icon-user"></i>&nbsp;{{Auth::user()->nome}}</span>
        <span class="bg-p-usuario__usuario">{{Auth::user()->email}}</span>
    </div>
    <a class="bg-p-usuario__sair" href="/painel/sair"><i class="icon-off"></i>&nbsp;@lang("messages.botao.sair")</a>
    <ul class="bg-p-usuario__opcoes">
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link bg-p-usuario__opcoes___link--primeiro" href="#">@lang("messages.menu.perfil")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="/painel/dashboard/meus-posts"><i class="icon-newspaper bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meusposts")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="/painel/dashboard/meus-rascunhos"><i class="icon-pin bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meusrascunhos")</a></li>
        {{--  <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-user bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meuperfil")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-chat bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meuscomentarios")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-th-list bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.minhasatividades")</a></li>  --}}
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="/painel/configuracoes/geral"><i class="icon-cog bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.conta")</a></li>
    </ul> 
</aside> 