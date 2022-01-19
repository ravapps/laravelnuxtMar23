<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;



class Education extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id', 'degree_name', 'degree_univ', 'year_passed', 'score_grade',
    ];
    protected $table = 'user_education';





}
