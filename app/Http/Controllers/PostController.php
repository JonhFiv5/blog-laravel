<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index(Request $request) {
        $posts = $this->post->where('visivel', true)->orderBy('edited_at', 'desc')->paginate(9);

        if ($request->session()->has('error')) {
            Alert::warning('Atenção', $request->session()->get('error'));
        }

        return view('site.index', ['posts' => $posts]);
    }

    public function indexAutor($id) {
        $autor = User::find($id)->name;
        $posts = $this->post
                    ->where('visivel', true)
                    ->where('user_id', $id)
                    ->orderBy('edited_at', 'desc')
                    ->paginate(9);
        return view('site.index-autor', ['autor' => $autor, 'posts' => $posts]);
    }

    public function create() {
        return view('admin.post-create');
    }

    public function store(Request $request, bool $postarAgora = false) {
        $dados['titulo'] = $request->input('titulo');
        $dados['descricao'] = $request->input('descricao');
        $dados['conteudo'] = $request->input('wysiwyg-editor');
        $dados['visivel'] = $postarAgora;
        $dados['user_id'] = auth()->user()->id;
        $dados['edited_at'] = now();
        if($request->hasFile('imagem_capa') && $request->file('imagem_capa')->isValid()) {
            $path = $request->file('imagem_capa')->store('images/posts', ['disk' => 'public']);
            $dados['imagem_capa'] = $path;
        }

        $this->post->create($dados);

        return redirect()->route('post.index');
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
        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('post.index')->with('error', 'Acesso Negado!');
        }
        if ($post) {
            return view('admin.post-edit', ['post' => $post]);
        }
    }

    public function update(Request $request, $id) {
        $post = $this->post->find($id);
        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('post.index')->with('error', 'Acesso Negado!');
        }
        if (auth()->user()->id != $post->user_id) {
            
        }
        if ($post) {
            $post->titulo = $request->input('titulo');
            $post->descricao = $request->input('descricao');
            $post->conteudo = $request->input('wysiwyg-editor');
            $post->visivel = $request->input('visivel') ? true : false;
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
