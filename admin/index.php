<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/animations.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/admin.css">

  <title>Home</title>

  <style>
    .dashbord-tables {
      animation: transitionIn-Y-over 0.5s;
    }

    .filter-container {
      animation: transitionIn-Y-bottom 0.5s;
    }

    .sub-table {
      animation: transitionIn-Y-bottom 0.5s;
    }
  </style>

</head>

<body>

  <?php
    
    session_start();
    
    if(isset($_SESSION["user"])){
      if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
        header("location: ../login.php");
      }

    }else{
      header("location: ../login.php");
    }
    

    include("../connection.php");

    
    $today = date('Y-m-d');

    $patientrow = $database->query("SELECT * FROM patient;");

    $doctorrow = $database->query("SELECT * FROM doctor;");

    $appointmentrow = $database->query("SELECT * FROM appointment WHERE appodate >= '$today';");

    $schedulerow = $database->query("SELECT * FROM schedule WHERE scheduledate = '$today';");

  ?>

  <div class="container">

    <div class="menu">

      <table class="menu-container" border="0">

        <tr>
          <td style="padding:10px" colspan="2">

            <table border="0" class="profile-container">

              <tr>
                <td width="30%" style="padding-left:20px">
                  <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                </td>

                <td style="padding:0px;margin:0px;">
                  <p class="profile-title">Admin</p>
                  <p class="profile-subtitle">admin@gmail.com</p>
                </td>

              </tr>

              <tr>
                <td colspan="2">
                  <a href="../logout.php">
                    <input type="button" value="Logout" class="logout-btn btn-primary-soft btn">
                  </a>
                </td>
              </tr>

            </table>

          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
            <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
              <div>
                <p class="menu-text">Home</p>
              </div>
            </a>
          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-doctor">
            <a href="doctors.php" class="non-style-link-menu">
              <div>
                <p class="menu-text">Organization</p>
              </div>
            </a>
          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-schedule">
            <a href="schedule.php" class="non-style-link-menu">
              <div>
                <p class="menu-text">Event</p>
              </div>
            </a>
          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-appoinment">
            <a href="appointment.php" class="non-style-link-menu">
              <div>
                <p class="menu-text">Scheduled</p>
              </div>
            </a>
          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-patient">
            <a href="patient.php" class="non-style-link-menu">
              <div>
                <p class="menu-text">User</p>
              </div>
            </a>
          </td>
        </tr>

        <tr class="menu-row">
          <td class="menu-btn menu-icon-patient">
            <a href="aview_record.php" class="non-style-link-menu">
              <div>
                <p class="menu-text">Record</p>
              </div>
            </a>
          </td>
        </tr>

      </table>

    </div>

    <div class="dash-body" style="margin-top: 15px">

      <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

        <tr>

          <td colspan="2" class="nav-bar">

            <form action="doctors.php" method="post" class="header-search">

              <input type="search" name="search" class="input-text header-searchbar" placeholder="Search by name or email" list="doctors">
              
              <datalist id="doctors">
              </datalist>

              <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

            </form>

          </td>

          <td width="15%">
            <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
              To day
            </p>
            <p class="heading-sub12" style="padding: 0;margin: 0;">
              <?php echo $today; ?>  
            </p>
          </td>

          <td width="10%">
            <button class="btn-label" style="display: flex;justify-content: center;align-items: center;">
              <img src="../img/calendar.svg" width="100%">
            </button>
          </td>

        </tr>

        <tr>
          
          <td colspan="4">

            <center>

              <table class="filter-container" style="border: none;" border="0">

                <tr>
                  <td colspan="4">
                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                  </td>
                </tr>

                <tr>

                  <td style="width: 25%;">
                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">

                      <div>
                        <div class="h1-dashboard">
                          <?php echo $doctorrow->num_rows; ?>
                        </div>
                        <br>

                        <div class="h3-dashboard">
                          Organization &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        </div>

                      </div>

                      <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctors-hover.svg');"></div>

                    </div>
                  </td>

                  <td style="width: 25%;">

                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">

                      <div>
                        <div class="h1-dashboard">
                          <?php echo $patientrow->num_rows; ?>
                        </div>
                        <br>

                        <div class="h3-dashboard">
                          User &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                      </div>

                      <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patients-hover.svg');"></div>

                    </div>

                  </td>

                  <td style="width: 25%;">

                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">

                      <div>
                        <div class="h1-dashboard">
                          <?php echo $appointmentrow->num_rows; ?>  
                        </div>
                        <br>

                        <div class="h3-dashboard">
                          Event &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                        </div>

                      </div>

                      <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book-hover.svg');">
                      </div>

                    </div>

                  </td>
                  
                  <td style="width: 25%;">

                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">

                      <div>
                        <div class="h1-dashboard">
                          <?php echo $schedulerow->num_rows; ?>
                        </div>
                        <br>

                        <div class="h3-dashboard" style="font-size: 15px">
                          Scheduled Today
                        </div>

                      </div>

                      <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>

                    </div>

                  </td>

                </tr>

              </table>

            </center>

          </td>

        </tr>

      </table>

    </div>

  </div>

</body>

</html>