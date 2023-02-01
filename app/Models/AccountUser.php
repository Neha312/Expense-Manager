<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountUser extends Model
{
    protected $table = 'account_user';
    use HasFactory;
    protected $fillable = ['account_id', 'user_id'];
}
