<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','user_id'];
    public function section()
    {
       return $this->hasMany(Section::class,'bundle_id','id')->orderBy('sort_id','asc');
    }
    public function generated()
    {
       return $this->hasMany(generatedTable::class,'bundle_id','id');
    }
}
