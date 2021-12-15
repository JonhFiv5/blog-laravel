<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'titulo', 'conteudo', 'visivel', 'visitas', 'edited_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
