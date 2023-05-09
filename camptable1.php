<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Donation Camp Schedule</title>
    <style>
        body {
            background-color: #ffe6e6; /* light pinkish background color */
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #cc0000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid black;
            margin-bottom: 20px;
        }
        th, td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #cc0000;
            color: white;
            font-weight: bold;
        }
        td:last-child {
            text-align: center;
        }
        td:last-child button {
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        td:last-child button + button {
            margin-left: 10px;
        }
        td:last-child button:hover {
            background-color: #990000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Blood Donation Camp Schedule</h1>
        <table>
            <thead>
                <tr>
                    <th>ID No.</th>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Time</th> 
                    <th>Phone</th> 
                    <th>Comments</th> 
                    <th colspan="2">Operation</th> 
                </tr>
            </thead>
            <tbody>
            <?php
                include 'connect.php';

                $selectQuery = "SELECT * FROM camptable";
                $query = mysqli_query($conn, $selectQuery);
                $nums = mysqli_num_rows($query);

                while($res = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $res['ID']; ?></td>
                    <td><?php echo $res['HospitalName']; ?></td>
                    <td><?php echo $res['Address']; ?></td>
                    <td><?php echo $res['Date']; ?></td>
                    <td><?php echo $res['Time']; ?></td>
                    <td><?php echo $res['Phone']; ?></td>
                    <td><?php echo $res['Comments']; ?></td>
                    <td>
                        <button><a href="addCamp1.php?id=<?php echo $res['ID']; ?>" style="text-decoration:none; color:inherit;">Edit</a></button>
                        <button><a href="addCamp2.php?id=<?php echo $res['ID']; ?>" style="text-decoration:none; color:inherit;">Delete</a></button>
                        
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
