<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Job Recruitment Platform</title>
</head>
<body>
    <h1>Welcome to JobsPlace</h1>
    <p>Today's date is: <?php echo date('d M Y'); ?></p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="jobTitle" placeholder="Enter job title">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect value of input field
        $jobTitle = htmlspecialchars($_REQUEST['jobTitle']); 
        if (empty($jobTitle)) {
            echo "Job title is empty";
        } else {
            echo "Job title is: " . $jobTitle;
        }
    }
    ?>
</body>
</html>
