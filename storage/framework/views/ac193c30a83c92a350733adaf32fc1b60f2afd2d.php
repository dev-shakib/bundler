<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
        font-family: 'Nikosh';
        src: URL(URL('fonts/Nikosh.ttf')) format('truetype');
        }
        *{
            font-family: Nikosh;
            z-index: 2;
        }
        #dimScreen
{
        position: fixed;
    padding: 0;
    margin: 0;
    left: 40%;
    top: 25%;
    width: 100%;
    text-align: center;
    height: 100%;
    z-index: -1!important;
    color: rgba(0, 0, 0, 0.2);
    font-size: 98px;
    text-transform: uppercase;
    transform: rotate(-45deg);

}
    </style>
</head>
<body>
    <div style="z-index:9999">
    <?php echo $view; ?>

    </div>
    <div id="dimScreen">
        Hello
    </div>
</body>
</html>
<?php /**PATH D:\laragon\www\bundler\resources\views/newDocsPdf.blade.php ENDPATH**/ ?>