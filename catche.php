<?php
require "db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">For Admin Use Only</h1>

    <div class="text-center mb-4">
        <a href="export_excel.php" class="btn btn-success">Export to Excel</a>
        <a href="flier.php" class="btn btn-success">print Fliers</a>
        <a href="home.php" class="btn btn-success">Home</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="scoresTable">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mathematics</th>
                    <th>English</th>
                    <th>Kiswahili</th>
                    <th>Integrated Science</th>
                    <th>Social Studies</th>
                    <th>Religious Education</th>
                    <th>Creative Arts</th>
                    <th>Physical Education</th>
                    <th>Life Skills</th>
                    <th>Total Score</th>
                    <th>Level</th>
                    <th>Scholarship</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            
                <?php
                $sql = "SELECT * FROM scores ORDER BY created_at DESC";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $i = 1;
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>{$i}</td>
                            <td>{$row['mathematics']}</td>
                            <td>{$row['english']}</td>
                            <td>{$row['kiswahili']}</td>
                            <td>{$row['integrated_science']}</td>
                            <td>{$row['social_studies']}</td>
                            <td>{$row['religious_education']}</td>
                            <td>{$row['creative_arts']}</td>
                            <td>{$row['physical_education']}</td>
                            <td>{$row['life_skills']}</td>
                            <td>{$row['total_score']}</td>
                            <td>{$row['level']}</td>
                            <td>{$row['scholarship_eligibility']}</td>
                            <td>{$row['created_at']}</td>
                        </tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='14' class='text-center'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
