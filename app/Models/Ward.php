<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = 'wards';
    protected $primaryKey = 'ward_id';
    protected $fillable = [
        'ward_name',
        'ward_code'
    ];
}
