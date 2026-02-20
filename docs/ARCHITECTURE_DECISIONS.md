# Architecture Decisions

Decisions made during project setup, with rationale.

## AD-1: Singular Domain Names

**Decision:** Domain folders use singular names (Invoice, Client, Unit).

**Context:** The book's teaching repo (2020) uses plural (Invoices, Clients).
The author's production projects at Spatie (Flare, Mailcoach) use singular
(Error, Notification, Campaign, Audience).

**Rationale:** A domain represents a bounded context, a concept. "The Invoice
domain" reads more naturally than "the Invoices domain." The author's own
evolution toward singular in production code confirms this direction.

## AD-2: Client, Not Customer

**Decision:** The entity is named Client, matching the book's repository.

**Context:** The book's text uses "Customer" in the DTO teaching examples
(CustomerData with name, email, birth_date). The actual repository entity
is Client with fields: number, name. The CustomerData example is a generic
teaching tool, not the project entity.

## AD-3: Custom Application Class in src/App

**Decision:** All application code lives under src/App, src/Domain, and
src/Support with a custom Application class override.

**Implementation:**
- `src/App/Application.php` extends `Illuminate\Foundation\Application`
- Sets `$namespace = 'App\\'` and calls `useAppPath(base_path('src/App'))`
- `bootstrap/app.php` imports `App\Application` instead of the framework class
- `composer.json` PSR-4 maps: `App\\` -> `src/App/`, `Domain\\` -> `src/Domain/`,
  `Support\\` -> `src/Support/`

## AD-4: No Authentication

**Decision:** No auth for the learning project. Anyone accessing the system
is implicitly an admin.

**Rationale:** Auth is an application-layer concern. Adding it later requires
middleware in bootstrap/app.php and possibly policies, none of which touch
domain code. The book doesn't cover auth patterns.

## AD-5: SQLite for Local Development

**Decision:** SQLite as the default database.

**Rationale:** Laravel 12 default. Zero config. Sufficient for learning.
Switch to PostgreSQL if production-like behavior is needed.

## AD-6: Pest for Testing

**Decision:** Pest as the testing framework.

**Rationale:** Laravel 12 scaffolds Pest by default. The book's 2nd edition
leans toward Pest syntax. The testing patterns (setup-execute-assert,
immutable factories, mock actions) are framework-agnostic.

## AD-7: spatie/laravel-data for HTTP-Facing DTOs

**Decision:** Use spatie/laravel-data (v4) for DTOs that interact with HTTP
requests. Use plain PHP classes for internal domain value objects.

**Context:** The book predates spatie/laravel-data but recommends the older
spatie/data-transfer-object package. The book's 2nd edition covers
spatie/laravel-data directly. v4.19.1 supports Laravel 12.

## AD-8: Prices Stored as Integers (Cents)

**Decision:** All monetary values stored as integers representing cents.

**Rationale:** Avoids floating-point precision issues. Aligns with the
book's examples where total_price, item_price are all integer columns.

## AD-9: Four Invoice States

**Decision:** Invoice has four states: Pending, Paid, Overdue, Canceled.

**Context:** The book's text mentions three states in simplified examples.
The repository implements four. The States transcript confirms four:
"pending, paid, or overdue" plus "invoices can also be canceled."

## AD-10: InvoiceLine Price Fields

**Decision:** InvoiceLine stores both `total_price_excluding_vat` and
`total_price_including_vat` as separate columns.

**Context:** The book's text mentions `total_price` and
`total_price_excluding_vat`. The repository uses `total_price_excluding_vat`
and `total_price_including_vat`. We follow the repository.
