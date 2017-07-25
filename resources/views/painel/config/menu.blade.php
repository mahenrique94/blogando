<menu class="bg-p-menu--padrao bg-p-dashboard__menu" role="menu">    
    <ul class="bg-p-menu__lista" role="menubar">
        <li class="bg-p-menu__item has-submenu {{$pagina === "dashboard" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link has-submenu {{$pagina === "dashboard" ? "is-ativo" : ""}}" href="/painel/dashboard"><i class="icon-th-large bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.dashboard")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "inicio" ? "is-ativo" : ""}}" href="/painel/dashboard">@lang("messages.menu.dashboard.inicio")</a></li>
                {{--  <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meusposts" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.meusposts")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meusrascunhos" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.meusrascunhos")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meuscomentarios" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.meuscomentarios")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "comentarios" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.comentarios")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "atividades" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.atividades")</a></li>  --}}
            </ul>
        </li>
        <li class="bg-p-menu__item has-submenu {{$pagina === "posts" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link has-submenu {{$pagina === "posts" ? "is-ativo" : ""}}" href="/painel/posts"><i class="icon-newspaper bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.posts")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "novo" ? "is-ativo" : ""}}" href="/painel/posts/formulario">@lang("messages.menu.posts.novo")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "todos" ? "is-ativo" : ""}}" href="/painel/posts">@lang("messages.menu.posts.todos")</a></li>
                {{--  <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "agendados" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.posts.agendados")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "rascunhos" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.posts.rascunhos")</a></li>  --}}
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "categorias" ? "is-ativo" : ""}}" href="/painel/posts/categorias">@lang("messages.menu.posts.categorias")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "tags" ? "is-ativo" : ""}}" href="/painel/posts/tags">@lang("messages.menu.posts.tags")</a></li>
            </ul>
        </li>
        {{--  <li class="bg-p-menu__item {{$pagina === "midia" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "midia" ? "is-ativo" : ""}}" href="#"><i class="icon-picture bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.midia")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "nova" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.midia.nova")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "biblioteca" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.midia.biblioteca")</a></li>
            </ul>
        </li>  --}}
        {{--  <li class="bg-p-menu__item {{$pagina === "comentarios" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "comentarios" ? "is-ativo" : ""}}" href="#"><i class="icon-chat bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.comentarios")</a></li>  --}}
        {{--  <li class="bg-p-menu__item {{$pagina === "ferramentas" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "ferramentas" ? "is-ativo" : ""}}" href="#"><i class="icon-wrench bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.ferramentas")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "exportar" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.exportar")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "importar" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.importar")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "excluir" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.excluir")</a></li>
            </ul>
        </li>  --}}
        {{--  <li class="bg-p-menu__item {{$pagina === "usuarios" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "usuarios" ? "is-ativo" : ""}}" href="#"><i class="icon-users bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.usuarios")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "perfil" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.usuarios.perfil")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "configuracoes" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.usuarios.configuracoes")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "todos" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.usuarios.todos")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "convidar" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.usuarios.convidar")</a></li>
            </ul>
        </li>  --}}
        {{--  <li class="bg-p-menu__item {{$pagina === "admnistrador" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "admnistrador" ? "is-ativo" : ""}}" href="#"><i class="icon-male bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.administrador")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "permissoes" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.administrador.permissoes")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "tipoacesso" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.administrador.tipoacesso")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "grupos" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.administrador.grupos")</a></li>
            </ul>
        </li>  --}}
        {{--  <li class="bg-p-menu__item {{$pagina === "configuracoes" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "configuracoes" ? "is-ativo" : ""}}" href="#"><i class="icon-cog-alt bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.configuracoes")</a>
            <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "geral" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.configuracoes.geral")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "escrita" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.configuracoes.escrita")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "leitura" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.configuracoes.leitura")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "discussao" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.configuracoes.discussao")</a></li>
                <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "compartilhamento" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.configuracoes.compartilhamento")</a></li>
            </ul>
        </li>  --}}
    </ul>
</menu>