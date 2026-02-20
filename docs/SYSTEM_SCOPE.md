# System Scope

## Users

One role: **Admin**. No authentication or authorization is implemented.
Anyone who accesses the system is implicitly an admin. Auth can be added
later as an application-layer concern without touching domain code.

## Entities

| Entity      | Domain  | Key Fields                                                        |
|-------------|---------|-------------------------------------------------------------------|
| Client      | Client  | number, name                                                      |
| Unit        | Unit    | name, type, active                                                |
| Booking     | Booking | name, starts_at, ends_at, unit_id, client_id                      |
| Invoice     | Invoice | client_id, number, total_price, status                            |
| InvoiceLine | Invoice | invoice_id, description, item_amount, item_price, vat_percentage, |
|             |         | total_price_excluding_vat, total_price_including_vat              |
| Payment     | Payment | invoice_id, type, price, paid_at                                  |

## Domains

| Domain   | Contains                                    | Cross-Domain Interfaces |
|----------|---------------------------------------------|-------------------------|
| Client   | Client model                                | -                       |
| Unit     | Unit model, QueryBuilder, Collection        | -                       |
| Booking  | Booking model, Actions, DTOs, Observers     | References Client, Unit |
| Invoice  | Invoice, InvoiceLine, States, Transitions,  | References Client       |
|          | Actions, DTOs, QueryBuilder, Collection,    | Implements Payable,     |
|          | Events, Subscribers                         | ToPdf                   |
| Payment  | Payment model, Actions, Payable interface   | -                       |
| Pdf      | CreatePdfAction, Pdf DTO, ToPdf interface   | -                       |

## What's Covered

- CRUD for Units, Clients, Bookings, Invoices
- Invoice state lifecycle (Pending, Paid, Overdue, Canceled) with transitions
- VAT calculations on invoice lines
- Invoice number generation
- Payment recording
- PDF generation (stubbed action, no real PDF engine)
- Invoice mail sending (stubbed action, no real email delivery)
- Accountancy platform sync (stubbed gateway in Support namespace)
- Filterable/sortable indexes for invoices and bookings
- Full test suite using Pest with custom test factories

## What's NOT Covered

- Authentication and authorization
- Real payment provider integration
- Actual PDF rendering or email delivery
- Unit occupancy validation
- Financial reporting beyond what the book exercises
- API endpoints (unless needed for a specific chapter)
- Frontend beyond minimal Blade views to verify ViewModels
