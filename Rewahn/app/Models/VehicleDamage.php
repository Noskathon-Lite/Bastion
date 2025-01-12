<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $user_id
 * @property string $description
 * @property string $status
 * @property string|null $images
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Database\Factories\VehicleDamageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VehicleDamage whereVehicleId($value)
 * @mixin \Eloquent
 */
class VehicleDamage extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleDamageFactory> */
    use HasFactory;

    protected $fillable = ["vehicle_id", "user_id", "description","status","images"];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
