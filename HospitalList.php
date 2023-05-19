<?php 
session_start();
include 'navbar-admin.php'; ?>

<html>
    <head>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <title></title>
</head>
        
    
<style>
    table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-size: 14px;
  line-height: 1.5;
  margin: 20px 0;
}

thead {
  background-color: #eee;
  text-align: left;
}

th, td {
  border: 1px solid #ccc;
  padding: 8px;
}

th {
  font-weight: bold;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.fa {
  font-size: 20px;
  margin-right: 10px;
}

.fa-edit {
  color: #007bff;
}

.fa-trash {
  color: #dc3545;
}

/* Styling for search bar */
.search-bar {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  margin: 20px 0;
}

#search-input {
  padding: 8px;
  font-size: 16px;
  border: none;
  border-radius: 5px 0 0 5px;
  width: 300px;
  box-shadow: 0 0 5px #ccc;
}

#search-btn {
  padding: 8px;
  background-color: #007bff;
  border: none;
  border-radius: 0 5px 5px 0;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  box-shadow: 0 0 5px #ccc;
}

#search-btn:hover {
  background-color: #0062cc;
}
body{
    background: linear-gradient(to bottom, #fff5f7, #ffedf7);

}

/* edit button popup styling */


</style>

    <body>
    <h1 style="text-align: center;font-family:Neuton,serif; font-size:40px;">Hospital &nbsp;&nbsp;Lists</h1>
    <div class="search-bar">

    <!-- button to add hospitals -->
    <button id="add-hospital-btn" style="margin-right: 10px; background-color: #28a745; color: #fff; border: none; border-radius: 5px; padding: 8px 12px; font-size: 16px; cursor: pointer;" onclick="openWindow()">
  <i class="fas fa-hospital" style="margin-right: 5px;"></i> ADD Hospital
</button>



  <input type="text" id="search-input" placeholder="Search hospitals...">
  <button id="search-btn"><i class="fa fa-search"></i></button>
  <!-- <div id="suggestions"></div> -->
</div>

        <div class="main-div">

            <div class="centre-div">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Hospital Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>A+ Stock</th>
                                <th>A- Stock</th>
                                <th>B+ Stock</th>
                                <th>B- Stock</th>
                                <th>O+ Stock</th>
                                <th>O- Stock</th>
                                <th>AB+ Stock</th>
                                <th>AB- Stock</th>
                                <th colspan="2">Update</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php

include 'connect.php';

$select ="select * from hospitallisttable";
$query=mysqli_query($conn,$select);
$nums=mysqli_num_rows($query);

while($res=mysqli_fetch_array($query)){
    ?>
    
    <tr>
    <td><?php echo($res['HospitalName']);  ?></td>
    <td><?php echo($res['HospitalAddress']);  ?></td>
    <td><?php echo($res['Email']);  ?></td>
    <td><?php echo($res['Phone']);  ?></td>
    <td><?php echo($res['Stock-A+']);  ?></td>
    <td><?php echo($res['Stock-A-']);  ?></td>
    <td><?php echo($res['Stock-B+']);  ?></td>
    <td><?php echo($res['Stock-B-']);  ?></td>
    <td><?php echo($res['Stock-O+']);  ?></td>
    <td><?php echo($res['Stock-O-']);  ?></td>
    <td><?php echo($res['Stock-AB+']);  ?></td>
    <td><?php echo($res['Stock-AB-']);  ?></td>
    <td>
    <a href="./HospitalList1.php?Hospitals=<?php echo($res['HospitalName']);?>" 
        onclick="window.open('./HospitalList1.php?Hospitals=<?php echo($res['HospitalName']);?>', 'Hospital List', 'width=450,height=600'); return false;">
        <i class="fa fa-edit" aria-hidden="true"></i>
    </a>
</td>
  
<td><a href="deletehospital.php?Hospital=<?php echo($res['HospitalName']);?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    
</tr>
<?php
}



                        ?>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
<!-- PHP to update edit button -->




<!--  -->



        <script>

          //edit button js start
          function Display() {
            var popup = window.open("./HospitalList1.php", "Popup", "width=800,height=650");
			popup.focus();
}

function openWindow() {
    window.open("./hospitaladd.php", "Popup", "width=450,height=600");
  }
		// function close() {
		// 	document.getElementById("popupOverlay").style.display = "none";
		// 	document.getElementById("popup-new").style.display = "none";
		// }
    // $("#closeButton").click(function() {
    //         $(".popupOverlay").hide();
    //         $(".popup-new").hide();
    //     });
          //edit button popup ends


          // Only to search hospital 
$("#search-btn").click(function() {
  var searchTerm = $("#search-input").val().toLowerCase();

  // Loop through each row in the table
  $("table tbody tr").each(function() {
    var hospitalName = $(this).find("td:first-child").text().toLowerCase();

    // If the hospital name matches the search term, mark the row with a shadow
    if (hospitalName.indexOf(searchTerm) !== -1) {
      $(this).css("box-shadow", "0 0 10px #007bff");

      // Scroll to the top position of the matched row
      var topPosition = $(this).offset().top;
      $('html, body').scrollTop(topPosition);
    } else {
      $(this).css("box-shadow", "none");
    }
  });

  // If no matching hospital is found, show an alert
  if ($("table tbody tr:visible").length === 0) {
    alert("Hospital not found");
  }
});


// JS code for the edit popup



        </script>
    </body>
</html>