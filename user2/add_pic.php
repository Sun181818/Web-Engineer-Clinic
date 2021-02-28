<?php
session_start();

if (!isset($_SESSION['email'])) {
     header("location: login.php");  
}

include '../connectdb.php';

$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
$query = "INSERT INTO pic (pic_name) VALUES ('$file')";  
if(mysqli_query($connect, $query))  
{  
     echo '<script>alert("Image Inserted into Database")</script>';  
}
else{
     echo '<script>alert("File is too BIG")</script>';
}  

?>

<!DOCTYPE html>  
<html>  
     <head>  
          <title>Webslesson Tutorial | Insert and Display Images From Mysql Database in PHP</title>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
     </head>  
     <body>  
          <br /><br />  
          <div class="container" style="width:500px;">  
               <h3 align="center">Insert and Display Images From Mysql Database in PHP</h3>  
               <br />  
               <form method="post" enctype="multipart/form-data">  
                    <input type="file" name="image" id="image" />  
                    <br />  
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
               </form>  
               <br />  
               <br />  
               <table class="table table-bordered">  
                    <tr>  
                         <th>Image</th>  
                    </tr>  
               <?php  
               $query = "SELECT * FROM pic ORDER BY id DESC";  
               $result = mysqli_query($connect, $query);  
               while($row = mysqli_fetch_array($result))  
               {  
                    echo '  
                         <tr>  
                              <td>  
                                   <img src="data:image/jpeg;base64,'.base64_encode($row['pic_name'] ).'" height="auto" width="100%" class="img-thumnail" />  
                              </td>  
                         </tr>  
                    ';  
               }  
               ?>  
               </table>  
          </div>  
     </body>  
</html>

<script>  
$(document).ready(function(){  
     $('#insert').click(function(){  
          var image_name = $('#image').val();  
          if(image_name == '')  
          {  
               alert("Please Select Image");  
               return false;  
          }  
          else  
          {  
               var extension = $('#image').val().split('.').pop().toLowerCase();  
               if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
               {  
                    alert('Invalid Image File');  
                    $('#image').val('');  
                    return false;  
               }  
          }  
     });  
});  
</script>  