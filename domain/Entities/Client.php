<?php

namespace Domain\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'document_number',
        'birthday',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
      'deleted_at'
    ];
}
