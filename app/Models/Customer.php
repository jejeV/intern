<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = ['id'];

    protected $date = ['create_id'];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function stasiun()
    {
        return $this->belongsTo(Stasiun::class);
    }
}
