<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function createLog($user_id, $keterangan)
    {
        Log::create([
            'users_id' => $user_id,
            'keterangan' => $keterangan
        ]);
    }
}
