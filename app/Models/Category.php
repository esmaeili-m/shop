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
}
