<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('page_title', true); ?></title>

    <?= $this->include('layouts/auth/partials/head_links.php'); ?>
</head>

<body>
    <div id="auth">

        <?= $this->renderSection('content'); ?>


        <?= $this->renderSection('foot_js'); ?>
    </div>
</body>

</html>