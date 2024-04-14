<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function descendants()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('descendants');
    }
}
