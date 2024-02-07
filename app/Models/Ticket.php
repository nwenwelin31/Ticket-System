<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Label;
use App\Models\User;
use App\Models\Comment;

class Ticket extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Label()
    {
        return $this->belongsTo(Label::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
