<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_types';
    protected $primaryKey = 'prd_type_id';

    protected $fillable=[

    ];
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
