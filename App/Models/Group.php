<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // Adicione os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
        'invite_link',
        'image',
        'category_id',
        'description',
        'uri'
        // Adicione aqui outros campos relevantes
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
