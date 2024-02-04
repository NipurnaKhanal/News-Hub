<?php
session_start();
include "link.php";

if (isset($_GET['cid'])) {
    $cat_id = $_GET['cid'];
}

$sql = "SELECT * FROM category WHERE post > 0";
$result = mysqli_query($conn, $sql) or die("Query Failed. : Category");

if (mysqli_num_rows($result) > 0) {
    $active = "";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>news</title>
        <style>
            .menu {
                display: flex;
                justify-content: center;
                color: #000;
                background-color:gray;
            }

            ul li {
                margin: 10px;
            }

            .menu a {
                float: center;
                color: #f2f2f2;
                text-align: center;
                padding: 9px 20px;
                text-decoration: none;
                font-size: 24px;
                width: auto;
            }

            .menu a:hover {
                background-color:#7998ad;
                color: black;
            }

            .menu a.active {
                background-color: black;
                color: white;
            }
        </style>
    </head>
    <body>
    <div class="menu">
        <ul class='menu'>
            <li><a href="index.php"><b><span style="color:#ECD444">News Hub</span></b></a></li>
            <li><a href='index.php'>Home</a></li>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if (isset($_GET['cid'])) {
                    if ($row['category_id'] == $cat_id) {
                        $active = "active";
                    } else {
                        $active = "";
                    }
                }
                echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
            }
            ?>
            <?php
            if (isset($_REQUEST['submit'])) {
                $conn = mysqli_connect('localhost', 'root', '', 'newsportal') or die("Connection error" . mysqli_connect_error());
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION['Name'] = $rows['Name'];
                    $_SESSION['Id'] = $rows['Id'];
                    $id = $_SESSION['Id'];
                    echo $id;
                    $sql1 = "SELECT Name FROM user where Id='$id'";
                    $_SESSION['Name'] = $rows['Name'];
                    if ($_SESSION['Name'] > 0) {
                        echo "Welcome" . $_SESSION['Name'] . "";
                    } else {
                        echo "Log In";
                    }
                }
            }
            ?>
            <?php
            if (isset($_SESSION['Email'])) {
                echo '<a href="logout.php"><i class ="fa fa-fw fa-sign-out"></i>' . $_SESSION['Email'] . ' Log out</a>';
            } else {
                echo '<a href="login.php"><i class ="fa fa-fw fa-user"></i>Log in</a>';
            }
            ?>
        </ul>
    </div>
    </body>
    </html>
    <?php
}
?>
