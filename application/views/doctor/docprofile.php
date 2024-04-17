<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Profile</title>
</head>

<body>
    <div class="container-fluid" style="height: 91.1vh; padding-top: 60px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 bg-light" style="margin-left: -30px; height: 91.1vh;">
                    <?php include ('sidenavbar.php'); ?>
                </div>
                <div class="col-md-2" >
                    <div class="row">
                        <center>
                            <br>
                            <img src="http://localhost/projectsample/assets/profile/doc.jfif" alt="doc.jfif"
                                style="object-fit: cover; width: 150px; height: 150px; display: block; margin: 0 auto;">

                            <br>
                            <h5>
                                <?php echo $viewfname . ' ' . $mname . ' ' . $lname; ?>
                            </h5>
                        </center>
                        <!-- <hr style="width: 90%;"> -->
                    </div>
                </div>
                <div class="col">
                    <div class="row my-1" style=" border: 1px #ccc solid">
                        <h4 style="margin-top: 10px;">DOCTOR'S INFORMATION</h4>
                        <br>
                        <div style="margin-top: 10px;">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="25%" style="background-color: gainsboro;">Firstname</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $viewfname; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Middlename</td>
                                        <td>
                                            <?php echo $mname; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Lastname</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $lname; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>
                                            <?php echo $bday; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Gender</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $gender; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Civil Status</td>
                                        <td>
                                            <?php echo $cstatus; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Religion</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $religion; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number</td>
                                        <td>
                                            <?php echo $contact; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Email Address</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $email; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td>
                                            <?php echo $weight; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Height</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $height; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Educational Attainment</td>
                                        <td>
                                            <?php echo $course; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: gainsboro;">Specialization</td>
                                        <td style="background-color: gainsboro;">
                                            <?php echo $specialization; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>
                                            <?php echo $username; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>