<?php
session_start();
$hosid = $_SESSION['user_name'];
$sql="SELECT * FROM `transfer` WHERE `payer`='$hosid'";
$s="SELECT * FROM `transfer` WHERE `receiver`='$hosid'";
$query="SELECT * FROM `customerdetails` WHERE `Bank_id`='$hosid'";
$search_result = filterTable($sql);
$search = filterTable($s);
$row1=filterTable($query);
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "","shalsbank");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<html>
    <head>
    <link rel="stylesheet" href="homepage.css">  
    <style>
        @import url(https://fonts.googleapis.com/css?family=Bungee);
            table,tr,th,td
            {
                border: 1px solid white;
                color:white; font-size:18pt;
            }
            .style2{
                font-family: 'Bungee';
                font-size: 50px;
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
    <div class="style2" style="margin-top:-2%">Transaction Details</div>
    <h1 style="color:#FFFFFF;margin-top:-2%" align="center">Transfered</h1>
    <center><table style="margin-top:-1%">
                <tr>
                    <th>Payer</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['payer'];?></td>
                    <td><?php echo $row['receiver'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><?php echo $row['date'];?></td>
                </tr>
                <?php endwhile;?>
            </table></center>
            <h1 style="color:#FFFFFF" align="center">Received</h1>
            <center><table style="margin-top:-1%">
                <tr>
                    <th>Payer</th>
                    <th>Receiver</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                <?php while($row2 = mysqli_fetch_array($search)):?>
                <tr>
                    <td><?php echo $row2['payer'];?></td>
                    <td><?php echo $row2['receiver'];?></td>
                    <td><?php echo $row2['amount'];?></td>
                    <td><?php echo $row2['date'];?></td>
                </tr>
                <?php endwhile;?>
            </table></center>
            <?php $row3 = mysqli_fetch_array($row1);?>
            <div class="style2" style="margin-top:-1%">Bank Balance:<?php echo $row3['Bank_Balance'];?></div>
            <div class="sub-main" style = "position:fixed; left:-50px; bottom:30px;">
                <form action="http://localhost/Shals_Bank/search.php">
                <button class="button-three"  margin left="0px">Back</button>
                <?php
                unset($_SESSION['user_name']);
                ?>
                </form>
        </div>
</html>