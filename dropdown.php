<!DOCTYPE html>
<html>
<head>
	<title>Filter Button with Dropdown</title>
	<style>
		.filter-dropdown {
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
			display: none;
		}
		.filter-dropdown a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		.filter-dropdown a:hover {
			background-color: #ddd;
		}
		.dropdown-container {
			display: inline-block;
			position: relative;
		}
		.filter-button {
			background-color: #4CAF50;
			color: white;
			padding: 12px;
			font-size: 16px;
			border: none;
			cursor: pointer;
		}
		.filter-button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>

	<div class="dropdown-container">
		<button class="filter-button" onclick="toggleDropdown()">Filter</button>
		<div class="filter-dropdown" id="filterDropdown">
			<a href="./donationFilter.php">Donations</a>
			<a href="./RequestFilter.php">Requests</a>
			<a href="./LastWeekFilter.php">Last Week</a>
		</div>
	</div>

	<script>
		function toggleDropdown() {
			var dropdown = document.getElementById("filterDropdown");
			if (dropdown.style.display === "none") {
				dropdown.style.display = "block";
			} else {
				dropdown.style.display = "none";
			}
		}
	</script>

</body>
</html>
