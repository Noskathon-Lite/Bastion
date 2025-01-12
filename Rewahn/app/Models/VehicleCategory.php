<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $min_price
 * @property string $max_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vehicle> $vehicles
 * @property-read int|null $vehicles_count
 * @method static \Database\Factories\VehicleCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VehicleCategory extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleCategoryFactory> */
    use HasFactory;
    protected $fillable = ["name", "min_price", "max_price"];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
