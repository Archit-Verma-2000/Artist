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

    