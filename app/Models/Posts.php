<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected $casts=[
      'tags' =>'array',
      'colors_id'=>'array'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function attributes()
    {
        return $this->hasMany(AttributesPosts::class,'post_id','id');
    }
}
