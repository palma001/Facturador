<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillElectronicDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_electronic_id',
        'product_id',
        'amount',
        'price',
        'discount',
        'igv',
        'purchase_price',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [];

    public function kardexReports()
    {
        return $this->morphMany(KardexReport::class, 'reportable');
    }
    /**
     * Get the product that owns the BillElectronicDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the billElectronic that owns the BillElectronicDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billElectronic()
    {
        return $this->belongsTo(BillElectronic::class);
    }

}
