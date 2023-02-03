<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'account_name', 'type', 'balance'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'account_user', 'account_id', 'user_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
