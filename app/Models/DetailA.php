<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailA extends Model
{
    use HasFactory;

    protected $table = 'detail_a_s';

    protected $guarded = ['id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public static function createLog($service_id, $detail_a)
    {
        DetailA::create([
            'service_id' => $service_id,
            'detail_a' => $detail_a
        ]);
    }
}
