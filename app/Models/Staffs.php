<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'firstName',
        'lastName',
        'position',
        'email',
    ];
}
