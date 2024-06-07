<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $primaryKey = 'loan_id';
    protected $fillable = [
        'account_id',
        'client_id',
        'amount',
        'interest_rate',
        'duration',
        'status',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
}
