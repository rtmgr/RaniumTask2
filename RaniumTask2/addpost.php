<?php
session_start();

$email = $_SESSION["email"];
$name = $_SESSION["name"];

$title = $_POST["title"];
$content = $_POST["content"];
$intro = $_POST["intro"];
$category = $_POST["category"];



//creating query to insert details into table blog_posts
  $conn = mysqli_connect("localhost", "root","", "musical");
  $qr = "insert into blog_posts (email, post_id, title, author, content, intro, date, category) values ('$email', '', '$title', '$name', '$content', '$intro', '', '$category' ) ";
  $res2 = mysqli_query($conn, $qr);


header('Location:manageblog.php');

?>
