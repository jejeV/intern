<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentars';

    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function childs(){
        return $this->hasMany(Komentar::class,'parent');
    }
}
