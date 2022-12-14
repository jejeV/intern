<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;

    protected $table = 'perangkats';

    protected $guarded = ['id'];

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
