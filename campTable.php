
<script>alert("Welcome to Upcoming Events..")</script>

<!-- Now we need html to print the res in HTML table  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        table,th,td{
            border: 2px solid black;
            border-collapse: collapse;
            padding:5px;
            font-size:20px;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="main-div">
        <h1>Blood Donation Camp Schedule</h1>

        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                           
                           <th>Hospital Name</th>
                           <th>Address</th>
                           <th>Date</th>
                           <th>Time</th> 
                           <th>Phone</th> 
                           <th>Comments</th> 
                           <th colspan="2">Operation</th> 
                        </tr>
                    </thead>
<!-- heading ends -->

<!-- body ebgins -->
<tbody>

<!---->

<?php

// This file is the webpage to show the table in diff webpage

include 'connect.php';


//showing table

$selectQuery= " select * from camptable";

$query = mysqli_query($conn, $selectQuery);////connection come from connection.php's 16th line
//but the fetched  data is in array object form so to convert that into table form:
$nums=mysqli_num_rows($query);

while($res=mysqli_fetch_array($query)){
  ?>  
  
    <tr>
<td><?php echo $res['HospitalName']; ?></td>
<td><?php echo $res['Address']; ?></td>
<td><?php echo $res['Date']; ?></td>
<td><?php echo $res['Time']; ?></td>
<td><?php echo $res['Phone']; ?></td>
<td><?php echo $res['Comments']; ?></td>
<td>Edit</td>
<td>Del</td>
    </tr>

    <?php
}

?>


</tbody>
</table>
            </div>
        </div>
    </div>
</body>
</html>