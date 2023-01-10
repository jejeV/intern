<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTicket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public static function createLogTicket($user_id, $keterangan, $ticket_id)
    {
        LogTicket::create([
            'users_id' => $user_id,
            'keterangan' => $keterangan,
            'ticket_id' => $ticket_id,
        ]);
    }
}
