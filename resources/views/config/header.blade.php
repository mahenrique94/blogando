<!doctype html>
<html lang="en">
<head>
    @include("config.libraries-style")
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>@lang("messages.titulo.pagina")&nbsp;|&nbsp;@yield("pagina")</title>
    <link rel="icon" href="/assets/img/favicon.ico">
</head>
<body>
    <main class="u-wrap" role="main">
        <header class="header" role="banner">
            @include("config.aside")
        </header>
        <section class="u-content">
            <section class="bg-dashboard">
                @include("config.menu")
                <section class="bg-dashboard__conteudo">