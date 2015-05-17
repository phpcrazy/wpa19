<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<?php foreach($users as $user) { ?>
    <h3><?php echo $user['username']; ?></h3>
<?php } ?>
</body>
</html>