<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterCategory;

class PostCategory extends Model
{
    use HasFactory;

    public function masterCategory(): HasOne
    {
        return $this->HasOne(MasterCategory::class, 'id', 'master_category_id');
    }
}
