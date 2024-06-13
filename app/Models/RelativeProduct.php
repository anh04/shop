<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelativeProduct extends Model
{
    use HasFactory;
    protected $table = 'relative_products';
    protected $primaryKey = 'rtv_prd_id';

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
