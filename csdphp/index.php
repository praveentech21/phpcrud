<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['user'])) header("location:login.html");
$username = $_SESSION['user'];

$data = "select * from users";
$resutls = mysqli_query($conn, $data);

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Campus Online Admin</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="Bhavani/img/cup.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="Bhavani/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

  <script src="Bhavani/vendor/js/helpers.js"></script>

  <script src="Bhavani/js/config.js"></script>


</head>

<body>

  <!-- Sidebar Starts Here Shiva -->
  <?php include 'header.php'; ?>
  <!-- Sidebar Ends Here Shiva -->

  <!-- Content Starts Here Shiva-->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

      <!-- Bordered Table -->
      <div class="card">
        <h5 class="card-header">Game certificate</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="registrationTable">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>REGISTRATION NO</th>
                  <th>DEPARTMENT</th>
                  <th>edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($resutls)) {
                ?>
                  <tr>
                    <td><strong><?php echo $row['player_name'] ?></strong></td>
                    <td><?php echo $row['regno'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><button type="button" name="conformpayment" class="btn rounded-pill btn-primary editstatus" data-cilaka = "<?php echo $row['regno'] ?>">Certificate</button></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Bordered Table -->


    </div>
  </div>
  <!-- Content Ends Here Shiva -->

  <!-- Footer Starts Here Shiva-->
  <?php include 'footer.php'; ?>
  <!-- Footer Ends Here Shiva-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.editstatus').click(function(){
        var registernumber = $(this).data('cilaka');
        $.ajax({
          url:"ajax.php",
          method:"POST",
          data:{
            regno:registernumber
          },
          datatype:'json',
          success:function(data){
            var re = json_decode(data);
            if(re.success == 1){
              alert("success");
            }
            else{
              alert("failed");
            }
          }

        })

      });

    });
  </script>

</body>

</html>