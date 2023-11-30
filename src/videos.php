<?php
//init db vars
$servername = "localhost:3306";
$username = "mdphawk01";
$password = "abc12345";
$dbname = "videoComments";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//run query
$query = "SELECT videos.ID, videos.url, videos.videoTitle, videos.lastCommentDate, users.name FROM videos INNER JOIN users ON videos.createdByUserID=users.ID;";
$videos = $conn->query($query);

?>

<style>
    body{
            background-color: #512888;
        }

        table, th, td{
            border: 3px solid black;
            margin: auto;
            width:400px;
            background-color: #7851a9;
        }

        th{
            border: 2px solid black;
            font-weight: bold;
            font-size: 30px;
        }

        td{
            border: 1   px solid black;
        }
</style>

<head>
    <title>Videos</title>
</head>

<body>
    <table>
        <tr>
            <!-- table headers -->
            <th> Video </th>
            <th>Created By</th>
            <th>Last Comment Date</th>
            <th>Open</th>
        </tr>
        <?php

while($row = $videos->fetch_assoc()){
    echo "<tr>";
    echo "<td><a href='".$row["url"]."'>".$row["videoTitle"]."</a></td>";
    echo "<td>".$row["name"]."</td>";
    echo "<td>".$row["lastCommentDate"]."</td>";
    echo "<td><input type='button' style='width: 100%; height: 100%; background-color: #967bb6;' id='".$row["ID"]."' value='Open' onClick='openVideo(this)'></input></td>";
    echo "</tr>";
}

        ?>
    </table>
</body>

<script>
    function openVideo(btn){
        console.log(<?php echo "\"".$_POST["userId"]."a\"";?> + btn.id);
    }
    </script>