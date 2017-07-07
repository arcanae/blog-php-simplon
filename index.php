<?php
$array = scandir('post');
$files = [];
foreach ($array as $file) {
    if ($file === '.') {
        continue;
    }
    if ($file === '..') {
        continue;
    }
    $files[] = $file;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Awesome Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <style>
    article {
        background-color: lightblue;
        margin-bottom: 1em;
    }
    </style>
    <div class="container">
        <h1 class="text-center col-sm-4 col-sm-offset-4">My Awesome Blog</h1>
    </div>
    <nav class="text-center col-sm-4 col-sm-offset-4"><a href="create.html">New Post</a></nav>
    <div class="fluid text-justify">
        <?php foreach ($files as $file) { ?>
            <article class="col-sm-3 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                <h2 class="text-center"><?php echo basename($file, '.txt'); ?></h2>
                <p class="text-center"><?php echo file_get_contents('post/' . $file); ?></p>
                <form class="text-center" action="delete-post.php" method="POST">
                    <input type="hidden" name="filename" value="<?php echo $file; ?>">
                    <input type="submit" value="delete">
                </form>
            </article>
        <?php } ?>
    </div>
</body>
</html>