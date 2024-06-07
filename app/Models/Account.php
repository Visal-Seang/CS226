<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $primaryKey = 'account_id';
    protected $fillable = [
        'client_id',
        'account_number',
        'account_type',
        'balance',
        'status',
        'interest_rate',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'account_id', 'account_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'account_id', 'account_id');
    }
}
