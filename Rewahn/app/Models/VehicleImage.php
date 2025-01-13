<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $vehicle_id
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Database\Factories\VehicleImageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleImage whereVehicleId($value)
 * @mixin \Eloquent
 */
class VehicleImage extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleImageFactory> */
    use HasFactory;

    protected $fillable = ["vehicle_id", "image_path"];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
