<!DOCTYPE html>
<html lang="en">
<?php
            include_once "includes\head.php";
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
                <?php
                    include_once "includes/sidebar.php";
                ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include_once "includes/header.php";
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                 <?php
                    $path=$_SERVER["REQUEST_URI"];
                    $file=pathinfo($path,PATHINFO_BASENAME);
                    if(file_exists($file))
                    {
                        if($file=="main.php")
                        {
                            include_once "Admin.php";
                        }
                        else
                        {
                            include_once $file;
                        }
                    }
                   else
                   {
                    header("Location:index.php");
                    exit();
                   }
                 ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                    include "includes/footer.php";
            ?>
            <!-- End of Footer -->
</body>
</html> 