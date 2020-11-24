<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
 <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <?php
include 'config/connect.php';
$id = rand(1, 6);
$date = date("Y-m-d");
$sql = "SELECT * FROM lunch WHERE date = ?  ";
$stmt = $conn->prepare($sql);
$stmt->execute([$date]);
$lunch = $stmt->fetch(PDO::FETCH_OBJ);
//  var_dump($lunch);
if ($lunch == false) {
    $sql = "UPDATE lunch SET date = ?  where id = ? ";
    $stmt = $conn->prepare($sql);
    // var_dump($id);
    $stmt->execute([$date, $id]);
    $sql = "SELECT * FROM lunch WHERE date = ?  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$date]);
    $lunch = $stmt->fetch(PDO::FETCH_OBJ);
}
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST['name'])) {
    $sent = " "; 
    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $phone = $_POST["phoneN"];
    $adress = $_POST["adress"];
    $name = $_POST['name'];
    $email = "admin@resturent.com";
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $sql = " INSERT INTO  commande ( `first_name`, `last_name`, `phone`, `adress`) VALUES (?, ?, ?, ?) "; 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstname,$lastname,$phone,$adress]);
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();
    //SMTP Settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "mahdisouilmi95@gmail.com";
    $mail->Password = '';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("mahdisouilmi95@gmail.com"); //enter you email address
    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>
<div id="cardHolder" >
<h4 class="sent-notification">   </h4>
  <center><h2>The lunch of the day is <strong> <?php echo $lunch->Name ?> </strong></h2> </center>
  <!-- Card -->
<div class="card">
<!-- Card image -->
<div class="viewoverlay">
  <img class="card-img-top" id="img" src="<?php echo $lunch->picture ?>"
    alt="Card image cap">
  <a href="#!">
    <div class="mask rgba-white-slight"></div>
  </a>
</div>
<!-- Card content -->
<div class="card-body">
  <!-- Title -->
   <center> <h4 class="card-title"><?php echo $lunch->Name ?></h4> </center>
  <!-- Text -->
  <p class="card-text"> <?php echo $lunch->description ?></p>
  <!-- Button -->
   <center> <a  id="btn" class="btn btn-primary"  data-toggle="modal" data-target="#modalRegisterForm"> commander </a> </center>
</div>
</div>
<!-- Card -->
</div>
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"> Your informations <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myForm" >
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="firstName"> Your First name</label>
          <input type="text" id="firstName" class="form-control validate"  required>

        </div>
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="lastName"> Your last name </label>
          <input type="ltext"  id="lastName" class="form-control validate"  required>

        </div>

        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="phoneNumber">Your phone number</label>
          <input type="tel" id="phoneNumber"  class="form-control validate" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
       required>

        </div>
        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="adress">Your Adress </label>
          <textarea id="adress" class="form-control validate"> </textarea>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="confirm"  onclick="sendEmail()" >Confirme</button>
      </div>
    </form>
    </div>
  </div>
</div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">

            function sendEmail() {
            var firstName = $("#firstName");
            var lastName = $("#lastName");
            var phone = $("#phoneNumber");
            var adress = $("#adress");
            console.log(phone)
            
            if (isNotEmpty(firstName) && isNotEmpty(lastName) && isNotEmpty(phone) && isNotEmpty(adress)) {
                $.ajax({
                   url: 'index.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                      firstName : firstName.val(),
                      lastName : lastName.val(),
                      phoneN : phone.val(),
                      adress : adress.val(),
                       name: firstName.val() + lastName.val(),
                       email: "resturant@admin.com",
                       subject: "order",
                       body: " hello souilmi, <br> we have a new order from  <strong> " + firstName.val() + " " + lastName.val() + " </strong> , <br> phone : <strong>   " + phone.val() + " </strong>, <br> delivery address : <strong>"
                         + adress.val() + "</strong>"
                   }, success: function (response) {
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
  </body>
</html>