<!DOCTYPE html>
<html>
	<head>
		<title>Brave_it</title>
		<link rel="shortcut icon" href="logo2.png" />
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
	
	<div width=800 align=center> 
		
		<form method="GET" >
		<table>
		<tr>
		<th colspan=2>
		<img src ="logo1.png" width=300  />
		</th>
		</tr>
		<tr>
		<td>
		<input type="text" placeholder="Write Your Query" name="requete"/>
		</td>
		<td>
		<button id="mainbutton" type="submit" name="search" >Search</button> 
		</td>
		</tr>
		</table>
		</form>
	</div>
	<br />
	<br />
	<div align="center">
		<?php 
		

		if(isset($_GET['search'])){
			
			$q =$_GET['requete'] ;
			//echo($q);
			$dbServername = "localhost" ;
			$dbUsername = "root" ;
			$dbPassword = "";
			$dbName ="goologle";
			$conn = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);
			
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			}

			if (empty($q)){
				echo('<br />');
				echo('<br />');
				echo('<br />');
				echo('<div align="center">');
				
				echo ('<img src="joke.jpg" width=200 />');
				echo('<h1>I am joke to you !</h1>');
				
				echo('</div>');
				exit();
			}
			
			
			$sql = "SELECT * from element where title like '%$q%'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  while($row = $result->fetch_assoc()) {
				//echo "title: " . $row["title"]. " - img: " . $row["img"]. " " . $row["web"]. " " . $row["des"]. "<br>";
				
				echo('<div style="width:800px;background-color:#000000;opacity: 0.8;border-bottom: 2px solid white;"><table width=800><tr>');
				echo('<td width=150>');
				echo('<img width=100 src="'.$row["img"].'" />');
				echo('</td>');
				echo('<td>');
				echo('<a style="color:#0084FF;"href="'.$row["web"].'">'.$row["title"].'</a>');
				echo('<br />');
				echo('<p style="width:550px;">'.$row["des"].'</p>');
				echo('</td>');
				echo("</tr></table></div>");
			  }
			} else {
				
				
				echo('<br />');
				echo('<br />');
				echo('<br />');
				echo('<div align="center">');
			  
			  echo ('<img src="tenor.gif" width=200 />');
			  
			  echo('<h1>No Result !</h1>');
			  echo('</div>');
			}
			$conn->close();
		}
		
		?>
	</div>
	</body>
</html>