<?php

namespace Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Record extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'author',
        'release_year',
        'category',
        'quantity'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'quantity' => 'int'
    ];

    public function scopeCategory(Builder $query)
    {
        $search = request()->get('category');
        if (!$search) {
            return $query;
        }

        return $query->where('category', $search);
    }

    public function scopeReleaseYear(Builder $query)
    {
        $search = request()->get('release_year');
        if (!$search) {
            return $query;
        }

        return $query->where('release_year', $search);
    }

    public function scopeAuthor(Builder $query)
    {
        $search = request()->get('author');
        if (!$search) {
            return $query;
        }
        $value = mb_strtolower($search);
        return $query->where('author', 'like', "%$value%");
    }

    public function scopeName(Builder $query)
    {
        $search = request()->get('name');
        if (!$search) {
            return $query;
        }
        $value = mb_strtolower($search);
        return $query->where('name', 'like', "%$value%");
    }
}
