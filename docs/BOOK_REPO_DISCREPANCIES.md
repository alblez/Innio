# Book vs. Repository Discrepancies

The book's private reference repository (last updated 2020) does not
perfectly match the book's 2nd edition text (2022). This file documents
known differences and the decisions made for this project.

## Naming: Client vs. Customer

- **Book text:** Uses "Customer" in DTO teaching examples (CustomerData
  with name, email, birth_date)
- **Repository:** Uses "Client" with fields: number, name
- **Decision:** This project uses Client. The CustomerData in the book is
  a generic teaching example, not the project entity.

## Invoice Fields

- **Book text:** Mentions `type` field (Debit/Credit) and `invoice_date`
- **Repository:** Has neither. Status field only.
- **Decision:** Follow repository. Invoice has: client_id, number,
  total_price, status. The type/invoice_date references in the book are
  from a different example context.

## InvoiceLine Price Columns

- **Book text:** References `total_price` and `total_price_excluding_vat`
- **Repository:** Uses `total_price_excluding_vat` and
  `total_price_including_vat`
- **Decision:** Follow repository. Two explicit columns.

## Invoice States

- **Book simplified examples:** 2–3 states (Pending, Paid, sometimes Canceled)
- **Repository:** 4 states (Pending, Paid, Overdue, Canceled)
- **Video transcript:** Confirms 4 states
- **Decision:** Four states with transitions matching the repository.

## Domain Names

- **Repository:** Plural (Invoices, Clients, Bookings, Units, Payments, PDFs)
- **Spatie production projects:** Singular (Error, Notification, Campaign)
- **Decision:** Singular. See AD-1 in ARCHITECTURE_DECISIONS.md.

## Booking/Unit as Part of the System

- **Book text:** Uses Booking/Unit examples sporadically (testing chapter,
  models chapter) without making it explicit they're part of one system
- **Repository:** Bookings and Units are full domains with Actions, DTOs,
  QueryBuilders, Collections, and an application module under App/Admin
- **Video transcripts:** Confirm the system is "an application to manage
  hotel bookings" with invoicing
- **Decision:** Include all six domains for the complete learning experience.

## Additional Domains in Repository

- **Pdfs domain:** Contains CreatePdfAction, PDF DTO, ToPdf interface.
  The book mentions PDF generation in the Actions chapter but doesn't show
  it as a separate domain.
- **Decision:** Include. It exercises cross-domain interfaces.

## Support Namespace Contents (Repository)

- AccountancyPlatform (gateway + DTOs for external sync)
- Period value object (used by Booking)
- FuzzyFilter (for query builders)
- Flash helper
- Playbooks (enhanced seeders)
- Test factories base classes
- Middleware (standard Laravel middleware)

These inform what we build in Support as we progress through chapters.
