<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('./assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Список тем</title>

</head>
<body>
<div class="container">
    <div id="app">
        <router-view name="articleIndex"></router-view>
{{--        <article-view></article-view>--}}
        <router-view></router-view>
    </div>
</div>

<script src="./js/app.js"></script>
</body>
</html>

