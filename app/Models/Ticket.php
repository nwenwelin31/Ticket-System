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
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function Label()
    {
        return $this->belongsToMany(Label::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
}
