<?php
session_start();

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `customerdetails` WHERE CONCAT(`Bank_id`, `Name`, `Account_Type`,`Phone_no`,`Bank_Balance`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `customerdetails`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "shalsbank");
    $filter_Result = mysqli_query($connect,$query);
    return $filter_Result;
}
$con=mysqli_connect("localhost","root","") or die("Unable to connect");
if(isset($_POST['submit_btn'])){
$hid=$_POST['val'];
$_SESSION['name']=$hid; 
header("Location:individual.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Details</title>
        <link rel="stylesheet" href="homepage.css">
        <style>
            @import url(https://fonts.googleapis.com/css?family=Bungee);
            table,tr,th,td
            {
                border: 1px solid white;
                color:white; font-size:18pt;
            }
.search{
  border: 1px solid #c4c4c4;
  width: 700px;
  overflow-x: hidden;
  display: flex;
  border-radius: 50px;
  font-size: 18px;
  position: relative;
  left:27%;
  top:10%;
  background-color: lightcyan;
}
.search input{
  border: none;
  padding: 8px 40px;
  outline: none;
  font-size: 18px;
  background-color: lightcyan;
  font-family: 'Bitter';
  font-size: 33px;
 
}
.button-src{
  padding: 7px 80px; 
  display: inline-block;
}
.button-src input{
  padding: 10px 35px 10px 40px;
  border-radius: 50px;
  border: none;
  margin: 9px 5px;
  background-color: #FF7A00;
  color: #ffffff;
  font-size: 18px;
  font-family: 'Bitter';
  font-weight: bold;
}
.style2
{
    font-family: 'Bungee';
    font-size: 70px;
    text-align:center;
    color:black;
    letter-spacing: 0.2cm;
    font-weight:bold;
    -webkit-text-stroke: 1px white;
}
</style>
    </head>
    <body>
    <div class="nav">
        <center><h1 class="style1" style="margin-top:0%">SHALS INTERNATIONAL BANK</h1></center>    
    </div>
    <div class="style2" style="margin-top:-5%">Customer Details</div>
    <form action="search.php" method="post">
        <div class="search" style="margin-top:-1%">
            <input type="text" name="valueToSearch" placeholder="Value To Search">
            <div class="button-src">
            <input type="submit" name="search" value="Filter">
            </div>
        </div>
        </form>
        <form action="http://localhost/Shals_Bank/search.php">
        <div class="sub-main" style = "position:fixed; left:-50px; bottom:30px;">
                <button class="button-three"  margin left="0px">Back</button>
        </div>
        </form>
        <center><table style="margin-top:1%">
                <tr>
                    <th>Bank Id</th>
                    <th>Name</th>
                    <th>Account_Type</th>
                    <th>Phone_no</th>
                    <th>Bank_Balance</th>
                    <th>More Info</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Bank_id'];?></td>
                    <td><?php echo $row['Name'];?></td>
                    <td><?php echo $row['Account_type'];?></td>
                    <td><?php echo $row['Phone_no'];?></td>
                    <td><?php echo $row['Bank_Balance'];?></td>
                    echo "<td><form action="search.php" method="POST"><div class="button-src"><input type="hidden" id='val' name="val" value="<?php echo $row['Bank_id']; ?>"><input type="submit" id="submit_btn" name="submit_btn" value="Details"></div></form></td>";
                </tr>
                <?php endwhile;?>
            </table></center>
    </body>
</html>