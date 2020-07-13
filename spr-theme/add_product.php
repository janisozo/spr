<?php
/*
Template Name: Add_Product
*/
?>
<?php get_header(); ?>

<?php
// Check for product submission
if(isset($_POST["submit"])) { upload_product($_FILES, $_POST); }
?>

<div class="row mt-5">
        <div class="col-7 single-product-col-center-text">
        <!-- Form starts --><form action="" method="post" enctype="multipart/form-data">
            <p id="photo-input-warning"></p>
            <div id="file-input-container">
                <div class="file-input-individual-container">
                    <span>1. Foto: </span><input type="file" name="image1" id="input-image1" class="new-product-image-input"><span class="cancel-file-span" id="delete-input-1">X</span>
                </div>
                <div class="file-input-individual-container">
                    <span>2. Foto: </span><input type="file" name="image2" id="input-image2" class="new-product-image-input" disabled><span class="cancel-file-span" id="delete-input-2">X</span>
                </div>
                <div class="file-input-individual-container">
                    <span>3. Foto: </span><input type="file" name="image3" id="input-image3" class="new-product-image-input" disabled><span class="cancel-file-span" id="delete-input-3">X</span>
                </div>
                <div class="file-input-individual-container">
                    <span>4. Foto: </span><input type="file" name="image4" id="input-image4" class="new-product-image-input" disabled><span class="cancel-file-span" id="delete-input-4">X</span>
                </div>
                <div class="file-input-individual-container">
                    <span>5. Foto: </span><input type="file" name="image5" id="input-image5" class="new-product-image-input" disabled><span class="cancel-file-span" id="delete-input-5">X</span>
                </div>
            </div>
            <div id="new-product-img-preview-holder" class="mt-4">
                <div id="preview-thumbnail-div-1" class="new-product-img-preview-div"><img id="preview-thumbnail-1" class="preview-thumbnail-img" src=""></div>
                <div id="preview-thumbnail-div-2" class="new-product-img-preview-div"><img id="preview-thumbnail-2" class="preview-thumbnail-img" src=""></div>
                <div id="preview-thumbnail-div-3" class="new-product-img-preview-div"><img id="preview-thumbnail-3" class="preview-thumbnail-img" src=""></div>
                <div id="preview-thumbnail-div-4" class="new-product-img-preview-div"><img id="preview-thumbnail-4" class="preview-thumbnail-img" src=""></div>
                <div id="preview-thumbnail-div-5" class="new-product-img-preview-div"><img id="preview-thumbnail-5" class="preview-thumbnail-img" src=""></div>
            </div>
        </div>
        <div class="col-5 single-product-col-center-text">

            <!-- Product Name -->
            <div id="product-name-input-container">
                <label for="product_name">Preces nosaukums:</label>
                <input type="text" name="product_name" id="input-product-name">
            </div>
            
            <!-- Gender and Category select -->
            <!-- Gender -->
            <div id="gender-category-input-group" class="mb-3">
                <div id="gender-sub-container">
                    <label for="gender">Produkts paredzēts:</label>
                    <select name="gender" id="new-product-gender-select">
                        <option hidden></option>
                        <option value="Meitenēm">Meitenēm</option>
                        <option value="Zēniem">Zēniem</option>
                        <option value="Zīdaiņiem">Zīdaiņiem</option>
                    </select>
                </div>
                <!-- Produtct Category -->
                <div id="category-sub-container" class="mt-3">
                    <label for="category">Produkta kategorija:</label>
                    <select name="category" id="new-product-category-select"></select>
                </div>
            </div>

            <!-- Product size -->
            <div id="product-size-input-container" class="mb-3">
                <label for="gender">Izmērs:</label>
                <select name="size" id="new-product-size-select"></select>
            </div>

            <!-- Product price -->
            <input type="number" name="product-price" id="product-price-input">
            
            <!-- 'Mark as new' checkmark -->
            <input type="checkbox" name="product-is-new" id="product-is-new-input">
            
            <!-- Product time 'as new' -->
            <label for="time-as-new">Produkta kategorija:</label>
            <select name="time-as-new" id="new-product-time-as-new" class="mt-4">
                <option value="1">1 nedēļu</option>
                <option value="2">2 nedēļas</option>
                <option value="3">3 nedēļas</option>
                <option value="4">4 nedēļas</option>
            </select>

            <!-- 'Mark as discounted' checkmark -->
            <input type="checkbox" name="product-is-discounted" id="product-is-discounted-input">

            <!-- Discounted price -->
            <input type="number" name="product-discount-price" id="product-discount-price-input">

            <label for="product_description">Produkta apraksts:</label>
            <textarea name="product_description" id="input-product-description" rows="2" cols= "30"></textarea>
        </div>
        <input type="submit" value="Ielādēt jaunu produktu" name="submit" id="submit-form-input">
    </form> <!-- Form ends -->
</div>

<?php get_footer(); ?>