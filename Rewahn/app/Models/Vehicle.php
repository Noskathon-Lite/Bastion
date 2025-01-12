<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $base_price
 * @property string $daily_rate
 * @property string $fuel_capacity
 * @property bool $gps_enabled
 * @property string|null $gps_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\VehicleCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VehicleDamage> $damages
 * @property-read int|null $damages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GeoFence> $geoFences
 * @property-read int|null $geo_fences_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GpsLog> $gpsLogs
 * @property-read int|null $gps_logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VehicleImage> $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Rental> $rentals
 * @property-read int|null $rentals_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\VehicleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereBasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDailyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereFuelCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereGpsEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereGpsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vehicle whereUserId($value)
 * @mixin \Eloquent
 */
class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;
    protected $fillable = [
        "user_id",
        "category_id",
        "title",
        "description",
        "base_price",
        "daily_rate",
        "fuel_capacity",
        "gps_enabled",
        "gps_type",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(VehicleCategory::class, "category_id");
    }

    public function damages()
    {
        return $this->hasMany(VehicleDamage::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function gpsLogs()
    {
        return $this->hasMany(GpsLog::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function geoFences()
    {
        return $this->belongsToMany(GeoFence::class);
    }
}
