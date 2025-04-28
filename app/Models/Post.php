<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{ 
    //
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'judul',
        'slug',
        'thumbnail',
        'isi',
        'category_id',
        'author_id',
        'is_featured',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function category():BelongsTo
    {
        return $this->belongsTo (Category::class,'category_id');
    }
    public function author():BelongsTo
    {
        return $this->belongsTo (Author::class,'author_id');
    }
}
