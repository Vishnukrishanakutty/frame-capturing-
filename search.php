<?php
include 'dataconnect.php';
?>




<!DOCType html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Search data</title>
    </head>
    <body>
        <div class="container">
            <form method="post">
                <input type="text" placeholder="Search data" 
                name="search">
                <button class="btn btn-dark btn-sm">Search</button>
            </form>
            <div class="container ">
                <table class="table">
                    <?php
                    if(isset($_POST['submit'])){
                        $search=$_POST['search'];

                        $sql="select * from 'numberplate' where id='$search'
                        or plateNO='$search' or date='$search'";
                        $result=mysqli_query($con,$sql);
                        if($result){
                            if(mysqli_num_rows($result)>0){
                                echo '<thead>
                                <tr>
                                <th>Sl.no</th>
                                <th>NumberPlate</th>
                                <th>Date</th>
                                </tr>
                                </thead>
                                ';
                                while($row=mysqli_fetch_assoc($result)){
                                echo '<tbody>
                                <tr>
                                <td>'.$row[id].'</td>
                                <td>'.$row[plateNo].'</td>
                                <td>'.$row[date].'</td>
                                </tr>
                                </tbody>';
                                }
                            }else{
                                echo '<h2>No Data Found</h2>';
                            }   
                        }
                    }
                    ?>
                </table>    
        </div>
    </body>
</html>