<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $renter_id
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property string|null $agreement_signed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RentalDispute> $disputes
 * @property-read int|null $disputes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Vehicle $vehicle
 * @method static \Database\Factories\RentalFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereAgreementSignedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereRenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Rental whereVehicleId($value)
 * @mixin \Eloquent
 */
class Rental extends Model
{
    /** @use HasFactory<\Database\Factories\RentalFactory> */
    use HasFactory;

    protected $fillable = [
        "vehicle_id",
        "user_id",
        "start_date",
        "end_date",
        "status",
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function disputes()
    {
        return $this->hasMany(RentalDispute::class);
    }
}
