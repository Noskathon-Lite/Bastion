<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $rental_id
 * @property string $latitude
 * @property string $longitude
 * @property string $recorded_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Database\Factories\GpsLogFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereRecordedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GpsLog whereVehicleId($value)
 * @mixin \Eloquent
 */
class GpsLog extends Model
{
    /** @use HasFactory<\Database\Factories\GpsLogFactory> */
    use HasFactory;

    protected $fillable = ["vehicle_id","rental_id", "latitude", "longitude", "timestamp"];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
