<?php
function createHtml(string $name) {
?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="frontend/assets/css/fonts-googleapis.iconsmaterial.css">
        <link rel="stylesheet" type="text/css" href="frontend/assets/css/material.indigo-pink.min.css">
        <link rel="stylesheet" type="text/css" href="frontend/assets/css/fonts-googleapis.cssmaterial.css">

        <link rel="stylesheet" type="text/css" href="frontend/assets/css/styles.css">
    </head>
    <body>

        <div id="MdlApp" title="<?php echo $name ?>"></div>

        <script defer type="text/javascript" src="frontend/assets/libs/material.min.js"></script>
        <script type="text/javascript" src="frontend/assets/libs/polyfill/dialog-polyfill.js"></script>
        <script type="text/javascript" src="frontend/assets/libs/fontawsome.js"></script>

        <script type="text/javascript" src="frontend/web/lib/kotlin.js"></script>
        <script type="text/javascript" src="frontend/web/frontend.js"></script>

    </body>
    </html>

<?php
}
?>