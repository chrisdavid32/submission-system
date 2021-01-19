<?php
ob_start();
include('./include/layout.php');
include('./include/config.php');
?>

<body>
    </header>
    <!-- forgot pass section -->
    <section class="forgot_pass">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-sm-7 col-md-7 col-lg-7 mx-auto">
                    <div class="forgot_wrapper">
                        <h6>Signup to create a new account </h6>
                        <?php
                        include('create.php');
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label class="control-label">Matric Number</label>
                                <input type="text" class="form-control" name="matric">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Lastname</label>
                                <input type="text" class="form-control" name="lastname">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Othername</label>
                                <input type="text" class="form-control" name="othername">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Department</label>
                                <select name="department" id="department" class="form-control">
                                    <option value="">select Department</option>
                                    <?php
                                    $go = "select * from course order by course_name ASC";
                                    $qy = mysqli_query($con, $go);
                                    $sn = 0;
                                    while ($quy = mysqli_fetch_assoc($qy)) {
                                        $sn++; ?>

                                        <option value="<?php print($quy['course_id']); ?>"><?php print($quy['course_name']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="" selected="">please select Level</option>
                                    <option value="ND1">ND1</option>
                                    <option value="ND2">ND2</option>
                                    <option value="HND1">HND1</option>
                                    <option value="HND2">HND2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Comfirm Password</label>
                                <input type="password" class="form-control" name="cpassword">
                            </div>
                            <div class="form-group register-btn">
                                <button type="submit" class="btn btn-primary reset_pass_btn" name="submit">Signup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('./include/footer.php');
    ?>