@extends('_partials._base')
@section('title', 'Nova Postagem')

@section('content')
    <div class="row">
        <h1>Nova Postagem</h1>
    </div>

    <div class="row">
        <form method="POST" action="{{route('post.store')}}" id="form" enctype="multipart/form-data">
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
        
        function salvarPostar(){
            let form = document.getElementById('form');
            form.action = "{{route('post.store', ['postarAgora' => true])}}";
            form.submit();
        }
    </script>
@endsection