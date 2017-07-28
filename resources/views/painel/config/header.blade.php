<!doctype html>
<html lang="en">
<head>
    @include("painel.config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@lang("messages.titulo.pagina")&nbsp;|&nbsp;@yield("pagina")</title>
    <link rel="icon" href="/assets/painel/img/favicon.ico">
</head>
<body class="bg-p-body">
    @include("painel.config.mensagens")
    <main class="bg-p-wrap u-wrap" role="main">
        <header class="bg-p-header" role="banner">
            @include("painel.config.aside")
        </header>
        <section class="bg-p-conteudo u-content">
            <section class="bg-p-dashboard">
                @include("painel.config.menu")
                <section class="bg-p-dashboard__conteudo">