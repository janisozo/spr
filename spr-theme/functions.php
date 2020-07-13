<?php

function theme_enqueue_styles_and_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('jquery-3.5.1.min.js', get_template_directory_uri() . '/js/jquery-3.5.1.min.js');
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');

function get_latest_products($category = 'ALL') {
    $sql_host = 'localhost';
    $sql_user = 'wp_user';
    $sql_password = 'jivucai';
    $sql_database = 'wordpress2';

    // Create connection
    $conn = new mysqli($sql_host, $sql_user, $sql_password, $sql_database);
    
    // Check connection
    if($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
        return false;
    } else {
        $sql_table = 'wp2_products';
        $product_date_col = 'Product_Date_Added';

        $sql = "SELECT * FROM " . $sql_table . " ORDER BY " . $product_date_col . " DESC LIMIT 12";
        
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        $conn->close();
    }
}

function get_product($id) {
    $sql_host = 'localhost';
    $sql_user = 'wp_user';
    $sql_password = 'jivucai';
    $sql_database = 'wordpress2';

    // Create connection
    $conn = new mysqli($sql_host, $sql_user, $sql_password, $sql_database);

    // Check connection
    if($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
        return false;
    } else {
        $sql_table = 'wp2_products';

        $sql = "SELECT * FROM " . $sql_table . " WHERE Product_ID = '$id'";
        $post = $conn->query($sql);
        if($post->num_rows > 0) {
            return $post->fetch_assoc();
        } else {
            return false;
        }
        $conn->close();
    }
}

function get_product_images($id) {
    $sql_host = 'localhost';
    $sql_user = 'wp_user';
    $sql_password = 'jivucai';
    $sql_database = 'wordpress2';

    // Create connection
    $conn = new mysqli($sql_host, $sql_user, $sql_password, $sql_database);

    // Check connection
    if($conn->connect_error) {
        echo("Connection failed: " . $conn->connect_error);
        return false;
    } else {
        $sql_table = 'wp2_products';

        $sql = "SELECT Product_Image1, Product_Image2, Product_Image3, Product_Image4, Product_Image5 FROM " . $sql_table . " WHERE Product_ID = '$id'";
        $post = $conn->query($sql);
        if($post->num_rows > 0) {
            $postImages = $post->fetch_assoc();
            $realImg = [];
            foreach($postImages as $img) {
                if($img != NULL) {
                    array_push($realImg, $img);
                }
            }
            return $realImg;
        } else {
            return false;
        }
        $conn->close();
    }
}

function upload_product($files, $post) {
    echo("I've been called!");

    // $check = getimagesize($_FILES["image1"]["tmp_name"]);
    // if($check) {
    //     echo(realpath($_FILES["image1"]["tmp_name"]));
    //     echo("<img src=\"" . realpath($_FILES["image1"]["tmp_name"]) . "\" alt=\"tmp_image_here\">");
        
    //     $target_dir = "./images/";
    //     $target_file = $target_dir . basename($_FILES["image1"]["name"]);
    //     $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    //     $imageValid = true;

    //     // Check if image with the same name already exists
    //     if(file_exists($target_file)) {
    //         echo("Error! File already exists!\n");
    //         $imageValid = false;
    //     } else if($_FILES["image1"]["size"] > 1000000) {
    //         echo("Error! File too large!");
    //         $imageValid = false;
    //     } else if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
    //         echo("Error! File not of supported type!");
    //         $imageValid = false;
    //     }

    //     if($imageValid) {
    //         if(move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {
    //             echo("The file " . basename($_FILES["image1"]["name"]) . " has been uploaded");
    //         } else {
    //             echo("Error handling the file upload!");
    //         }
    //     }

    // } else {
    //     echo("File not an image.");
    // }
}

?>