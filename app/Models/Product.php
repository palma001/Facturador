<?php

namespace App\Models;
use App\Helpers\ProductHelper;

class Product extends Base
{
    /**
        * @OA\Schema(
        *   schema="Product",
        *   type="object",
        *   @OA\Property(
        *       property="code",
        *       type="string",
        *       required={"false"},
        *       description="The Product code"
        *   ),
        *   @OA\Property(
        *       property="name",
        *       type="string",
        *       required={"true"},
        *       description="The Productname"
        *   ),
        *   @OA\Property(
        *       property="description",
        *       type="string",
        *       required={"true"},
        *       description="The Product description"
        *   ),
        *   @OA\Property(
        *       property="category_id",
        *       type="number",
        *       required={"false"},
        *       description="The Product category"
        *   ),
        *   @OA\Property(
        *       property="brand_id",
        *       type="number",
        *       required={"false"},
        *       description="The Product brand"
        *   ),
        *   @OA\Property(
        *       property="attribute_types",
        *       type="array",
        *       required={"false"},
        *       @OA\Items(
        *           @OA\Property(property="attribute_type_id", type="number"),
        *           @OA\Property(property="description", type="string"),
        *           @OA\Property(property="user_created_id", type="number"),
        *       ),
        *       description="The Product attribute_types"
        *   ),
        *   @OA\Property(
        *       property="user_created_id",
        *       type="number",
        *       required={"true"},
        *       example=1,
        *       description="The Users crete"
        *   ),
        *    @OA\Property(
        *       property="user_updated_id",
        *       type="number",
        *       required={"false"},
        *       example=1,
        *       description="The Users update"
        *   ),
        * )
    */
    public static $filterable = [
        'user_created_id'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'category_id',
        'brand_id',
        'user_created_id',
        'user_updated_id'
    ];
    /**
     * The attributes that are mass with.
     *
     * @var array
     */
    protected $with = [
        'category',
        'brand',
        'attributeTypes'
    ];

    protected $appends = ['stock'];

    /**
     * The stock that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getStockAttribute()
    {
        return ProductHelper::getStock($this);
    }
    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * The attributeTypes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeTypeProducts()
    {
        return $this->hasMany(AttributeTypeProduct::class);
    }
    /**
     * The attributeTypes that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeTypes()
    {
        return $this->belongsToMany(AttributeType::class)
            ->withPivot([
                'description'
            ]);
    }

    /**
     * Get all of the billElectronicDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billElectronicDetails()
    {
        return $this->hasMany(BillElectronicDetail::class);
    }

    /**
     * Get all of the purcharseDetails for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purcharseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

        /**
     * Get all of the deployments for the project.
     */
    public function branchOffices()
    {
        return $this->belongsToMany(BranchOffice::class, 'purchase_details', 'product_id', 'branch_office_id');
    }
}
