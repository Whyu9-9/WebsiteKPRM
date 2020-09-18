<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $fillable = ['nim','nama','angkatan','prodi','deskripsi','visi','misi','foto'];
}
