<?php
function pdo_connect_postgresql() {
    $host = 'sql.catlab.com';
    $db = 'catdb';
    $user = 'catdb';
    $pass = '12345';

    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Não foi possível conectar ao banco de dados PostgreSQL: " . $e->getMessage());
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1><img style="width: 300px; " src="GATOLAB_1_-removebg-preview.png" alt=""></h1>
                <a href="index.php"><i class="fas fa-home"></i>Home</a>
                <a href="read.php"><i class="fas fa-address-book"></i>Contacts</a>
            </div>
        </nav>
    EOT;
}

function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
}
?>
