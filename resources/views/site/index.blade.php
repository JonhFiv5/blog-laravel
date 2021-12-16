@extends('_partials._base')
@section('title', 'Posts')

@section('content')
    @foreach ($posts as $post)
        <div class="row border border-primary">
            <div class="col">
                <h2>{{$post->titulo}}</h2>
                <h3>{{$post->descricao}}</h3>
                <img src="{{asset('storage/' . $post->imagem_capa)}}" alt="" width="200" height="auto">
            </div>
        </div>
    @endforeach
    <div class="navigation">
        {!! $posts->links('pagination::bootstrap-4') !!}
    </div>
@endsection
