<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTicket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public static function createLogTicket($user_id, $keterangan, $ticket_id)
    {
        LogTicket::create([
            'user_id' => $user_id,
            'keterangan' => $keterangan,
            'ticket_id' => $ticket_id,
        ]);
    }
}
