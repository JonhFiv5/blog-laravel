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
        $posts = $this->post->paginate(2);
        return view('site.index', ['posts' => $posts]);
    }

    public function create() {
        return view('admin.post-create');
    }

    public function store(Request $request, bool $postarAgora = false) {
        $dados['titulo'] = $request->input('titulo');
        $dados['conteudo'] = $request->input('wysiwyg-editor');
        $dados['visivel'] = $postarAgora;
        $dados['user_id'] = 1;

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
            $post->conteudo = $request->input('wysiwyg-editor');
            $post->edited_at = now();

            $post->save();

            return redirect()->route('post.show', ['id' => $id]);
        }
    }

    public function imageUpload(Request $request) {
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            $path = $request->file('upload')->store('images/posts', ['disk' => 'public']);
            return Storage::url($path);
        }
    }
}
