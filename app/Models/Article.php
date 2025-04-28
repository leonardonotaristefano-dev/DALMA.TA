<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{use Searchable;
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value, $accepted_at, $editor_id){
        $this->is_accepted = $value;
        $this->accepted_at = $accepted_at;
        $this->editor_id = $editor_id;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Article::whereNull('accepted_at')->count();
    }

    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
        ];
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
    
}
