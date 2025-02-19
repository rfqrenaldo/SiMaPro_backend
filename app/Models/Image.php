<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='images';
    protected $guarded=[];
    use HasFactory;
    public function project(){
        return $this->belongsTo(Project::class);
    }

}
