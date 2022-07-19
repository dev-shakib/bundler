<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];
    public function section()
    {
       return $this->hasMany(Section::class,'bundle_id','id')->orderBy('sort_id','asc');
    }
}
