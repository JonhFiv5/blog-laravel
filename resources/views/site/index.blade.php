@extends('_partials._base')
@section('title', 'Posts')

@section('content')
    @foreach ($posts as $post)
        @if ($loop->first)
            <div class="row mt-3 mb-3">
        @endif

        <div class="col">
            <div class="card border-light post-zoom-hover" style="width: 18rem;">
                <a class="stretched-link" href="{{route('post.show', ['id' => $post->id])}}">
                    <img class="card-img-top rounded" src="{{asset('storage/' . $post->imagem_capa)}}" alt="{{$post->titulo}}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$post->titulo}}</h5>
                    <p class="card-text">
                        <small class="text-muted d-block">Por: {{$post->user->name}}</small>
                        <small class="text-muted">Em: {{$post->edited_at}}</small>
                    </p>
                    <p class="card-text">{{$post->descricao}}</p>
                </div>
            </div>
        </div>

        @if ($loop->iteration % 3 == 0)
            </div>
            <div class="row mt-3 mb-3">
        @elseif($loop->last)
            </div>
        @endif

    @endforeach
    <div class="navigation">
        {!! $posts->links('pagination::bootstrap-4') !!}
    </div>
@endsection
