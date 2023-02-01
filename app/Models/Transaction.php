<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'account_id', 'category', 'amount', 'type', 'entry_date'];
    public function accounts()
    {
        return $this->belongsTo(Account::class);
    }
}
