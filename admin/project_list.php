<!DOCTYPE html>
<html lang="en">

<?php

session_start();
if(!isset($_SESSION['username'])) {
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connect->prepare('SELECT id,title FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="title">project title: </label>
    <input name="title" type="text"><br><br>

    <label for="tools">project tools: </label>
    <input name="tools" type="text"><br><br>

    <label for="date">project date: </label>
    <input name="date" type="text"><br><br>

    <label for="case_study_url">project case study url: </label>
    <input name="case_study_url" type="text"><br><br>

    <label for="description">project description: </label>
    <textarea name="description"></textarea><br><br>

    <label for="goal">project goal: </label>
    <textarea name="goal"></textarea><br><br>

    <label for="brief">project brief: </label>
    <textarea name="brief"></textarea><br><br>

    <label for="url">project image: </label>
    <input name="url" type="file"><br><br>

    <input name="submit" type="submit" value="Add">
</form>
<br><br><br>
<a href="logout.php">log out</a>
</body>
</html>
