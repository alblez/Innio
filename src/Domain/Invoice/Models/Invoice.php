<?php

namespace Domain\Invoice\Models;

use Domain\Client\Models\Client;
use Domain\Payment\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    protected $fillable = [
        'client_id',
        'number',
        'total_price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'number' => 'integer',
            'total_price' => 'integer',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function invoiceLines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
