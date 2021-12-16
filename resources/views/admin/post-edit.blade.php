@extends('_partials._base')
@section('title', 'Editar Postagem')

@section('content')
    <div class="row">
        <h1>Editar Postagem</h1>
    </div>

    <div class="row">
        <form method="POST" action="{{route('post.update', ['id' => $post->id])}}" id="form" enctype="multipart/form-data">
            @include('_partials._post-form')
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        // Código para permitir o upload de imagens pelo CKEditor
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('post.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });

        // Código para preencher o CKEditor com o conteúdo recuperado do banco
        let conteudo = {!! json_encode($post->conteudo) !!}
        CKEDITOR.instances['wysiwyg-editor'].setData(conteudo);
    </script>
@endsection