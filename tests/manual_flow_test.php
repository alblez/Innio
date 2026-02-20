<?php

use Domain\Client\Models\Client;
use Domain\Unit\Models\Unit;
use Domain\Booking\DataTransferObjects\BookingData;
use Domain\Booking\Actions\CreateBookingAction;
use Domain\Invoice\DataTransferObjects\CreateInvoiceData;
use Domain\Invoice\Actions\CreateInvoiceAction;
use Domain\Payment\Actions\CreatePaymentAction;

// --- Client ---
$client = Client::create(['number' => 'C-001', 'name' => 'Acme Hotel Group']);
echo "Client: {$client->name} (ID: {$client->id})" . PHP_EOL;

// --- Unit ---
$unit = Unit::create(['name' => 'Suite 201', 'type' => 'deluxe', 'active' => true]);
echo "Unit: {$unit->name}" . PHP_EOL;

// --- Booking ---
$bookingData = BookingData::from([
    'name' => 'Summer stay',
    'starts_at' => '2026-03-01T14:00:00+00:00',
    'ends_at' => '2026-03-04T11:00:00+00:00',
    'client_id' => $client->id,
    'unit_id' => $unit->id,
]);
$booking = app(CreateBookingAction::class)->execute($bookingData);
echo "Booking: {$booking->name} ({$booking->starts_at} to {$booking->ends_at})" . PHP_EOL;

// --- Invoice ---
$invoiceData = CreateInvoiceData::from([
    'client_id' => $client->id,
    'invoice_lines' => [
        [
            'description' => '3 nights Suite 201',
            'item_amount' => 3,
            'item_price' => 15000,
            'vat_percentage' => 19,
        ],
        [
            'description' => 'Laundry service',
            'item_amount' => 1,
            'item_price' => 2500,
            'vat_percentage' => 19,
        ],
    ],
]);
$invoice = app(CreateInvoiceAction::class)->execute($invoiceData);
echo "Invoice #{$invoice->number} | Total: {$invoice->total_price} cents" . PHP_EOL;

foreach ($invoice->invoiceLines as $line) {
    echo "  Line: {$line->description} | Excl VAT: {$line->total_price_excluding_vat} | Incl VAT: {$line->total_price_including_vat}" . PHP_EOL;
}

// --- Payment ---
$payment = app(CreatePaymentAction::class)->execute($invoice, 'credit_card');
echo "Payment: {$payment->price} cents via {$payment->type} at {$payment->paid_at}" . PHP_EOL;

echo PHP_EOL . "=== All done ===" . PHP_EOL;
