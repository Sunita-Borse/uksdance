<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchDetail extends Model
{
    use HasFactory;
    protected $fillable = ['batch_id','day', 'start_time', 'end_time'];
public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
