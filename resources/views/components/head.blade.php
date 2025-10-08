@props(['titre'])
<!DOCTYPE html>
<html lang="fr" data-layout-mode="light_mode">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Application de gestion RH - Fès">
    <meta name="author" content="Mohammed KAD">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $titre }} - Application Service GRH-DMSPS Fès</title>

    <script src="/html/assets/js/theme-script.js" type="text/javascript"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/html/assets/img/logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/html/assets/css/bootstrap.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="/html/assets/css/bootstrap-datetimepicker.min.css">

    <!-- animation CSS -->
    <link rel="stylesheet" href="/html/assets/css/animate.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="/html/assets/plugins/select2/css/select2.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/html/assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/html/assets/css/style.css">

    <style>
        div.dataTables_wrapper div.dataTables_info {
            padding-top: 5rem !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            gap: 5px !important;
        }

        .dataTables_length,
        .dataTables_paginate {
            margin-top: 15px !important;
            margin-bottom: 10px;
        }


        .dataTables_empty {
            background: #f81d1db9 !important;
            color: #fff !important;
            padding: 10px !important;
        }


    </style>

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="/html/assets/css/dataTables.bootstrap5.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="/html/assets/css/bootstrap-datetimepicker.min.css">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="/html/assets/plugins/summernote/summernote-bs4.min.css">


</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
