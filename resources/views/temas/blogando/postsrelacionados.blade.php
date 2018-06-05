@if (count($postsRelacionados))
    <div class="bg-postsRelacionados">
        <div class="bg-postsRelacionados__info">
            <h3 class="bg-postsRelacionados__titulo">Post's Relacionados</h3>
            <p class="bg-postsRelacionados__descricao">Visualize outros post's relacionados ao mesmo assunto:</p>
        </div>
        <div class="bg-postsRelacionados__posts">
            @foreach($postsRelacionados as $postsRelacionado)
                <div class="bg-postsRelacionados__post">
                    @if ($blog->parametros->tipovisualizacaopostsrelacionados->mostrarimagem)
                        <a href="/{{$post->slug}}"><div class="bg-postsRelacionados__post___imagem" style="background-image: url({{$blog->url}}/arquivo/download/posts/{{date_format(date_create($postsRelacionado->datapostagem), "Y")}}/{{date_format(date_create($postsRelacionado->datapostagem), "m")}}/{{$postsRelacionado->imagem}});"></div></a>
                    @endif
                    <div class="bg-postsRelacionados__post___conteudo {{$blog->parametros->tipovisualizacaopostsrelacionados->mostrarimagem ? "" : "is-full"}}">
                        <div class="bg-postsRelacionados__post___header">
                            <h2 class="bg-postsRelacionados__post___titulo"><a href="/{{$postsRelacionado->slug}}" class="bg-postsRelacionados__post___link">{{ $postsRelacionado->titulo }}</a></h2>
                            @if ($blog->parametros->tipovisualizacaopostsrelacionados->mostrardatapostagem)
                                <p class="bg-post__informacoes bg-postsRelacionados__post___informacoes {{$blog->parametros->tipovisualizacaopostsrelacionados->mostrardatapostagem && !$blog->parametros->tipovisualizacaopostsrelacionados->mostrarcategoria ? "has-margin" : ""}}">
                                    Postado em <time class="bg-postsRelacionados__post___data">{{date_format(date_create($postsRelacionado->datapostagem), $blog->parametros->formatodatahora->formato)}}</time> por <a class="bg-postsRelacionados__post___autor" href="/autor/{{$postsRelacionado->perfil->slug}}">{{$postsRelacionado->perfil->nome}}</a>
                                </p>
                            @endif
                            @if ($blog->parametros->tipovisualizacaopostsrelacionados->mostrarcategoria)
                                <div class="bg-post__categorias bg-postsRelacionados__post___categorias">
                                    @foreach ($postsRelacionado->categorias as $categoria)
                                        <a class="bg-post__categoria bg-{{$categoria->categoria->slug}}" href="/categoria/{{$categoria->categoria->slug}}">{{$categoria->categoria->descricao}}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @if ($blog->parametros->tipovisualizacaopostsrelacionados->mostrarlegendarelacionado)
                            <div class="bg-post__conteudo bg-postsRelacionados__post___corpo">{{$post->conteudoresumido}}...</div>
                        @endif
                        <div class="bg-post__rodape bg-postsRelacionados__post___rodape">
                            <a class="bg-post__continuarLendo bg-postsRelacionados__post___continuarLendo" href="/{{$postsRelacionado->slug}}">Continuar lendo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif