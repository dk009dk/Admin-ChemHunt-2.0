@push('head')
    <meta name="robots" content="noindex" />
    <link
          href="{{ route('platform.resource', ['orchid', 'favicon.svg']) }}"
          sizes="any"
          type="image/svg+xml"
          id="favicon"
          rel="icon"
    >
@endpush

<div class="h2 fw-light d-flex align-items-center">
    <p class="ms-3 my-0 d-none d-sm-block">
        ChemHunt 2.0
        <small class="align-top opacity">Admin</small>
    </p>
</div>
