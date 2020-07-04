<?php
/*
Template Name: Category
*/
?>
<?php get_header(); ?>

<?php 
echo("Šeit būs preču kategorijas lapa!");
if(isset($_GET['kategorija'])) {
    $category = $_GET['kategorija'];
    echo("Kategorija: " . $category);
}
?>

<?php get_footer(); ?>