<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedTag extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
