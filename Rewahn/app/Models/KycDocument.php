<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycDocument extends Model
{
    // Define the fillable properties to protect against mass assignment vulnerability
    protected $fillable = [
        'user_id',
        'document_type',
        'document_name',
        'file_path',
        'status',
        'admin_notes',
    ];

    // Relationship method to link the KYC document with a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
