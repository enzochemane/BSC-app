<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ticket extends Model
{


    use HasFactory;
    protected $fillable = [
        'subject',
        'problem',
        'description',
        'status',
        'user_id',
        'agent_id',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
