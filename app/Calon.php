<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $fillable = ['nim','nama','angkatan','deskripsi','visi','misi','foto'];
}
