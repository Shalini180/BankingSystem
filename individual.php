<?php
session_start();
if(isset($_SESSION['name'])){
$hid=$_SESSION['name'];
$connection = mysqli_connect("localhost", "root", "","shalsbank");
$sql="SELECT * FROM carddetails WHERE `Bank_id`='$hid'";
$query = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($query);
$_SESSION['user_name']=$hid;
}
?>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="individual.css">
    <script src="https://kit.fontawesome.com/9c37986c06.js" crossorigin="anonymous"></script>
    <style>
      @import url(https://fonts.googleapis.com/css?family=Bigshot+One);
      .nav{
      background-color:#003152;
      height: 10%;
      border-color: thistle;
      box-shadow: lightskyblue;
      margin-top:-1%}
      .style1
    {
  font-family: 'Bigshot One', serif;
  font-size: 70px;
  letter-spacing: 0.3cm;
  color: #FFFFFF;
  text-shadow: 3px 5px 2px #474747;
  margin-top:0%;
  margin-left:10%;
  }
  .sub-main{
    width: 30%;
    float: left;
  }
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
    -webkit-transition-duration: 0.4s;
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
<body style="background-color:#000000">
<div class="nav">
        <center><h1 class="style1">SHALS INTERNATIONAL BANK</h1></center>
</div>
<div class="container" >
  <div class="title">
    <h1 class="payment" style="margin-top:2%; font-size: 72px;">DETAILS</h1>
  </div>
  <div class="column">
    <div class="card" id="card">
      <div class="card-inner">
        <div class="card-front">
          <h1>&#9884; <p style="margin: -35px 0 0 140px; font-size: 32px;">Shals Bank</p>
          </h1>
          <div class="box">
            <span style="color: #9a0; font-size: 70px;margin-top: -10px;">&#9580;</span>
          </div>
          <div class="div1">
            <span style="color: #ddd; font-size:10px; position: absolute; top:20px;left:1%">&#10089;</span>
            <span style="color: #ddd; font-size:20px;position: absolute; top:13px; left:10%">&#10089;</span>
            <span style="color: #ddd; font-size:30px;position: absolute; top:6px;left:20%">&#10089;</span>
            <span style="color: #ddd; font-size:40px;position: absolute; top:-1px;left:40%">&#10089;</span>
          </div>
          <span class="h3span" id="cardnumber1">0000</span>
          <span class="h3span" id="cardnumber2">0000</span>
          <span class="h3span" id="cardnumber3">0000</span>
          <span class="h3span" id="cardnumber4">0000</span>
          <div class="icon" id="icon">
            <i class="fa fa-cc-mastercard" id="ico2" style="display: none; top:40%"></i>
          </div>
          <p class="pwrite" id="expire">Expiracy Date</p>
          <p class="pwrite" id="cardname" style="margin-top: -10px;">Card Holder</p>
          <p class="pwrite" id="sortcode" style="margin-top: -10px;">Sort Code</p>
        </div>
        <br>

        <div class="card-back">
          <div class="strip">
          </div>
          <p style="font-size: 12px; margin:20px 10px 5px 10px;">AUTHORISED SIGNATURE</p>
          <div class="sigstrip">
            <span class="sig" style="color:#000;">Sig Nature</span>
            <div class="input" id="sec">000</div>
          </div>
          <div class="info">
            <p>If you have any enquiries about this purchase, please ring:</p>
            <p class="pwrite" style="top: -15px;left: 0;font-size:12px;">935265167789 &#8470;</p>
          </div>

          <div class="square">
            <span style="font-size: 30px; color:#ddd;">&#10051;</span>
          </div>
          <div class="infone">
            <p style="margin-top: -5px"><b>If you card is lost or stolen please contact your provider.if found hand in to a branch of the provider.</b></p>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>

  <div class="column" id="column">

    <form name="form1" id="form1" action="method=post">
      <br>
      <label>Name on Card:</label>
      <input type="text" id="name" value="<?php echo $row['Name']; ?>">
      <script>
      var name = '<?php echo $row['Name']?>';
      document.getElementById("cardname").innerHTML = name;</script>
      <br>
      <label>Card Number:</label>
      <input type="text" id="cdnum1" value="<?php echo $row['cdnum1']; ?>">
      <script>
      var cdnum1 = '<?php echo $row['cdnum1']?>';
      document.getElementById("cardnumber1").innerHTML = cdnum1;
      </script>
      <input type="text" id="cdnum2" value="<?php echo $row['cdnum2']; ?>">
      <script>
      var cdnum2 = '<?php echo $row['cdnum2']?>';
      document.getElementById("cardnumber2").innerHTML = cdnum2;
      </script>
      <input type="text" id="cdnum3" value="<?php echo $row['cdnum3']; ?>">
      <script>
      var cdnum3 = '<?php echo $row['cdnum3']?>';
      document.getElementById("cardnumber3").innerHTML =cdnum3;
      </script>
      <input type="text" id="cdnum4" value="<?php echo $row['cdnum4']; ?>">
      <script>
      var cdnum4 = '<?php echo $row['cdnum4']?>';
      document.getElementById("cardnumber4").innerHTML = cdnum4;
      </script>
      <br>
      <label>Expiracy Date:</label>
      <input type="text" id="exdate" value="<?php echo $row['expiry']; ?>">
      <script>
      var expiry = '<?php echo $row['expiry']?>';
      document.getElementById("expire").innerHTML = "Expiracy Date" + " " + expiry;
      </script>
      <br>
      <label>Sort Code:</label>
      <script>
      var sort = '<?php echo $row['sort']?>';
      document.getElementById("sortcode").innerHTML = "Sort Code" + " " + sort;
      </script>
      <input type="text" id="sort" value="<?php echo $row['sort']; ?>">
      <br><label>Card Type:</label>
      <script>
        document.getElementById("ico2").style.display = "none";
        document.getElementById("ico2").style.display = "block";
        document.getElementById("cardType").innerHTML = "Mastercard";
      </script>
      <i class="fa fa-cc-mastercard" id="fa-fa-cc-mastercard1"></i><br>
      <label>Security Number (back of card):</label>
      <input type="text" id="security"value="<?php echo $row['cvv']; ?>">
      <script>
      var sort = '<?php echo $row['cvv']?>';
      document.getElementById("sec").innerHTML = sort;
      </script>
      <br>
    </form>
  </div>
</div>
<form action="transfer.php" method="post">
<div class="sub-main" name="transfer" style = "position:fixed; left:45%; bottom:18%;">
<button class="button-three"  margin left="0px">Transfer Money</button>
</div>
</form>
<form action="history.php" method="post">
<div class="sub-main" name="history" style = "position:fixed; left:30%; bottom:18%;">
<button class="button-three"  margin left="0px">Transaction History</button>
</div>
</form>
</body>
</html>