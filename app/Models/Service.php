<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $guarded = ['id'];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function stasiun()
    {
        return $this->belongsTo(Stasiun::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pernagkat()
    {
        return $this->belongsTo(Perangkat::class);
    }
}
