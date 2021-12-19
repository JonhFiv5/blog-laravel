<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index() {
        $posts = $this->post->paginate(9);
        return view('site.index', ['posts' => $posts]);
    }

    public function create() {
        return view('admin.post-create');
    }

    public function store(Request $request, bool $postarAgora = false) {
        $dados['titulo'] = $request->input('titulo');
        $dados['descricao'] = $request->input('descricao');
        $dados['conteudo'] = $request->input('wysiwyg-editor');
        $dados['visivel'] = $postarAgora;
        $dados['user_id'] = 1;

        if($request->hasFile('imagem_capa') && $request->file('imagem_capa')->isValid()) {
            $path = $request->file('imagem_capa')->store('images/posts', ['disk' => 'public']);
            $dados['imagem_capa'] = $path;
        }

        $this->post->create($dados);

        return 'Salvo, maninho';
    }

    public function show($id) {
        $post = $this->post->find($id);
        if ($post) {
            $post->increment('visitas');
            return view('site.show', ['post' => $post]);
        }
    }

    public function edit($id) {
        $post = $this->post->find($id);
        if ($post) {
            return view('admin.post-edit', ['post' => $post]);
        }
    }

    public function update(Request $request, $id) {
        $post = $this->post->find($id);
        if ($post) {
            $post->titulo = $request->input('titulo');
            $post->descricao = $request->input('descricao');
            $post->conteudo = $request->input('wysiwyg-editor');
            $post->edited_at = now();

            if($request->hasFile('imagem_capa') && $request->file('imagem_capa')->isValid()) {
                $path = $request->file('imagem_capa')->store('images/posts', ['disk' => 'public']);
                Storage::disk('public')->delete($post->imagem_capa);
                $post->imagem_capa = $path;
            }

            $post->save();

            return redirect()->route('post.show', ['id' => $id]);
        }
    }

    // Função utilizada para upload de imagens no CKEditor
    public function imageUpload(Request $request) {
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            $path = $request->file('upload')->store('images/posts', ['disk' => 'public']);
            return Storage::url($path);
        }
    }
}
