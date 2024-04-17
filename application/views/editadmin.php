<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Page</title>
</head>

<body>
    <?php require ('header.php'); ?>

    <div class="container-fluid "style="height: 91.1vh; padding-top: 60px;">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-2 bg-light" style="margin-left: -30px; height: 91.1vh;">
                    <!-- sidenavbar -->
                    <?php require ('sidenavbar.php') ?>
                    <!-- ends -->
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="jumbotron my-5">
                        <h4 class="text-center">Update your Credentials</h4>

                        <form action="<?php echo base_url(); ?>index.php/newlogin/updateAdmin" method="post"
                            id="updateForm">
                            <div class="mb-3" style="display: flex; flex-direction: column;">
                                <input type="hidden" name="newId" value="<?php echo $editId; ?>">
                                <label>Type here your new Username</label>
                                <input type="text" name="newUsername" value="<?php echo $editUsername; ?>" required>
                                <label>Type here your new Password
                                        <div>
                                        <p style="margin-bottom: 1px; color: grey; font-size: 10px;">(Note: The password must contain: <b>lowercase letter</b>, <b>uppercase letter</b>, minimum of <b>8 characters</b> and a <b>number</b>.)</p>
                                        </div>
                                </label>
                                <input type="text" name="newPassword" value="<?php echo $editPassword; ?>"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    required>
                                    <select name="newspecialization" class="form-select my-2"  required>
                                        <option value="<?php echo $editspecialization;?>" style="color: grey;">Type of user</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>
                            </div>
                            <button class="btn btn-danger mx-2" style="float: right;" id="cancelButton">Cancel</button>
                            <button type="submit" name="update" class="btn btn-primary"
                                style="float: right;">Update</button>
                        </form>

                        <!-- SweetAlert JavaScript code -->
                        <script>
                            document.getElementById('cancelButton').addEventListener('click', function () {
                                window.location.href = '<?php echo base_url(); ?>index.php/newlogin/addAdmin';
                            });
                        </script>
                        <script>
                            document.getElementById('updateForm').addEventListener('submit', function (e) {
                                e.preventDefault(); // Prevent default form submission

                                // Submit the form via AJAX
                                $.ajax({
                                    type: 'POST',
                                    url: '<?php echo base_url(); ?>index.php/newlogin/updateAdmin',
                                    data: $(this).serialize(), // Serialize form data
                                    success: function (response) {
                                        // Show Sweet Alert upon successful update
                                        Swal.fire({
                                            title: "Updated Succesfully!",
                                            text: "Your changes have been saved",
                                            icon: "success"
                                        }).then(function () {
                                            window.location.href = '<?php echo base_url(); ?>index.php/newlogin/addAdmin';
                                        });
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        // Handle error if update fails
                                        Swal.fire({
                                            title: "Error!",
                                            text: "Failed to update admin. Please try again.",
                                            icon: "error"
                                        });
                                    }
                                });
                            });
                        </script>








                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>