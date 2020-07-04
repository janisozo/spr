<?php
/*
Template Name: Product
*/
?>
<?php get_header(); ?>

<?php 
echo("Šeit būs produkta lapa!");
if(isset($_GET['id'])) {
    $productID = $_GET['id'];
    echo("Preces ID: " . $productID);
}
?>

<?php get_footer(); ?>