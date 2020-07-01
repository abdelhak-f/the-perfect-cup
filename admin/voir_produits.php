<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Liste des Produits
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Titre</th>                       
                        <th>Image</th>
                        <th>Description</th>
                        <th>Infos</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $connection = mysqli_connect('Localhost','root','','perfectcup');
                            $query = "SELECT * FROM tbl_product";
                            $load_products_query = mysqli_query($connection,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $id = $row['id'];
                                $pro_title = $row['pro_title'];
                                $pro_images = $row['pro_images'];
                                $pro_description = $row['pro_description'];
                                $pro_info = $row['pro_info'];
                                $pro_price = $row['pro_price'];
                                $pro_date = $row['date'];

//pro_title, pro_images , pro_description, pro_info , pro_price
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$pro_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/$pro_images' alt=''></td>";
                                echo "<td>$pro_description</td>";
                                echo "<td>$pro_info</td>";
                                echo "<td>$pro_price</td>";
                                echo "<td>$pro_date</td>";
                                echo "<td> <a href='modifier_produits.php?modifier=$id'>UPDATE</a></td>";
                                echo "<td><a href='voir_produits.php?delete=$id'>DELETE</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $delete_product_id = $_GET['delete'];

                                $delete_query = "DELETE FROM tbl_product WHERE id = $delete_product_id";
                                $delete_product_query = mysqli_query($connection,$delete_query);

                                //header('Location: voir_produits.php');
                            }

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>