<?php
require "db_connect.php";

// Get all scholarship-eligible students
$sql = "SELECT * FROM scores WHERE scholarship_eligibility='Eligible' ORDER BY created_at DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()):
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Scholarship Flyer</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #fdf6e3;
    margin: 0;
    padding: 0;
}
.flyer {
    width: 700px;
    margin: 50px auto;
    padding: 30px;
    border: 5px solid #4CAF50;
    background-color: #ffffff;
    text-align: center;
}
h1 {
    color: #4CAF50;
    margin-bottom: 20px;
}
h2 {
    color: #333;
}
p {
    font-size: 18px;
    margin: 10px 0;
}
</style>
</head>
<body>
<div class="flyer">
    <h1>JKF Elimu Scholarship Award</h1>
    <h2>Congratulations!</h2>
    <p><strong>Level Achieved:</strong> <?php echo $row['level']; ?></p>
    <p><strong>Total Score:</strong> <?php echo $row['total_score']; ?> / 72</p>
    <p>You have been awarded the <strong>JKF Elimu Scholarship</strong> for your outstanding performance in the KJSEA CBC program.</p>
    <p><em>Date: <?php echo date('d M Y', strtotime($row['created_at'])); ?></em></p>
</div>
<hr style="border-top:1px solid #ccc; margin:50px 0;">
</body>
</html>
<?php endwhile; ?>
