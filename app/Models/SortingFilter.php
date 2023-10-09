<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SortingFilter extends Model
{
    use HasFactory;

    public function sortingFilterMethods(): HasMany{
        return $this->hasMany(SortingFilterMethod::class, 'sf_id');
    }
}
