@extends('_partials._base')
@section('title', 'Editar Postagem')

@section('content')
    <div class="row">
        <h1>Editar Postagem</h1>
    </div>

    <div class="row">
        <form method="POST" action="{{route('post.update', ['id' => $post->id])}}" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col form-group mb-2">
                    <label for="titulo">Qual o título?</label>
                    <input type="text" name="titulo" class="mr-2" value="{{$post->titulo}}">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <label for="wysiwyg-editor">Edite sua postagem abaixo:</label>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                    <textarea name="wysiwyg-editor" class="ckeditor form-control"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('post.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        let conteudo = {!! json_encode($post->conteudo) !!}
        CKEDITOR.instances['wysiwyg-editor'].setData(conteudo);
        function salvarPostar(){
            let form = document.getElementById('form');
            form.action = "{{route('post.store', ['postarAgora' => true])}}";
            form.submit();
        }
    </script>
@endsection