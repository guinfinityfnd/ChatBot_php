<?php
$conn = mysqli_connect("localhost", "root", "", "bot") or die('Error.');
$getmsg = mysqli_real_escape_string($conn, $_POST['text']);

$check = "SELECT reply FROM chatbot WHERE query LIKE '%$getmsg%'";
$run = mysqli_query($conn, $check) or die("Error occur.");

if (mysqli_num_rows($run) > 0) {
    $fetch = mysqli_fetch_assoc($run);
    $replay = $fetch['reply'];
    echo $replay;
} else {
    echo "I don't understand your words.";
}