<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailB extends Model
{
    use HasFactory;

    protected $table = 'detail_b_s';

    protected $guarded = ['id'];

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public static function createLog($service_id, $detail_b)
    {
        DetailB::create([
            'service_id' => $service_id,
            'detail_b' => $detail_b
        ]);
    }
}
