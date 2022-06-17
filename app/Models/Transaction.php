<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_pembeli', 'like', '%' . $search . '%');
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
