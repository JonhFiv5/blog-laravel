@extends('_partials._base')
@section('title', 'Postagem')

@section('content')
    <div class="row">
        <div class="col">Postagem feita por {{ $post->user->name }}.</div>
        <div class="col text-end">Página visitada {{ $post->visitas }} vezes.</div>
    </div>
    <div class="row">
        <div class="col">Escrita {{ date('d/m/Y h:m:s', strtotime($post->created_at)) }}.</div>
    </div>
    <hr>
    {!! $post->conteudo !!}
@endsection