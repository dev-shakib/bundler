<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name','bundle_id','user_id'];
    public function files()
    {
       return $this->hasMany(File::class,'section_id','id')->orderBy('sort_id','asc');
    }
}
