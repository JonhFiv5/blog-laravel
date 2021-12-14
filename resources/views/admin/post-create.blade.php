@extends('_partials._base')
@section('title', 'Nova Postagem')

@section('content')
    <div class="row">
        <h1>Nova Postagem</h1>
    </div>

    <div class="row">
        <form method="POST" action="{{route('post.store')}}" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col form-group">
                    <textarea name="wysiwyg-editor" class="ckeditor form-control"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button onclick="salvarPostar()" class="btn btn-primary">Salvar e Postar</button>
                </div>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('wysiwyg-editor', {
            filebrowserUploadUrl: "{{route('post.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
        function salvarPostar(){
            let form = document.getElementById('form');
            form.action = "{{route('post.store', ['postarAgora' => true])}}";
            form.submit();
        }
    </script>
@stop