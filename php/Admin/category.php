
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <style>
        
      body{
        background: rgb(211, 211, 211);  
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
body{   
				background: rgb(211, 211, 211);  
			}  
			#admin-content{  
				font-family: Verdana, Geneva, Tahoma, sans-serif;
				border: solid rgb(63, 63, 63) 0px;  
				width:50%;  
				align-content: center;
				border-radius: 20px;  
				margin: 120px auto;  
				background: rgb(255, 255, 255);  
				padding: 50px;  
			} 
			#admin-content:hover{
				border: #337ab7;
			}
			.content-table{
				align-content: center;
			}
			.link{
				background: #3d5a80;  
				color: #fff;  
				padding: 7px;  
				margin-left: 0%; 
				border-radius: 5px; 
				text-decoration: none;
			}
			.link:hover{
 			   background:#ed6b4d ;
            }


    </style>

</head>
<body>
<?php
  //include "header.php";
  ?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div><br>
            <div class="col-md-2">
                <a class="link" href="add-category.php">Add category</a><br>
            </div><br><br>
            <div class="col-md-12">
              <?php
                include '../link.php';
              $sql = "SELECT * FROM  category ORDER BY category_id ";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                  $table = '<table class="content-table" border="1px" cellspacing="0" cellpadding="10px">';
                  $table .= '<thead>
                                  <th>S.No.</th>
                                  <th>Category Name</th>
                                  <th>No. of Posts</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                              </thead>
                              <tbody>';
                 
                  while($row = mysqli_fetch_assoc($result)) {
                    $table .= "<tr>
                            <td class='id'>{$row["category_id"]}</td>
                            <td>{$row["category_name"]}</td>
                            <td>{$row["post"]}</td>
                            <td class='edit'><a class=link href='update-category.php?id={$row['category_id']}' >Edit</a></td>
                            <td class='delete'><a class=link href='delete-category.php?id={$row['category_id']}'>Delete</i></a></td>
                        </tr>";
                       
                  }
                  $table .= '</tbody></table>';
                 
                  echo $table;
              } else {
                  echo "<h3>No Results Found.</h3>";
              }
              ?>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
