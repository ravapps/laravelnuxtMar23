<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;



class UserDetails extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id', 'about', 'hobbies', 'objective', 'income_tax_payee', 'passport','alt_email','mother','phone', 'father', 'dob', 'address', 'pincode', 'photo_path', 'resume_path', 'communication_preffered',
    ];
    protected $dates = ['dob'];
    protected $table = 'user_details';
    protected $appends = ['skills','educations','employments','user'];
    public function date_format()
    {
        return 'd/m/Y';
    }





    public function setDobAttribute($date)
    {
        $tmpdt = explode('/',$date);
        $this->attributes['dob'] = $tmpdt[2].'-'.$tmpdt[1].'-'.$tmpdt[0];
    }

    public function getSkillsAttribute()
        {
            return Skill::where('user_id','=',$this->user_id)->get();
        }

        public function getEducationsAttribute()
            {
                return Education::where('user_id','=',$this->user_id)->get();
            }

            public function getEmploymentsAttribute()
                {
                    return Employment::where('user_id','=',$this->user_id)->get();
                }
                public function getUserAttribute()
                    {
                        return User::where('id','=',$this->user_id)->get();
                    }


    public function userEducation()
    {
        //return $this->belongsToMany(Education::class, 'user_education')->withPivot('fields1', 'field2');
        return $this->belongsToMany(Education::class, 'user_education', 'user_id', 'user_id');
    }

    public function userSkill()
    {
        //return $this->belongsToMany(Education::class, 'user_education')->withPivot('fields1', 'field2');
        return $this->belongsToMany(Skill::class, 'user_skill', 'user_id', 'user_id');
    }

    public function userEmployment()
    {
        //return $this->belongsToMany(Education::class, 'user_education')->withPivot('fields1', 'field2');
        return $this->belongsToMany(Employment::class, 'user_employment', 'user_id', 'user_id');
    }






}
