<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('page_title', true); ?></title>

    <?= $this->include('layouts/dashboard/partials/head_links.php'); ?>
    <?= $this->renderSection('head_css'); ?>
</head>

<body>
    <div id="app">
        <?= $this->include('layouts/dashboard/partials/sidebar.php'); ?>

        <div id="main">

            <?= $this->include('layouts/dashboard/partials/header.php'); ?>

            <?= $this->renderSection('content'); ?>

            <?= $this->include('layouts/dashboard/partials/footer.php'); ?>
            
        </div>
    </div>

    <?= $this->include('layouts/dashboard/partials/scripts.php'); ?>
    <?= $this->renderSection('foot_js'); ?>
</body>

</html>