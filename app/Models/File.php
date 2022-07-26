<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected  $table = 'files';
    protected $fillable = ['user_id','filename','mime_types','bundle_id','section_id'];
     public function bundle()
    {
        dd("found");
       return $this->belongsTo(Bundle::class,'bundle_id','id');
    }
     public function section()
    {
       return $this->belongsTo(Section::class,'section_id','id');
    }
}
