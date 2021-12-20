@extends('_partials._base')
@section('title', 'Posts -' . $autor)

@section('content')
    <h1 class="text-center my-3">Posts Feitos Por {{$autor}}</h1>
    @include('_partials._post-list')
@endsection
