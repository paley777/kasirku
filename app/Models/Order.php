<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['good'];

    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
