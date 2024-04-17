<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>

<?php require('header.php');?>

<div class="container-fluid" style="height: 91.1vh; padding-top: 60px;">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2 bg-light" style="margin-left: -30px; height: 91.1vh;">
                <!-- sidenavbar -->
                <?php require('sidenavbar.php') ?>
                <!-- ends -->
            </div>
            <div class="col-md-10">
                <h4 class="my-2">Admin Dashboard</h4>
                <div class="col-md-12 my-1">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                        if (isset($queryAdmin)) {
                                            echo "<h5 class='my-2 text-white' style='font-size: 30px'> $queryAdmin </h5>";
                                        } else {
                                            echo "<h5 class=' text-white' > No data available </h5>";
                                        }
                                        ?>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Administrators</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url()?>index.php/newlogin/addAdmin">
                                            <i class="fa fa-users-gear fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">                                        
                                    <?php
                                        if (isset($queryDoctor)) {
                                            echo "<h5 class='my-2 text-white' style='font-size: 30px'> $queryDoctor </h5>";
                                        } else {
                                            echo "<h5 class=' text-white' > No data available </h5>";
                                        }
                                        ?>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url()?>index.php/doctorController/dashboard">
                                            <i class="fa fa-user-doctor fa-3x my-4" style="color: silver;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patients</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <i class="fa fa-bed fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-danger mx-2 my-3 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Reports</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <i class="fa fa-folder fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-warning mx-2 my-3 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Requests</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <i class="fa fa-handshake fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-success mx-2 my-3 shadow" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#">
                                            <i class="fa fa-circle-dollar-to-slot fa-3x my-4" style="color: white;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>