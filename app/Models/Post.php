<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
class Post extends Model
{
    use HasFactory;

    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
