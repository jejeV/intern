<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $guarded = ['id',];

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
