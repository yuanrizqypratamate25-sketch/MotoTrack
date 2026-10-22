<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#111113">
    <meta name="description" content="MotoTrack — pengelolaan inventaris sepeda motor.">
    <title>@yield('title', 'MotoTrack') | Inventaris Sepeda Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            color-scheme: dark;
            --ink: #f3f4f6;
            --muted: #a1a1aa;
            --line: #303036;
            --brand: #ef4444;
            --brand-dark: #dc2626;
            --panel: #19191d;
            --panel-soft: #222228;
            --page: #101012;
        }
        body { background: radial-gradient(ellipse at top, #1b1b20 0, var(--page) 48rem); color: var(--ink); min-height: 100vh; }
        .navbar { background: rgba(18,18,21,.94) !important; border-bottom: 1px solid var(--line); backdrop-filter: blur(14px); }
        .navbar-brand { color: var(--ink) !important; }
        .brand-mark { display:inline-grid; place-items:center; width:40px; height:40px; border-radius:12px; color:#fff; background:linear-gradient(145deg,#ff5555,#b91c1c); font-weight:900; box-shadow:0 5px 20px #ef444433; }
        .page-wrap { max-width: 1420px; }
        .eyebrow { font-size:.73rem; letter-spacing:.14em; text-transform:uppercase; font-weight:800; color:#f87171; }
        .page-title { letter-spacing:-.035em; font-weight:850; color:#fafafa; }
        .surface { border:1px solid var(--line); border-radius:18px; background:linear-gradient(145deg,#1b1b20,#17171a); box-shadow:0 14px 35px rgba(0,0,0,.18); }
        .stat-card { height:100%; padding:1.2rem 1.3rem; position:relative; overflow:hidden; }
        .stat-card:after { content:''; position:absolute; top:0; left:1.3rem; right:1.3rem; height:2px; background:linear-gradient(90deg,#ef4444,transparent); }
        .stat-label { color:var(--muted); font-size:.86rem; }
        .stat-value { font-size:clamp(1.25rem, 2vw, 1.75rem); font-weight:850; letter-spacing:-.035em; color:#fafafa; overflow-wrap:anywhere; }
        .text-secondary { color:var(--muted) !important; }
        .text-bg-light, .bg-light { color:#e4e4e7 !important; background-color:var(--panel-soft) !important; }
        .badge.text-bg-light { color:#d4d4d8 !important; border-color:#393940 !important; }
        .border, .border-top, .border-bottom { border-color:var(--line) !important; }
        .btn { border-radius:10px; font-weight:650; transition:transform .15s ease,background-color .15s ease; }
        .btn:hover { transform:translateY(-1px); }
        .btn-primary { --bs-btn-bg:var(--brand); --bs-btn-border-color:var(--brand); --bs-btn-hover-bg:var(--brand-dark); --bs-btn-hover-border-color:var(--brand-dark); --bs-btn-active-bg:#b91c1c; --bs-btn-active-border-color:#b91c1c; }
        .btn-outline-primary { --bs-btn-color:#f87171; --bs-btn-border-color:#7f3035; --bs-btn-hover-bg:#ef4444; --bs-btn-hover-border-color:#ef4444; --bs-btn-hover-color:#fff; }
        .btn-outline-danger { --bs-btn-color:#f87171; --bs-btn-border-color:#7f3035; --bs-btn-hover-bg:#dc2626; --bs-btn-hover-border-color:#dc2626; }
        .btn-light { --bs-btn-color:#e4e4e7; --bs-btn-bg:#29292f; --bs-btn-border-color:#393940; --bs-btn-hover-color:#fff; --bs-btn-hover-bg:#38383f; --bs-btn-hover-border-color:#494950; }
        .btn-outline-secondary { --bs-btn-color:#d4d4d8; --bs-btn-border-color:#45454d; --bs-btn-hover-bg:#38383f; --bs-btn-hover-border-color:#52525b; }
        .form-control, .form-select, .input-group-text { color:#f4f4f5; background-color:#111114; border-color:#3a3a42; border-radius:10px; padding:.68rem .85rem; }
        .form-control::placeholder { color:#71717a; }
        .form-control:focus, .form-select:focus { color:#fff; background-color:#151519; border-color:#ef4444; box-shadow:0 0 0 .2rem rgba(239,68,68,.16); }
        .form-control:disabled { background-color:#27272a; }
        .form-text { color:#a1a1aa; }
        .form-label { color:#e4e4e7; }
        .table { --bs-table-color:#e4e4e7; --bs-table-bg:transparent; --bs-table-border-color:#303036; --bs-table-striped-color:#e4e4e7; --bs-table-striped-bg:#202025; --bs-table-hover-color:#fff; --bs-table-hover-bg:#282329; }
        .table > :not(caption) > * > * { padding:1rem .9rem; border-bottom-color:#303036; vertical-align:middle; }
        .table thead th { color:#a1a1aa; background:#202025; font-size:.76rem; text-transform:uppercase; letter-spacing:.06em; font-weight:800; white-space:nowrap; }
        .motor-name { font-weight:800; color:#fafafa; }
        .motor-description { color:var(--muted); font-size:.88rem; min-width:260px; max-width:420px; }
        .stock-pill { display:inline-block; padding:.38rem .65rem; border-radius:999px; background:#153b2a; color:#86efac; font-weight:750; font-size:.8rem; white-space:nowrap; }
        .stock-empty { background:#3a2022; color:#fca5a5; }
        .money { font-weight:800; color:#fca5a5; white-space:nowrap; }
        .footer-note { color:#71717a; font-size:.8rem; border-color:var(--line) !important; }
        .required-mark { color:#f87171; }
        .alert-success { color:#bbf7d0; background:#142b20; }
        .alert-danger { color:#fecaca; background:#351b1e; }
        .invalid-feedback { color:#fca5a5; }
        .is-invalid { border-color:#ef4444 !important; }
        .pagination { --bs-pagination-bg:#1b1b20; --bs-pagination-color:#d4d4d8; --bs-pagination-border-color:#38383f; --bs-pagination-hover-bg:#303036; --bs-pagination-hover-color:#fff; --bs-pagination-hover-border-color:#52525b; --bs-pagination-active-bg:#dc2626; --bs-pagination-active-border-color:#dc2626; --bs-pagination-disabled-bg:#17171a; --bs-pagination-disabled-color:#71717a; --bs-pagination-disabled-border-color:#303036; }
        a { color:#f87171; } a:hover { color:#fca5a5; }
        .link-secondary { color:#a1a1aa !important; } .link-secondary:hover { color:#f87171 !important; }
        .required-mark { color:#f87171; }
        @media (max-width: 767.98px) { .page-header { align-items:flex-start !important; flex-direction:column; } .table > :not(caption) > * > * { padding:.8rem .65rem; } }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container page-wrap py-1">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('sepeda-motor.index') }}">
            <span class="brand-mark">M</span>
            <span>MotoTrack <span class="text-secondary fw-normal small">/ INVENTORY</span></span>
        </a>
        <span class="badge rounded-pill text-bg-light border px-3 py-2">MOTORCYCLE MANAGEMENT</span>
    </div>
</nav>

<main class="container page-wrap py-4 py-lg-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm" role="alert">
            <div class="fw-bold mb-1">Data belum bisa disimpan.</div>
            <div>Periksa kembali kolom yang ditandai pada formulir.</div>
        </div>
    @endif

    @yield('content')
    <footer class="footer-note mt-5 pt-3 border-top text-center">
        MotoTrack · Sistem inventaris sepeda motor
    </footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
