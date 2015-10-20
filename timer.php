<?php
        // Prevent session from closing
        session_start();
        $present = time();
        if(isset($_GET['start'])){
                $start = $_GET['start'];
        } else {
                $start = $present;
        }
        $mins_passed = number_format(($present - $start) / 60, 1, '.', '');
?>
<html>
        <head>
                <meta http-equiv="refresh" content="60; url=timer.php?start=<?php echo $start; ?>">
                <title>Timer</title>
        </head>
        <body>
                <p>Minutes passed: <?php echo $mins_passed; ?></p>
                <img src="minute.gif?<?php echo time(); ?>">
        </body>
</html>
