<?php
require_once('../includes/connect.php');

$projectId = $_GET['id'];

$mediaquery = 'DELETE FROM media WHERE projects_id = :projectId';
$stmt1 = $connect->prepare($mediaquery);
$stmt1->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt1->execute();

$projectquery = 'DELETE FROM projects WHERE id = :projectId';
$stmt2 = $connect->prepare($projectquery);
$stmt2->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt2->execute();


header('Location: project_list.php');
?>