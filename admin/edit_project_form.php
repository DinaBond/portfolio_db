<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION['username'])) {
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$query = 'SELECT * FROM projects WHERE projects.id = :projectId';
$stmt = $connect->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$query2 = 'SELECT * FROM media WHERE projects_id = :projectId';
$stmt2 = $connect->prepare($query2);
$stmt2->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt2->execute();
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

 
<form action="edit_project.php" method="POST" enctype="multipart/form-data">

    <input name="pk" type="hidden" value="<?php echo $row['id']; ?>">

    <label for="title">project title: </label>
    <input name="title" type="text" value="<?php echo $row['title']; ?>"><br><br>

    <label for="tools">project tools: </label>
    <input name="tools" type="text" value="<?php echo $row['tools']; ?>"><br><br>

    <label for="date">project date: </label>
    <input name="date" type="text" value="<?php echo $row['date']; ?>"><br><br>

    <label for="case_study_url">project case study url: </label>
    <input name="case_study_url" type="text" value="<?php echo $row['case_study_url']; ?>"><br><br>

    <label for="description">project description: </label>
    <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

    <label for="goal">project goal: </label>
    <textarea name="goal"><?php echo $row['goal']; ?></textarea><br><br>

    <label for="brief">project brief: </label>
    <textarea name="brief"><?php echo $row['brief']; ?></textarea><br><br>

    <label for="url">project image: </label>
    <input name="url" type="file"><br><br>


    <input name="submit" type="submit" value="Add">
</form>

<?php
$stmt = null;
?>
</body>
</html>
