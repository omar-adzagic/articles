<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>NBG test</title>
</head>
<body>
<nav class="navigation">
    <?php $uri = service('uri'); ?>
    <ul>
        <li class="<?= $uri->getSegment(1) == 'articles' ? 'active' : '' ?>">
            <a href="/articles">Članci</a>
        </li>
        <?php if (session()->get('isLoggedIn')) : ?>
            <li>
                <form action="/logout" method="POST">
                    <button type="submit" class="btn-link">Odjavi se</button>
                </form>
            </li>
        <?php else: ?>
            <li class="<?= $uri->getSegment(1) == 'login' ? 'active' : '' ?>">
                <a href="/login">Prijavi se</a>
            </li>
        <?php endif ?>
    </ul>
</nav>
<div class="">
    <?= $this->renderSection('content') ?>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.mytextarea'
    });
</script>
</body>
</html>