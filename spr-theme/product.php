<?php
/*
Template Name: Product
*/
?>
<?php get_header(); ?>

<?php 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = get_product($id);
    if($product) {
        $productSizes = explode(',', $product['Product_Size']);
        $productImages = get_product_images($id);
        ?>
        <div class="row mt-5">
            <div class="col-7 single-product-col-center-text">
                <img id="product-highlight-img" src="<?php echo($product['Product_Image1']); ?>" alt="<?php echo($product['Product_Name']); ?>">
                <div class="single-product-gallery-holder mt-2">
                    <?php foreach($productImages as $img) { ?>
                        <img class="single-product-small-image" src="<?php echo($img); ?>">
                    <?php } ?>
                </div>
            </div>
            <div class="col-5 single-product-col-center-text">
                <h3><?php echo($product['Product_Name']); ?></h3>
                <p><?php echo($product['Product_Desc']); ?></p>
                <div id="product-size-div" class="mb-4">
                    <span><strong>Izmēri:</strong></span>
                    <?php foreach($productSizes as $size) { ?>
                        <button class="single-product-size-btn"><?php echo($size); ?></button>
                    <?php } ?>
                    <span id="size-warning-span"></span>
                </div>
                <span class="product-price-span"><strong>Cena: <?php echo($product['Product_Price']); ?> €</strong></span><br>
                <button id="add-to-cart-btn">Ielikt grozā</button>
            </div>
        </div>
    <?php } else {
        echo("Atvainojiet, prece netika atrasta");
    }
}
?>

<?php get_footer(); ?>