<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'titulo', 'descricao', 'imagem_capa','conteudo', 'visivel', 'visitas', 'edited_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getEditedAtAttribute($value) {
        return Carbon::create($value)->format('d/m/Y H:i:s');
    }
}
