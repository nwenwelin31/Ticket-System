<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Label extends Model
{
    use HasFactory;
    public function ticket()
    {
        return $this->belongsToMany(Ticket::class,'label_tickets');
    }
}
