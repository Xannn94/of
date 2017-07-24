<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/font-awesome.min.css">
    <link rel="stylesheet" href="/adminlte/ionicons.min.css">
    <link rel="stylesheet" href="/adminlte/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/colorbox/jquery.colorbox.css">
    <link rel="stylesheet" href="/adminlte/css/custom.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('css')

</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini">