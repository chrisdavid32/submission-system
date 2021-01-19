<?php
session_start();
ob_start();
include('../include/config.php');
include('./external/header.php');
is_admin();
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="staff.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Add Staff
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="department.php" class="nav-link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                    Add Department
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="course.php" class="nav-link active">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Add Course
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="allocate.php" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Course Allocation
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="view_allocate.php" class="nav-link">
                <i class="nav-icon fas fa-eye"></i>
                <p>
                    View Allocation
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <?php
                    include('add_c.php');
                    ?>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Add Department</h3>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department</label>
                                    <select class="form-control" name="dept">
                                        <option value="">please select department</option>
                                        <?php
                                        $go = "select * from course order by course_name ASC";
                                        $qy = mysqli_query($con, $go);
                                        $sn = 0;
                                        while ($quy = mysqli_fetch_assoc($qy)) {
                                            $sn++; ?>

                                            <option value="<?php print($quy['course_id']); ?>"><?php print ucwords($quy['course_name']); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Level</label>
                                    <select class="form-control" name="level">
                                        <option value="" selected="">please select level</option>
                                        <option value="ND1">ND1</option>
                                        <option value="ND2">ND2</option>
                                        <option value="ND1">HND1</option>
                                        <option value="ND2">HND2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Course Title</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Course Code</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="code">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Course</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
                <!-- /.card -->

                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><strong>List of Registered Courses</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php

                                $data = "select * from upload order by dept ASC";

                                $qy = mysqli_query($con, $data);
                                $sn = 0;
                                while ($quy = mysqli_fetch_array($qy)) {
                                    $sn++;
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php print($sn); ?></td>
                                            <?php $for = mysqli_fetch_array(mysqli_query($con, "select * from course where course_id='{$quy['dept']}'"));
                                            ?>
                                            <td><?php print ucwords(($for['course_name'])); ?></td>
                                            <td><?php print strtoupper(($quy['level'])); ?></td>
                                            <td><?php print ucwords(($quy['title'])); ?></td>
                                            <td><?php print strtoupper(($quy['code'])); ?></td>
                                            <td><a href="delete_c.php?id=<?php print($quy['id']); ?>" class="btn btn-danger">Delete </a>
                                            </td>
                                        <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!-- /.row -->
        <!-- /.container-fluid -->
    </section>
</div>

<?php
include('./external/footer.php');
?>