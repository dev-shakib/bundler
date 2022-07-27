<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name','price'];
    public function plan()
    {
        return $this->hasMany(Plan::class, 'package_id', 'id');
    }
}
