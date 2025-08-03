<?php

namespace SazUmme\Publication\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'written_by');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
