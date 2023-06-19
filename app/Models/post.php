<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'judul', 
        'konten', 
        'tgl_post'
    ];
    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_article', 'id');
    }
}
