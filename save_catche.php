<?php
header('Content-Type: application/json');
require "db_connect.php";

$areas = ['mathematics','english','kiswahili','integrated_science','social_studies','religious_education','creative_arts','physical_education','life_skills'];
$total = 0;
$scores = [];

$data = json_decode(file_get_contents('php://input'), true);

foreach($areas as $area) {
    $val = isset($data[$area]) ? (int)$data[$area] : 0;
    if($val < 0 || $val > 8) exit;
    $scores[$area] = $val;
    $total += $val;
}

// Determine level
if($total >= 65) $level='EE1';
elseif($total >= 57) $level='EE2';
elseif($total >= 49) $level='ME1';
elseif($total >= 41) $level='ME2';
elseif($total >= 33) $level='AE1';
elseif($total >= 25) $level='AE2';
elseif($total >= 17) $level='BE1';
else $level='BE2';

// Scholarship eligibility
$scholarship = in_array($level,['EE1','EE2','ME1','ME2']) ? 'Eligible' : 'Not eligible';

// Save silently
$stmt = $conn->prepare("INSERT INTO scores (mathematics,english,kiswahili,integrated_science,social_studies,religious_education,creative_arts,physical_education,life_skills,total_score,level,scholarship_eligibility) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param(
    "iiiiiiiiiiss",
    $scores['mathematics'],
    $scores['english'],
    $scores['kiswahili'],
    $scores['integrated_science'],
    $scores['social_studies'],
    $scores['religious_education'],
    $scores['creative_arts'],
    $scores['physical_education'],
    $scores['life_skills'],
    $total,
    $level,
    $scholarship
);

$stmt->execute();

echo json_encode(['success' => true]);
?>
