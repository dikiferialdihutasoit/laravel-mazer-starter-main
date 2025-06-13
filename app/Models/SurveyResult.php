<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi secara massal.
     */
    protected $fillable = [
        'form_id',
        'scores',
        'notes',
        'image_path',
    ];

    /**
     * Casting atribut.
     */
    protected $casts = [
        'scores' => 'array', // Secara otomatis mengubah JSON menjadi array PHP
    ];
}