<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrators</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweet alert -->

</head>

<body>


    <div class="container-fluid" style="height: 91.1vh; padding-top: 60px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 bg-light" style="margin-left: -30px; height: 91.1vh;">
                    <!-- sidenavbar -->
                    <?php require ('sidenavbar.php') ?>
                    <!-- ends -->
                </div>
                <div class="col-md-10">
                    <div class="col-md-13">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center ">User Accounts</h5>



                                <table class="table table-bordered">

                                    <div class="topnav my-2" style="float: right;">
                                            <form action="<?php echo base_url(); ?>index.php/newlogin/searchUsername"
                                                method="post">
                                                <label>Search</label>
                                                <input type="text" name="searchUsername" placeholder="Search..."
                                                    autocomplete="off" >
                                                <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
                                            </form>

                                        <?php if (!empty ($searchResult)): ?>
                                            <!-- Display search result here -->
                                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">ID</th>
                                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Username</th>
                                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Status</th>
                                            <th class="text-center text-white" style="width: 35%; background-color: rgb(0, 153, 204);">Action</th>
                                            <tr>
                                                
                                                <?php foreach ($searchResult as $result): ?>                                                 
                                                   <td class="text-center"><?php echo $result['id']; ?></td>
                                                   <td class="text-center"><?php echo $result['username']; ?></td>
                                                   <td class="text-center"><?php echo $result['specialization']; ?></td>  
                                                     
                                                <?php endforeach; ?>   
                                                
                                            </tr>                                         
                                        <?php else: ?>
                                            <!-- <tr>
                                                <td colspan="4" class="text-center">No results found.</td>
                                            </tr> -->
                                        

                                   
                                    <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">ID</th>
                                    <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Username</th>
                                    <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Status</th>
                                    <th class="text-center text-white" style="width: 35%; background-color: rgb(0, 153, 204);">Action</th>
                                    


                                    <?php if (empty ($newAdmins)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No results found.</td>
                                        </tr>
                                        

                                    <?php else: ?>


                                        <?php foreach ($newAdmins as $admin): ?>


                                            
                                         
                                            <tr>

                                                <td class="text-center">
                                                    <?php echo $admin['id']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $admin['username']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $admin['specialization']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <!-- Add action buttons here if needed -->
                                                    <form action="<?php echo base_url(); ?>index.php/newlogin/editAdmin"
                                                        method="post" style="display: inline;">
                                                        <input type="hidden" name="editId" value="<?php echo $admin['id'] ?>">
                                                        <input type="hidden" name="editUsername"
                                                            value="<?php echo $admin['username'] ?>">
                                                        <input type="hidden" name="editPassword"
                                                            value="<?php echo $admin['password'] ?>">
                                                        <input type="hidden" name="editspecialization"
                                                            value="<?php echo $admin['specialization'] ?>">
                                                        <button type="submit" name="edit" class="btn btn-info">Update</button>

                                                    </form>
                                                    <form
                                                        action="<?php echo base_url(); ?>index.php/newlogin/deleteAdminControllerMethod"
                                                        method="post" style="display: inline;">
                                                        <input type="hidden" name="deleteId" value="<?php echo $admin['id'] ?>">
                                                        <button type="submit" name="delete"
                                                            class="btn btn-danger">Remove</button>
                                                    </form>

                                                    <script>
                                                        $(document).ready(function () {
                                                            // Event listener para sa Remove button
                                                            $('.btn-danger').click(function (e) {
                                                                e.preventDefault();

                                                                // Kunin ang ID ng admin na gusto mong burahin
                                                                var adminId = $(this).closest('tr').find('input[name="deleteId"]').val();

                                                                // Ipakita ang SweetAlert message
                                                                Swal.fire({
                                                                    title: 'Are you sure?',
                                                                    html: '<div>Do you really want to delete this admin?</div><div style="color: red; font-style: italic; font-size: 12px;">(Note: You won\'t be able to revert this action!)</div>',
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonText: 'Yes, delete it!',
                                                                    cancelButtonText: 'Cancel',
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        // Kung pinindut ang "Yes, delete it!" button, mag-send ng AJAX request
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: '<?php echo base_url(); ?>index.php/newlogin/deleteAdminControllerMethod',
                                                                            data: { deleteId: adminId },
                                                                            dataType: 'json',
                                                                            success: function (response) {
                                                                                // Ipakita ang success message gamit ang SweetAlert
                                                                                Swal.fire({
                                                                                    title: 'Deleted!',
                                                                                    text: 'This admin account is permanently deleted!',
                                                                                    icon: 'success'
                                                                                }).then(() => {
                                                                                    // Redirect sa admin page
                                                                                    window.location.href = '<?php echo base_url(); ?>index.php/newlogin/addAdmin';
                                                                                });
                                                                            },
                                                                            error: function () {
                                                                                // Ipakita ang error message gamit ang SweetAlert
                                                                                Swal.fire({
                                                                                    title: 'Error!',
                                                                                    text: 'Something went wrong. Please try again.',
                                                                                    icon: 'error'
                                                                                });
                                                                            }
                                                                        });
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    </script>


                                                </td>


                                            </tr>

                                            
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                    <!-- <td colspan="4">hello</td>
                                    <td >hello</td>
                                    <td >hello</td>
                                   -->

                                   <?php endif; ?>
                                   </div>
                                </table>
                            </div>


                            <div class="col-md-6">
                                <h5 class="text-center">Add New User</h5>



                                <form method="post" enctype="multipart/form-data" id="addAdminForm">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" autocomplete="off"
                                            required>
                                    </div>
                                    <div class="form-group ">
                                        <label>Password <br>
                                            <div>
                                                <p style="margin-bottom: 1px; color: grey; font-size: 10px;">(Note: The
                                                    password must contain: <b>lowercase letter</b>, <b>uppercase
                                                        letter</b>, minimum of <b>8 characters</b> and a <b>number</b>.)
                                                </p>
                                            </div>
                                        </label>
                                        <input type="password" name="password" class="form-control"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                    </div>

                                    <select name="specialization" class="form-select" required>
                                        <option value="Not specified" style="color: grey;">Type of user</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>

                                    <input type="submit" name="add" value="Add New User" class="btn btn-success my-2">
                                </form>



                                <script>
                                    document.getElementById('addAdminForm').addEventListener('submit', function (event) {
                                        event.preventDefault(); // Prevent form submission

                                        // Perform AJAX request to submit the form data
                                        $.ajax({
                                            url: '<?php echo base_url('index.php/newlogin/addAdmin'); ?>',
                                            method: 'POST',
                                            data: $(this).serialize(),
                                            success: function (response) {
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'New admin added successfully.',
                                                    icon: 'success',
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                }).then(function () {
                                                    // Redirect to a specific page after success
                                                    window.location.href = '<?php echo base_url('index.php/newlogin/addAdmin'); ?>';
                                                });
                                            },
                                            error: function (xhr, status, error) {
                                                // Handle error if AJAX request fails
                                                console.log(xhr.responseText);
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Failed to add new admin.',
                                                    icon: 'error',
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                });
                                            }
                                        });

                                    });
                                </script>


                                <!-- <script>
                                    document.getElementById('addAdminForm').addEventListener('submit', function (event) {
                                        event.preventDefault(); // Prevent form submission

                                        // Perform AJAX request to submit the form data
                                        $.ajax({
                                            url: '<?php echo base_url('index.php/newlogin/addAdmin'); ?>',
                                            method: 'POST',
                                            data: $(this).serialize(),
                                            dataType: 'json', // Specify JSON datatype for response
                                            success: function (response) {
                                                if (response.status === 'success') {
                                                    Swal.fire({
                                                        title: 'Success!',
                                                        text: response.message,
                                                        icon: 'success',
                                                        showConfirmButton: false,
                                                        timer: 2000
                                                    }).then(function () {
                                                        // Redirect or reload the page after success
                                                        window.location.href = '<?php echo base_url('index.php/newlogin/addAdmin'); ?>';
                                                    });
                                                } else if (response.status === 'error') {
                                                    Swal.fire({
                                                        title: 'Error!',
                                                        text: response.message,
                                                        icon: 'error',
                                                        showConfirmButton: true // Show confirm button to allow user interaction
                                                    });
                                                }
                                            },
                                            error: function (xhr, status, error) {
                                                // Handle error if AJAX request fails
                                                console.log(xhr.responseText);
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'This username already existed',
                                                    icon: 'error',
                                                    showConfirmButton: false,
                                                    timer: 2000
                                                }).then(function () {
                                                    // Redirect or reload the page after success
                                                    window.location.href = '<?php echo base_url('index.php/newlogin/addAdmin'); ?>';
                                                });
                                            }
                                        });
                                    });
                                </script> -->







                            </div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>