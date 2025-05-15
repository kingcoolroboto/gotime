<!DOCTYPE html>
<html lang="en">
<head>
    <title>TIME</title>
    <link rel="icon" type="image/x-icon" href="https://i.imghippo.com/files/VlXB1877Mmo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”robots” content="index, follow, max-image-preview:large, max-snippet:-1">
    <meta name="description" content="We specializing in high-quality porcelain and ceramic products, offering a range of beautifully crafted tea sets, vases, figurines, and tableware. Discover elegant designs with traditional Chinese motifs perfect for home decor or gifting.">
    <meta name="keywords" content="BalaBala,balabal">
    <meta name="author" content="The Forge">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/htmx.org@2.0.4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body > 
<div  id="menu" hx-get="./menu.php" hx-trigger="load"></div>
<div  id="body" hx-get="./home.php" hx-trigger="load" style="width:100vw;"></div>
</body>
</html>
