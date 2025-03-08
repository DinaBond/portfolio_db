<?php
require_once('../includes/connect.php');


$random = rand(10000,99999); 
$newname = 'image'.$random; 

$filetype = strtolower(pathinfo($_FILES['url']['name'], PATHINFO_EXTENSION));



if($filetype == 'jpeg') {
  $filetype = 'jpg'; 
}

if($filetype == 'exe') {
  exit('nice try'); 
}

$newname .= '.'.$filetype;

$target_file = '../images/'.$newname;



if(move_uploaded_file($_FILES['url']['tmp_name'], $target_file)) {  

$query = "INSERT INTO projects (title, tools, date, case_study_url, description, goal, brief) VALUES (?,?,?,?,?,?,?)";
$stmt = $connect->prepare($query);
$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['tools'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['date'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['case_study_url'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['description'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['goal'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['brief'], PDO::PARAM_STR);


$stmt->execute();

$last_id = $connect->lastInsertId();


$stmt = null;


$mediaquery = "INSERT INTO media (url, projects_id) VALUES (?,?)";

$stmt2 = $connect->prepare($mediaquery);
$stmt2->bindParam(1, $newname, PDO::PARAM_STR);
$stmt2->bindParam(2, $last_id, PDO::PARAM_INT);

$stmt2->execute();
$stmt2 = null;


//project_id = $last_id;



header('Location: project_list.php');
}



?>