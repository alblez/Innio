<?php

namespace Domain\Payment\Models;

use Domain\Invoice\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id',
        'type',
        'price',
        'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'paid_at' => 'datetime',
        ];
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}

