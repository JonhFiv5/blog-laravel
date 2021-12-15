@extends('_partials._base')
@section('title', 'Posts')

@section('content')
    @foreach ($posts as $post)
        <div class="row border border-primary">
            <div class="col">
                {!!$post->conteudo!!}
            </div>
        </div>
    @endforeach
    <div class="navigation">
        {!! $posts->links('pagination::bootstrap-4') !!}
    </div>
@endsection
