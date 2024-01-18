<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'city',
        'province',
        'postal_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
