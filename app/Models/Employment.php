<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;



class Employment extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id', 'desig_company', 'from_date', 'to_date', 'responsibility_detail',
    ];
    protected $dates = ['from_date','to_date'];
    protected $table = 'user_employment';


    public function date_format()
    {
        return 'm/d/Y';
    }

    public function setFromDateAttribute($date)
    {
        $tmpdt = explode('/',$date);
        $this->attributes['from_date'] = $tmpdt[2].'-'.$tmpdt[0].'-'.$tmpdt[1];
    }
    public function setToDateAttribute($date)
    {
        $tmpdt = explode('/',$date);
        $this->attributes['to_date'] = $tmpdt[2].'-'.$tmpdt[0].'-'.$tmpdt[1];
    }

}
