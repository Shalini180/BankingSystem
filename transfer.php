<?php
session_start();
$hosid = $_SESSION['user_name'];
$con = mysqli_connect("localhost", "root", "","shalsbank");
if(isset($_POST['submit'])){
    $rec = $_POST['acc'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $sql="SELECT * FROM `customerdetails` WHERE `Bank_id`='$hosid'";
    $s="SELECT * FROM `customerdetails` WHERE `Bank_id`='$rec'";
    $query_run1=mysqli_query($con,$sql);
    $query_run2=mysqli_query($con,$s);
    $row = mysqli_fetch_array($query_run1);
    $row1 = mysqli_fetch_array($query_run2);
    if($row['Bank_Balance']>=$amount)
    {
        $query = "INSERT INTO transfer(`payer`, `receiver`, `amount`, `date`) VALUES ('$hosid','$rec','$amount','$date')";
        $query_run=mysqli_query($con,$query);
        if($query_run){
                $b=$row['Bank_Balance']-$amount;
                $up1="UPDATE `customerdetails` SET Bank_Balance = '$b' WHERE Bank_id = '$hosid'";
                $c=$row1['Bank_Balance']+$amount;
                $up2="UPDATE `customerdetails` SET Bank_Balance = '$c' WHERE Bank_id = '$rec'";
                $query_run2=mysqli_query($con,$up1);
                $query_run3=mysqli_query($con,$up2);
                echo '<script type="text/javascript"> alert("Transaction is successfull");</script>';

            }
        else{
                echo '<script type="text/javascript"> alert("There is some error. Try again.");</script>';}
    }
    else{
        echo '<script type="text/javascript"> alert("The amount to be tranfered is less than the account balance");</script>';

    }
    }
    mysqli_close($con);
?>
<html>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Bigshot+One); 
body{background-color: #000000;border-radius: 6px;padding: 0%;margin: 0%;}
.style1{font-family: 'Bigshot One';font-size: 70px;letter-spacing: 0.3cm;color: #FFFFFF;text-shadow: 3px 5px 2px #474747;}
.form{width:340px;height:440px;background:#e6e6e6;border-radius:8px;box-shadow:0 0 40px -10px #000;margin:calc(50vh - 220px) auto;padding:20px 30px;max-width:calc(100vw - 40px);box-sizing:border-box;font-family:'Montserrat',sans-serif;margin-top:0%}
h2{margin:10px 0;padding-bottom:10px;width:180px;color:#78788c;border-bottom:3px solid #78788c}
input{width:100%;padding:10px;box-sizing:border-box;background:none;outline:none;resize:none;border:0;font-family:'Montserrat',sans-serif;transition:all .3s;border-bottom:2px solid #bebed2}
input:focus{border-bottom:2px solid #78788c}
p:before{content:attr(type);display:block;margin:28px 0 0;font-size:14px;color:#5a5a5a}
button{float:right;padding:8px 12px;margin:8px 0 0;font-family:'Montserrat',sans-serif;border:2px solid #78788c;background:0;color:#5a5a6e;cursor:pointer;transition:all .3s}
button:hover{background:#78788c;color:#fff}
div{content:'Hi';position:absolute;bottom:-15px;right:-20px;background:#50505a;color:#fff;width:320px;padding:16px 4px 16px 0;border-radius:6px;font-size:13px;box-shadow:10px 10}
.button-three {
    text-align: center;
    cursor: pointer;
    font-size:24px;
    margin: 0 0 0 100px;
    position: relative;
    background-color: #f39c12;
    border: none;
    padding: 20px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
}

.button-three:hover{
   background:#fff;
   box-shadow:0px 2px 10px 5px #97B1BF;
   color:#000;
}

.button-three:after {
    content: "";
    background: #f1c40f;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px !important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button-three:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}
</style>
</head>
<body>
<center><h1 class="style1">SHALS INTERNATIONAL BANK</h1></center>
<form class="form" action="transfer.php" method="post">
<h2>TRANSFER</h2>
<p type="Account_No:"><input placeholder="Receiver Account no" id='acc' name="acc"></input></p>
<p type="Amount"><input placeholder="Amount to be debited" id='amount' name="amount"></input></p>
<p type="Date:"><input placeholder="Date" id='date' name="date"></input></p>
<button id="submit" name="submit">Transfer</button>
</form>

<form action="http://localhost/Shals_Bank/individual.php">
<button class="button-three"  style = "position:fixed; left:0%; bottom:10%;">Back</button>
</form>
</body>
</html>