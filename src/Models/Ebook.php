<?php

namespace SazUmme\Publication\Models;

use App\Models\Category;
use App\Models\EbookPage;
use App\Models\Image;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_ebook');
    }

    public function pages()
    {
        return $this->hasMany(EbookPage::class);
    }
}
