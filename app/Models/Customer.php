<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = ['id'];

    protected $dates = ['active_date'];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function stasiun()
    {
        return $this->belongsTo(Stasiun::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
