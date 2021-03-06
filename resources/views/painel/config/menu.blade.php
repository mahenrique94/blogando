@unless (Auth::guest())
    <menu class="bg-p-menu--{{$blog->aparencia->temamenu->slug}} bg-p-dashboard__menu" role="menu">
        <ul class="bg-p-menu__lista" role="menubar">
            <li class="bg-p-menu__item has-submenu {{$pagina === "dashboard" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link has-submenu {{$pagina === "dashboard" ? "is-ativo" : ""}}" href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard")"><i class="icon-th-large bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.dashboard")</a>
                <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                    <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "inicio" ? "is-ativo" : ""}}" href="/painel/dashboard" role="link" title="@lang("messages.menu.dashboard.inicio")">@lang("messages.menu.dashboard.inicio")</a></li>
                    @if(\App\TblPerfil::ehLeitor())
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meuperfil" ? "is-ativo" : ""}}" href="/painel/dashboard/meu/perfil">@lang("messages.menu.dashboard.meuperfil")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meuspostscurtidos" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/posts/curtidos">@lang("messages.menu.dashboard.meuspostscurtidos")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meuspostsfavoritos" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/posts/favoritos">@lang("messages.menu.dashboard.meuspostsfavoritos")</a></li>
                    @endif
                    @if(\App\TblPerfil::naoEhLeitor())
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meusposts" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/posts">@lang("messages.menu.dashboard.meusposts")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meusrascunhos" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/rascunhos">@lang("messages.menu.dashboard.meusrascunhos")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meusagendamentos" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/agendamentos">@lang("messages.menu.dashboard.meusagendamentos")</a></li>
                    @endif
                    <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "meuscomentarios" ? "is-ativo" : ""}}" href="/painel/dashboard/meus/comentarios">@lang("messages.menu.dashboard.meuscomentarios")</a></li>
                    {{--
                    <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "atividades" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.dashboard.atividades")</a></li>  --}}
                </ul>
            </li>
            @if(\App\TblPerfil::naoEhLeitor())
                <li class="bg-p-menu__item has-submenu {{$pagina === "posts" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link has-submenu {{$pagina === "posts" ? "is-ativo" : ""}}" href="/painel/post" role="link" title="@lang("messages.menu.post")"><i class="icon-newspaper bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.post")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "novopost" ? "is-ativo" : ""}}" href="/painel/post/formulario" role="link" title="@lang("messages.menu.post.novo")">@lang("messages.menu.post.novo")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "todos" ? "is-ativo" : ""}}" href="/painel/post" role="link" title="@lang("messages.menu.post.todos")">@lang("messages.menu.post.todos")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "agendados" ? "is-ativo" : ""}}" href="/painel/post/agendados">@lang("messages.menu.post.agendados")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "rascunhos" ? "is-ativo" : ""}}" href="/painel/post/rascunhos">@lang("messages.menu.post.rascunhos")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "categorias" ? "is-ativo" : ""}}" href="/painel/categoria" role="link" title="@lang("messages.menu.post.categoria")">@lang("messages.menu.post.categoria")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "tags" ? "is-ativo" : ""}}" href="/painel/tag" role="link" title="@lang("messages.menu.post.tag")">@lang("messages.menu.post.tag")</a></li>
                    </ul>
                </li>
                <li class="bg-p-menu__item {{$pagina === "midia" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "midia" ? "is-ativo" : ""}}" href="/painel/midia/biblioteca"><i class="icon-picture bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.midia")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "novamidia" ? "is-ativo" : ""}}" href="/painel/midia/formulario">@lang("messages.menu.midia.nova")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "biblioteca" ? "is-ativo" : ""}}" href="/painel/midia/biblioteca">@lang("messages.menu.midia.biblioteca")</a></li>
                    </ul>
                </li>
                <li class="bg-p-menu__item {{$pagina === "comentarios" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "comentarios" ? "is-ativo" : ""}}" href="/painel/comentario"><i class="icon-chat bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.comentarios")</a></li>
                {{--  <li class="bg-p-menu__item {{$pagina === "ferramentas" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "ferramentas" ? "is-ativo" : ""}}" href="#"><i class="icon-wrench bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.ferramentas")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "exportar" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.exportar")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "importar" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.importar")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "excluir" ? "is-ativo" : ""}}" href="#">@lang("messages.menu.ferramentas.excluir")</a></li>
                    </ul>
                </li>  --}}
                <li class="bg-p-menu__item {{$pagina === "usuarios" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "usuarios" ? "is-ativo" : ""}}" href="/painel/usuarios"><i class="icon-users bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.usuarios")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "novousuario" ? "is-ativo" : ""}}" href="/painel/usuarios/formulario">@lang("messages.menu.usuarios.novo")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "todosusuarios" ? "is-ativo" : ""}}" href="/painel/usuarios">@lang("messages.menu.usuarios.todos")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "perfil" ? "is-ativo" : ""}}" href="/painel/usuarios/perfil/{{Auth::user()->id}}">@lang("messages.menu.usuarios.perfil")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "configuracoes" ? "is-ativo" : ""}}" href="/painel/usuarios/configuracoes/{{Auth::user()->idusuario}}">@lang("messages.menu.usuarios.configuracoes")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "usuariosredesocial" ? "is-ativo" : ""}}" href="/painel/usuarios/rede-social">@lang("messages.menu.usuarios.redesocial")</a></li>
                    </ul>
                </li>
                <li class="bg-p-menu__item {{$pagina === "newsletter" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "newsletter" ? "is-ativo" : ""}}" href="/painel/newsletter"><i class="icon-mail bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.newsletter")</a></li>
                <li class="bg-p-menu__item {{$pagina === "administrador" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "administrador" ? "is-ativo" : ""}}" href="/painel/administrador/grupo"><i class="icon-male bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.administrador")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "permissoes" ? "is-ativo" : ""}}" href="/painel/administrador/permissao">@lang("messages.menu.administrador.permissoes")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "tipoacesso" ? "is-ativo" : ""}}" href="/painel/administrador/tipo-de-acesso">@lang("messages.menu.administrador.tipoacesso")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "grupos" ? "is-ativo" : ""}}" href="/painel/administrador/grupo">@lang("messages.menu.administrador.grupos")</a></li>
                    </ul>
                </li>
                <li class="bg-p-menu__item {{$pagina === "configuracoes" ? "is-ativo" : ""}}" role="menuitem"><a class="bg-p-menu__link {{$pagina === "configuracoes" ? "is-ativo" : ""}}" href="/painel/configuracoes/geral"><i class="icon-cog-alt bg-p-menu__icone"></i>&nbsp;@lang("messages.menu.configuracoes")</a>
                    <ul class="bg-p-menu__lista bg-p-menu__lista--segundo" role="menubar">
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "geral" ? "is-ativo" : ""}}" href="/painel/configuracoes/geral">@lang("messages.menu.configuracoes.geral")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "aparencia" ? "is-ativo" : ""}}" href="/painel/configuracoes/aparencia">@lang("messages.menu.configuracoes.aparencia")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "escrita" ? "is-ativo" : ""}}" href="/painel/configuracoes/escrita">@lang("messages.menu.configuracoes.escrita")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "leitura" ? "is-ativo" : ""}}" href="/painel/configuracoes/leitura">@lang("messages.menu.configuracoes.leitura")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "discussao" ? "is-ativo" : ""}}" href="/painel/configuracoes/discussao">@lang("messages.menu.configuracoes.discussao")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "compartilhamento" ? "is-ativo" : ""}}" href="/painel/configuracoes/compartilhamento">@lang("messages.menu.configuracoes.compartilhamento")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "redesocial" ? "is-ativo" : ""}}" href="/painel/configuracoes/rede-social">@lang("messages.menu.configuracoes.redesocial")</a></li>
                        <li class="bg-p-menu__item bg-p-menu__item--segundo" role="menuitem"><a class="bg-p-menu__link bg-p-menu__link--segundo {{$subpagina === "newsletterconf" ? "is-ativo" : ""}}" href="/painel/configuracoes/newsletter">@lang("messages.menu.configuracoes.newsletter")</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </menu>
@endunless