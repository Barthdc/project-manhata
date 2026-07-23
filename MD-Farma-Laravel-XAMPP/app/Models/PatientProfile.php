<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class PatientProfile extends Model
{
    protected $fillable = [
        'user_id',
        'birth_date',
        'gender',
        'phone',
        'address',
        'blood_type',
        'allergies',
        'medical_history',
        'current_medications',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }
}
