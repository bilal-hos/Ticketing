<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    // Define the relationship with the assigned user
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    protected $fillable = [
        'name',
        'description',
        'status',
        'dead_line',
        'creator_id',
        'assigned_user_id',
    ];

}
