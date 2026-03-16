<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...yaygF7ldDwpb8fjhA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('template/')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('template/')}}/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- Custom Modern UI Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            font-family: 'Inter', sans-serif !important;
            background-color: #f8f9fc !important;
        }
        
        /* Modern Cards */
        .card {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03) !important;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        
        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.04) !important;
        }

        .card-title {
            font-weight: 600 !important;
            color: #2b3445 !important;
            margin-bottom: 1.5rem !important;
        }

        /* Modern Tables */
        .table {
            border-collapse: separate !important;
            border-spacing: 0 8px !important;
            background: transparent !important;
        }
        
        .table thead th {
            border-bottom: none !important;
            border-top: none !important;
            color: #7d879c !important;
            font-weight: 600 !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem !important;
        }

        .table tbody tr {
            background-color: #ffffff !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02) !important;
            border-radius: 8px !important;
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.06) !important;
        }

        .table td {
            vertical-align: middle !important;
            border-top: none !important;
            padding: 1rem !important;
            color: #2b3445;
        }
        
        /* Rounded first and last children for modern table rows */
        .table tbody td:first-child { border-top-left-radius: 8px; border-bottom-left-radius: 8px; }
        .table tbody td:last-child { border-top-right-radius: 8px; border-bottom-right-radius: 8px; }

        /* Modern Buttons */
        .btn {
            border-radius: 8px !important;
            font-weight: 500 !important;
            padding: 0.5rem 1.25rem !important;
            transition: all 0.2s !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        }

        .btn-primary {
            background-color: #4e73df !important;
            border-color: #4e73df !important;
        }
        
        .btn-success {
            background-color: #1cc88a !important;
            border-color: #1cc88a !important;
        }
        
        .btn-danger {
            background-color: #e74a3b !important;
            border-color: #e74a3b !important;
        }

        /* Inputs and Forms */
        .form-control {
            border-radius: 8px !important;
            border: 1px solid #e2e8f0 !important;
            padding: 0.75rem 1rem !important;
            font-size: 0.9rem !important;
            color: #4a5568 !important;
            transition: all 0.2s;
            background-color: #f8fafc !important;
        }

        .form-control:focus {
            background-color: #ffffff !important;
            border-color: #cbd5e1 !important;
            box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.15) !important;
        }

        label {
            font-weight: 500 !important;
            color: #334155 !important;
            margin-bottom: 0.5rem !important;
        }

        /* Badge design */
        .badge {
            border-radius: 6px !important;
            padding: 0.4em 0.8em !important;
            font-weight: 500 !important;
        }

        /* Navbar tweaks */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.04) !important;
            background: #ffffff !important;
        }
        
        .horizontal-menu .bottom-navbar {
            background-color: #2b3445 !important;
        }
        .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-title {
            color: #e2e8f0 !important;
            font-weight: 500;
        }
        .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-icon {
            color: #cbd5e1 !important;
        }
        .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link .menu-title,
        .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link .menu-icon {
            color: #ffffff !important;
        }
        
        /* Layout Padding Adjustments */
        .content-wrapper {
            padding: 2.5rem 2rem !important;
            background: #f4f7f6;
        }
    </style>
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('template/')}}/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('template/')}}/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
                <div class="d-flex align-items-center justify-content-between">
                </div>
        </div>
    </div>
</div>
</body>


