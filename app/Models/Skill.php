<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;



class Skill extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id', 'skill_name', 'exp_months', 'expertise', 
    ];
    protected $table = 'user_skill';





}
