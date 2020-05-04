<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<body>
    <header>
        <div id="pageTitle">
            <h1>Quotes</h1>
        </div>
        <div id="pageLinks">
            <?php 
                session_start();
                if (!isset($_SESSION['userid'])) {
            ?>
                <p>
                    <a href="admin-register.php">Register</a>
                </p>
            <?php } else { 
                $userid = $_SESSION['userid'];
            ?>
                <p>
                    Welcome <?php echo $userid ?>! (<a href="logout.php">Sign Out</a>)
                </p>
            <?php } ?>
        </div>
    </header>