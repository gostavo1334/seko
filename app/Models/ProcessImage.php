<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessImage extends Model
{
    use HasFactory;

    protected $table = 'process_images';

    protected $fillable = ['image_path'];
}
