<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'user_id','event_id','fname','sname','phone','evt_id','ticket_code','email','qty','reference',
        'status','ticket','admitted'
    ];

    // public function user(){
    //     return $this->belongsTo('App\Models\User');
    // }

}
