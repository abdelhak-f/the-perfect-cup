<?php include "admin_header.php" ?>
<?php 

$connection = mysqli_connect('Localhost','root','','perfectcup');
if (isset($_POST['ajouter_produits'])) {
    $pro_title = $_POST['pro_title'];
    $pro_images = $_FILES['image']['name'];
    $produit_image_temp = $_FILES['image']['tmp_name'];
    $pro_description = $_POST['pro_description'];
    $pro_info = $_POST['pro_info'];
    $pro_price = $_POST['pro_price'];
    //$today = date("Y, m, d");

    move_uploaded_file($produit_image_temp, "../img/$pro_images");

    $pro_title = mysqli_real_escape_string($connection,$pro_title);
    $pro_images = mysqli_real_escape_string($connection,$pro_images);
    $pro_description = mysqli_real_escape_string($connection,$pro_description);
    $pro_info = mysqli_real_escape_string($connection,$pro_info);

    $query = "INSERT INTO tbl_product(pro_title, pro_images , pro_description, pro_info , pro_price) VALUES ('$pro_title','$pro_images','$pro_description','$pro_info','$pro_price')";
    $ajouter_produit_query = mysqli_query($connection,$query);  

    if (!$ajouter_produit_query) {
        die("QUERY FAILED". mysqli_error($connection));
        header('Location: voir_produits.php');
    }
     
}

?>




            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ajouter un Produit
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="ajouter_produits.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="title">Titre de Produit</label>
                        <input type="text" class="form-control" name="pro_title">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="pro_images">Image de Produit</label>
                        <input type="file"  name="image">
                    </div>

                    
                    <div class="form-group">
                        <label for="pro_description">Description de Produit</label>
                        <textarea class="form-control "name="pro_description" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="pro_info">Infos de Produit</label>
                        <textarea class="form-control "name="pro_info" id="" cols="30" rows="5">
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="pro_price">Prix de Produit</label>
                        <input type="number" class="form-control" name="pro_price">
                    </div>
                    
                    

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="ajouter_produits" value="Ajouter un produit">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>