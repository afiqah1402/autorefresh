<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
    <meta name	= "viewport" content="width=device-width, initial-scale=1">
    <title>Angular Update View Prototype</title>

    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= base_url('/vendor/components/font-awesome/css/fontawesome-all.min.css') ?>">

    <!-- angular material stylesheet -->
    <link rel="stylesheet" href = "<?= base_url('/vendor/opis-assets/angular-material/angular-material.min.css') ?>">

    <!-- angular and angular library required for angular material -->
    <script src = "<?= base_url('/vendor/opis-assets/angular/angular.min.js') ?>"></script>
    <script src = "<?= base_url('/vendor/opis-assets/angular/angular-animate.min.js') ?>"></script>
    <script src = "<?= base_url('/vendor/opis-assets/angular/angular-aria.min.js') ?>"></script>
    <script src = "<?= base_url('/vendor/opis-assets/angular/angular-messages.min.js') ?>"></script>

    <!-- angular material library -->
    <script src = "<?= base_url('/vendor/opis-assets/angular-material/angular-material.min.js') ?>"></script>

    <!-- load angular module -->
    <script src= "<?= base_url('/app/app.js') ?>"></script>
</head>

<body ng-app="AutorefreshApp" ng-cloak>
<script>
  // declaring global variable for data transfer from php to js
  var baseUrl = "<?= base_url() ?>";
  var Broadcast = {
                    BROADCAST_URL : "<?= BROADCAST_URL; ?>",
                    BROADCAST_PORT : "<?= BROADCAST_PORT; ?>",
                };
</script>

    