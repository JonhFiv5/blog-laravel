@extends('_partials._base')
@section('title', $post->titulo)

@section('content')
    <div class="row">
        <div class="col">Postagem feita por <a href="{{route('post.index-autor', ['id' => $post->user_id])}}">{{ $post->user->name }}</a>.</div>
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
                    <a class="btn btn-primary" href="{{route('post.edit', ['id' => $post->id])}}">Editar Postagem</a>
                </div>
            </div>
        @endif
    @endauth
@endsection