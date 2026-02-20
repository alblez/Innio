# Version Deltas: Book vs. This Project

The book focuses on PHP 8.2 and Laravel 9.
This project focuses on PHP 8.4+ and Laravel 12.

Only differences that affect code you write are listed here.

## Laravel 12: Slim Skeleton

**What changed:** No more `app/Http/Kernel.php`, `app/Console/Kernel.php`,
or `app/Exceptions/Handler.php`. Middleware, exception handling, and console
scheduling are configured via closures in `bootstrap/app.php`. The `config/`
directory ships nearly empty.

**Impact:** Chapter 1's namespace restructuring accounts for this. The
custom Application class override still works. Chapter 9's middleware
registration uses `->withMiddleware()` in bootstrap/app.php instead of a
Kernel class.

## PHP 8.4: Asymmetric Visibility

**What changed:** Properties can declare separate read/write visibility:
`public private(set) string $name`.

**Impact:** Useful for DTOs that should be publicly readable but only
settable during construction. Used on State classes for the injected model
property: `public protected(set) Invoice $invoice`.

## PHP 8.4: Property Hooks

**What changed:** Properties can have `{ get { ... } set { ... } }` blocks.

**Impact:** Useful on plain value objects (e.g., Money) for computed
accessors. Less relevant on spatie/laravel-data classes where the package
handles accessors internally.

## PHP 8.4: Implicit Nullable Deprecation

**What changed:** `function foo(string $param = null)` without `?string`
emits a deprecation warning.

**Impact:** All nullable parameters throughout the project use explicit
`?Type` or `Type|null` syntax.

## PHP 8.4: Direct Instantiation Chains

**What changed:** `new Foo()->method()` is valid syntax.

**Impact:** Useful for simple value objects and DTOs. Actions with injected
dependencies still require container resolution.

## Laravel 11+: Context API

**What changed:** `Context::add()` injects key-value data that flows across
HTTP requests, into queued jobs, and through to logs.

**Impact:** Useful for correlation IDs and audit metadata in Chapter 12.
Does not replace DTOs for business data.

## Laravel 12: Container Null-Default Resolution

**What changed:** The container respects null defaults on constructor
parameters. `?SomeService $service = null` Will receive null, not a
resolved instance.

**Impact:** Be explicit about required vs. optional dependencies in Actions.

