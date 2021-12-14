<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function create() {
        return view('admin.post-create');
    }

    public function store(Request $request, bool $postarAgora = false) {
        //
    }

    public function imageUpload(Request $request) {
        if ($request->hasFile('upload') && $request->file('upload')->isValid()) {
            $path = $request->file('upload')->store('images/posts', ['disk' => 'public']);
            return Storage::url($path);
        }
    }
}
