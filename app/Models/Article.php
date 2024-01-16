<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected $casts=[
      'tags'=>'array'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
