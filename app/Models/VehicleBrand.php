<?php

namespace App\Models;

class VehicleBrand extends Base
{
    /**
     * @OA\Schema(
     *   schema="VehicleBrand",
     *   type="object",
     *   @OA\Property(
     *       property="name",
     *       type="string",
     *       required={"true"},
     *       description="The Vehicle brand name"
     *   ),
     *   @OA\Property(
     *       property="acronym",
     *       type="string",
     *       required={"true"},
     *       description="The Vehicle brand password"
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
     *       required={"true"},
     *       example=1,
     *       description="The Users update"
     *   ),
     * )
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acronym',
        'name',
        'user_created_id',
        'user_updated_id'
    ];

    public static $filterable = ["name", "acronym"];
}
