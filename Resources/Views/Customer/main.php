<!DOCTYPE html>
<html lang="en">

    <?php
        include_once "includes/head.php";
    ?>

<body class="header">
    <!-- #Header start -->
    <?php
        include "includes/header.php"
    ?>
    <!-- #Header end -->

    <?php
                    $path=$_SERVER["REQUEST_URI"];
                    $file=pathinfo($path,PATHINFO_BASENAME);
                    $file_path="pages/".$file;
                    if(file_exists($file_path))
                    {
                        if($file=="main.php")
                        {
                            include_once "pages/Admin.php";
                        }
                        else
                        {
                            include_once $file_path;
                        }
                    }
                   else
                   {
                    header("Location:index.php");
                    exit();
                   }
    ?>

    