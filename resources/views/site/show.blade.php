@extends('_partials._base')
@section('title', $post->titulo)

@section('content')
    <div class="row">
        <div class="col">Postagem feita por {{ $post->user->name }}.</div>
        <div class="col text-end">Página visitada {{ $post->visitas }} vezes.</div>
    </div>
    <div class="row">
        <div class="col">Última atualização: {{ $post->edited_at }}.</div>
    </div>
    <hr>
    {!! $post->conteudo !!}
    <hr>
    @auth
        @if (auth()->user()->id == $post->user->id)
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary">Editar Postagem</button>
                </div>
            </div>
        @endif
    @endauth
@endsection