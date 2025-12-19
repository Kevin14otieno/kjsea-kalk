<?php
require "db_connect.php";


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=student_scores.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo "Mathematics\tEnglish\tKiswahili\tIntegrated Science\tSocial Studies\tReligious Education\tCreative Arts\tPhysical Education\tLife Skills\tTotal Score\tLevel\tScholarship\tDate\n";

// Fetch data
$sql = "SELECT * FROM scores ORDER BY created_at DESC";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "{$row['mathematics']}\t{$row['english']}\t{$row['kiswahili']}\t{$row['integrated_science']}\t{$row['social_studies']}\t{$row['religious_education']}\t{$row['creative_arts']}\t{$row['physical_education']}\t{$row['life_skills']}\t{$row['total_score']}\t{$row['level']}\t{$row['scholarship_eligibility']}\t{$row['created_at']}\n";
    }
} else {
    echo "No data found";
}
?>
