<?php
// I don't remember what this is - 12.07 7:52PM
$sourcePath = $_FILES['image1']['tmp_name'];
$targetPath = "images/" . $_FILES['image1']['name'];
move_uploaded_file($sourcePath,$targetPath);