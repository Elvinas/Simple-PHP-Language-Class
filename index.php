<?php

require 'Language.class.php';

$langs = new Language();

require 'langs/' . $langs->getCurrentLang() . '.php';
?>
<html>
<head>
    <title><?php echo $lang['title']; ?></title>
</head>
<body>
<h1><?php echo $lang['heading']; ?></h1>
<p>Description: <?php echo $lang['description']; ?></p>
<footer><?php echo $lang['copyright']; ?></footer>
</body>
</html>
