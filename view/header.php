<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
	<title><?=$title?></title>
</head>

<body>
<nav>
    <div class="ui top inverted menu">
        <div class="item">
            <img src="/images/logo.png">
        </div>
        <a href="/" class="item">Home</a>
        <?php if(!isset($_SESSION["login"])) { ?>
        <a href="/login" class="item">Login</a>
        <?php } else { ?>
            <a href="/default/logout" class="item">Logout</a>
        <?php } ?>
    </div>
</nav>