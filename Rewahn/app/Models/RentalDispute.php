<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $rental_id
 * @property int $reported_by
 * @property string $type
 * @property string $description
 * @property string $status
 * @property string|null $resolution
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Rental $rental
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\RentalDisputeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereRentalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereReportedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereResolution($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RentalDispute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RentalDispute extends Model
{
    /** @use HasFactory<\Database\Factories\RentalDisputeFactory> */
    use HasFactory;

    protected $fillable = ["rental_id", "user_id","type", "description","status","resolution","timestamps"];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
