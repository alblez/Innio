<?php

namespace Domain\Invoice\Actions;

use Domain\Invoice\DataTransferObjects\InvoiceLineData;

class CalculateInvoicePricesAction
{
    /**
     * @return array{
     *     total_price_excluding_vat: int,
     *     total_price_including_vat: int
     * }
     */
    public function execute(InvoiceLineData $lineData): array
    {
        $totalExcludingVat = $lineData->item_amount * $lineData->item_price;

        $totalIncludingVat = $totalExcludingVat
            + (int) ceil($totalExcludingVat * $lineData->vat_percentage / 100);

        return [
            'total_price_excluding_vat' => $totalExcludingVat,
            'total_price_including_vat' => $totalIncludingVat,
        ];
    }
}

