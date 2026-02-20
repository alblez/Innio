<?php

namespace Domain\Invoice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceLine extends Model
{
    protected $fillable = [
        'invoice_id',
        'description',
        'item_amount',
        'item_price',
        'vat_percentage',
        'total_price_excluding_vat',
        'total_price_including_vat',
    ];

    protected function casts(): array
    {
        return [
            'item_amount' => 'integer',
            'item_price' => 'integer',
            'vat_percentage' => 'integer',
            'total_price_excluding_vat' => 'integer',
            'total_price_including_vat' => 'integer',
        ];
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
