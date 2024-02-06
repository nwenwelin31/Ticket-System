<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Label;

class Ticket extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function Label()
    {
        return $this->hasMany(Label::class);
    }
}
