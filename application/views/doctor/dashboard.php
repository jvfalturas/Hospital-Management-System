<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweet alert -->

    <title>Doctor's Dashboard</title>
</head>

<body>

    <div class="container-fluid" style="height: 91.1vh; padding-top: 60px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 bg-light" style="margin-left: -30px; height: 91.1vh;">
                    <?php include ('sidenavbar.php'); ?>
                </div>
                <div class="col-md-10 mx-2">
                    <div class="row">
                        <h4 class="text-center ">LIST OF DOCTORS</h4>
                        <table class="table table-bordered">
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">ID</th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">First name
                            </th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">M.I.</th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Last name
                            </th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Gender</th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Address</th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Contact No.
                            </th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Specialization</th>
                            <th class="text-center text-white" style="background-color: rgb(0, 153, 204);">Actions</th>


                            <?php foreach ($doctors as $doc): ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $doc->id; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->fname; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->mname; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->lname; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->gender; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->address; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->contact; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $doc->specialization; ?>
                                    </td>
                                    <td class="text-center" style="display: flex; justify-content: center;">
                                        <form action="#" style="margin-right: 5px;" method="post">
                                            <button class="btn"
                                                style="background-color: goldenrod; color: white; border-radius: 3px; padding: 5px 10px; font-size: 12px;">EDIT</button>
                                        </form>
                                        <form action="<?php echo base_url(); ?>index.php/doctorController/docprofile" method="post">
                                        <input type="hidden" name="viewfname" value="<?php echo $doc->fname; ?>">
                                        <input type="hidden" name="lname" value="<?php echo $doc->lname; ?>">
                                        <input type="hidden" name="mname" value="<?php echo $doc->mname; ?>">
                                        <input type="hidden" name="bday" value="<?php echo $doc->bday; ?>">
                                        <input type="hidden" name="gender" value="<?php echo $doc->gender; ?>">
                                        <input type="hidden" name="cstatus" value="<?php echo $doc->cstatus; ?>">
                                        <input type="hidden" name="religion" value="<?php echo $doc->religion; ?>">
                                        <input type="hidden" name="contact" value="<?php echo $doc->contact; ?>">
                                        <input type="hidden" name="email" value="<?php echo $doc->email; ?>">
                                        <input type="hidden" name="weight" value="<?php echo $doc->weight; ?>">
                                        <input type="hidden" name="height" value="<?php echo $doc->height; ?>">
                                        <input type="hidden" name="course" value="<?php echo $doc->course; ?>">
                                        <input type="hidden" name="specialization" value="<?php echo $doc->specialization; ?>">
                                        <input type="hidden" name="username" value="<?php echo $doc->username; ?>">
                                            <button class="btn"
                                                style="background-color: dodgerblue; color: white; border-radius: 3px; padding: 5px 10px; font-size: 12px;">VIEW</button>
                                        </form>
                                    </td>


                                </tr>
                            <?php endforeach; ?>


                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>