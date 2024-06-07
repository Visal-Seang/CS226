<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'firstname',
        'lastname',
        'phone_number',
        'date_of_birth',
        'address',
        'profile',
        'username',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'client_id', 'client_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'client_id', 'client_id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'client_id', 'client_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'client_id', 'client_id');
    }
}
