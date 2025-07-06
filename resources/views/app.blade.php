<!DOCTYPE html>
<html class="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="/resources/css/app.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @inertiaHead
    @routes
</head>
  <body>
    @inertia
  </body>
</html>