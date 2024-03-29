<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'no_hp' => 'encrypted',
        'username' => 'encrypted',
        'email' => 'encrypted',
        'password' => 'encrypted',
        'pin' => 'encrypted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'name_id');
    }
}
