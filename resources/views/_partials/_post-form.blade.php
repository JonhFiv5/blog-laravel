@csrf
<div class="row">
    <div class="col form-group mt-2">
        <label for="titulo">Qual o título?</label>
    </div>
</div>
<div class="row">
    <div class="col form-group mb-2">
        <input type="text" name="titulo" class="mr-2" value="{{ $post->titulo ?? '' }}">
    </div>
</div>
<div class="row">
    <div class="col form-group mt-2">
        <label for="titulo">Escreva uma breve descrição sobre o post:</label>
    </div>
</div>
<div class="row">
    <div class="col form-group mb-2">
        <textarea name="descricao" cols="50" rows="4">{{ $post->descricao ?? '' }}</textarea>
    </div>
</div>
@isset($post)
    <div class="row">
        <div class="col form-group my-2">
            Deixar postagem pública? <input type="checkbox" name="visivel" {{$post->visivel ? 'checked':''}}>
        </div>
    </div>
@endisset
<div class="row">
    <div class="col form-group mt-2">
        <label for="imagem_capa">Adicione uma imagem de capa {{ isset($post->imagem_capa) ? '(Se desejar alterar a antiga)' : '' }}:</label>
    </div>
</div>
<div class="row">
    <div class="col form-group mb-2">
        <input type="file" name="imagem_capa">
    </div>
</div>
<div class="row">
    <div class="col form-group mt-2">
        <label for="wysiwyg-editor">Crie sua postagem abaixo:</label>
    </div>
</div>
<div class="row">
    <div class="col form-group mb-2">
        <textarea name="wysiwyg-editor" class="ckeditor form-control"></textarea>
    </div>
</div>
<div class="row my-2">
    <div class="col">
        @if (isset($post))
            <button type="submit" class="btn btn-primary">Atualizar</button>
        @else
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button onclick="salvarPostar()" class="btn btn-primary">Salvar e Publicar</button>
        @endif
    </div>
</div>