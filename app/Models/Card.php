<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $primaryKey = 'card_id';
    protected $fillable = [
        'account_id',
        'client_id',
        'card_number',
        'expiry_date',
        'start_date', 
        'end_date', 
        'status',
        'cvv',
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
