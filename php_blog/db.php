<?php
    $connect = mysqli_connect("localhost", "root", "", "php_blog");

    if(!$connect) {
        echo "<div class='pt-5'><h3 class='container alert alert-danger mt-5'>Cannot connect to the database</h3></div>";
    }

    $sql = "SELECT * FROM data";
    $query = mysqli_query($connect, $sql);

    if(isset($_REQUEST["new_post"])) {
        $title = strip_tags($_REQUEST["title"]);
        $content = strip_tags($_REQUEST["content"]);

        $sql = "INSERT INTO data(title, content) VALUES('$title', '$content')";
        mysqli_query($connect, $sql);

        header("Location: index.php?info=added");
        exit();
    }

    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM data WHERE id = $id";
        $query = mysqli_query($connect, $sql);
    }

    if(isset($_REQUEST['update'])) {
        $id = $_REQUEST['id'];
        $title = strip_tags($_REQUEST["title"]);
        $content = strip_tags($_REQUEST["content"]);

        $sql = "UPDATE data SET title = '$title', content = '$content' WHERE id = $id";
        mysqli_query($connect, $sql);

        header("Location: index.php?info=updated");
        exit();
    }

    if(isset($_REQUEST['delete'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM data WHERE id = $id";
        $query = mysqli_query($connect, $sql);

        header("Location: index.php?info=deleted");
        exit();
    }
?>