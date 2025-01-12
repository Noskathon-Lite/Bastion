<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $latitude
 * @property string $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vehicle> $vehicles
 * @property-read int|null $vehicles_count
 * @method static \Database\Factories\GeoFenceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GeoFence whereVehicleId($value)
 * @mixin \Eloquent
 */
class GeoFence extends Model
{
    /** @use HasFactory<\Database\Factories\GeoFenceFactory> */
    use HasFactory;
    protected $fillable = ["name", "coordinates"];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
