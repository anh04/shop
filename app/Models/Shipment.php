<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $table = 'shipments';
    protected $primaryKey = 'shipment_id';
    protected $fillable = [
        'shipment_city',
        'shipment_district',
        'shipment_ward',
        'shipment_address',
        'full_name',
        'user_id',
        'shipment_email',
        'shipment_phone',
        'shipment_company',
        'shipment_note',
        'is_invoice'
    ];

    protected $guarded = [];
}
