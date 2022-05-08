<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function author(): BelongsTo
    {
       return $this->belongsTo(author::class,'author_id','id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publisher::class);
    }
}
