<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- sweet alert -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">





</head>

<body>




    <!-- <nav class="navbar navbar-expand-lg navbar-info bg-info"> -->
    <nav class="navbar navbar-expand-lg navbar-info bg-info" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000;">        

        <div class="container-fluid">
            <h5 class="text-white">HOSPITAL MANAGEMENT SYSTEM</h5>
            <div class="mr-auto"></div>
            <ul class="navbar-nav">


            
                <?php if ($this->session->userdata('username')): ?>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>index.php/newlogin/editAdmin" class="nav-link text-white">
                            <?php echo $this->session->userdata('username'); ?>
                        </a></li>
                    <li class="nav-item"><a href="<?php echo base_url() ?>index.php/newlogin/logout"
                            class="nav-link text-white">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="<?php echo base_url() ?>index.php" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item"><a href="<?php echo base_url() ?>index.php/newlogin/loginpage"
                            class="nav-link text-white">Admin</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white">Doctor</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-white">Patient</a></li>
                <?php endif; ?>



             
            </ul>
        </div>

    </nav>