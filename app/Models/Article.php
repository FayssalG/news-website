<?php

namespace App\Models;

use DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'view_count'
    ];

    public $timestamps = false; 
    protected function getDateAttribute($value){
        return Carbon::parse($value)->translatedFormat('l d F Y - H:i');

    }
   

    
    public function tags()  {
        return $this->belongsToMany(Tag::class , 'article_tag');
    }
}
