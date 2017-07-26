<aside class="bg-p-aside--padrao">
    <h1 class="bg-p-aside__titulo"><a href="/painel">@lang("messages.menu.titulo")</a></h1>
    <div class="bg-p-aside__opcoes">
        <a class="bg-p-aside__link" href="/painel/post/formulario"><i class="icon-pencil"></i>&nbsp;@lang("messages.botao.escrever")</a>
         <a class="bg-p-aside__perfil" href="#perfilUsuario" onclick="togglePerfil(this, event);"><img alt="{{Auth::user()->nome}}" class="bg-p-aside__foto" src="/arquivo/download/usuarios/{{Auth::user()->imagem}}"></a> 
        <a class="bg-p-aside__navegacao" href="#navegacaoOpcoes" onclick="toggleNavegacao(this, event);"><i class="icon-th"></i></a>
    </div>
</aside>
<aside class="bg-p-navegacao--padrao" id="navegacaoOpcoes">
    <ul class="bg-p-navegacao__lista" role="menubar">
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/dashboard"><i class="icon-th-large bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.dashboard")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="/painel/post"><i class="icon-newspaper bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.post")</a></li>
        {{--  <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-picture bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.midia")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-chat bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.comentarios")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-wrench bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.ferramentas")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-users bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.usuarios")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-male bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.administrador")</a></li>
        <li class="bg-p-navegacao__item" role="menuitem"><a class="bg-p-navegacao__link" href="#"><i class="icon-cog-alt bg-p-navegacao__icone"></i>&nbsp;@lang("messages.menu.configuracoes")</a></li>  --}}
    </ul>
</aside>
 <aside class="bg-p-usuario--padrao" data-animacao-situacao="desanimado" id="perfilUsuario">
    <div class="bg-p-usuario__info">
        <img alt="" class="bg-p-usuario__foto" src="/arquivo/download/usuarios/{{Auth::user()->imagem}}">
        <span class="bg-p-usuario__nome"><i class="icon-user"></i>&nbsp;{{Auth::user()->nome}}</span>
        <span class="bg-p-usuario__usuario">{{Auth::user()->email}}</span>
    </div>
    <a class="bg-p-usuario__sair" href="/painel/sair"><i class="icon-off"></i>&nbsp;@lang("messages.botao.sair")</a>
    {{--  <ul class="bg-p-usuario__opcoes">
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link bg-p-usuario__opcoes___link--primeiro" href="#">@lang("messages.menu.perfil")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-user bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meuperfil")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-newspaper bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meusposts")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-chat bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meuscomentarios")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-pin bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.meusrascunhos")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-th-list bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.minhasatividades")</a></li>
        <li class="bg-p-usuario__opcoes___opcao"><a class="bg-p-usuario__opcoes___link" href="#"><i class="icon-cog bg-p-usuario__opcoes___icone"></i>&nbsp;@lang("messages.menu.perfil.conta")</a></li>
    </ul>  --}}
</aside> 