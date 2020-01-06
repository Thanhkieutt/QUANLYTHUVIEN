<?php include('includes/header.php') ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card-mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Thông Tin
                </div>
                <div class="card-body"></div>
                <h4>Thêm thông tin Nhân viên</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
                            if($_SERVER['REQUEST_METHOD']=='POST')
                            {
                                $errors=array();
                                if(empty($_POST['hoten']))
                                {
                                    $errors[]='hoten';
                                }
                                else
                                {
                                    $hoten=$_POST['hoten'];
                                }
                                if(empty($_POST['gioitinh']))
                                {
                                    $errors[]='gioitinh';
                                }
                                else
                                {
                                    $gioitinh=$_POST['gioitinh'];
                                }
                                
                                if(empty($_POST['socmnd']))
                                {
                                    $errors[]='socmnd';
                                }
                                else
                                {
                                    $socmnd=$_POST['socmnd'];
                                }
                                if(empty($_POST['diachi']))
                                {
                                    $errors[]='diachi';
                                }
                                else
                                {
                                    $diachi=$_POST['diachi'];
                                }
                                if(empty($_POST['ngaysinh']))
                                {
                                    $errors[]='ngaysinh';
                                }
                                else
                                {
                                    $ngaysinh=$_POST['ngaysinh'];
                                }
                                if(empty($_POST['bophan']))
                                {
                                    $errors[]='bophan';
                                }
                                else
                                {
                                    $bophan=$_POST['bophan'];
                                }
                                if(empty($_POST['chucvu']))
                                {
                                    $errors[]='chucvu';
                                }
                                else
                                {
                                    $chucvu=$_POST['chucvu'];
                                }
                                if(empty($errors))
                                {
                                    $hoten=$_POST['hoten'];
                                    $gioitinh=$_POST['gioitinh'];
                                    $ngaysinh=$_POST['ngaysinh'];
                                    $socmnd=$_POST['socmnd'];
                                    $diachi=$_POST['diachi'];
                                    $bophan=$_POST['bophan'];
                                    $chucvu=$_POST['chucvu'];
                                    $query="insert into nhanvien(HoTen,GioiTinh,NgaySinh,SoCMND,DiaChi,BoPhan,ChucVu) 
                                            values ('{$hoten}','{$gioitinh}','{$ngaysinh}','{$socmnd}','{$diachi}','{$bophan}','{$chucvu}')";
                                    $results=mysqli_query($dbc,$query);
                                    kt_query($results,$query);
                                    if(mysqli_affected_rows($dbc)==1)
                                    {
                                        echo "<p style='color:green'>Thêm mới thành công</p>";
                                    }
                                    else
                                    {
                                        echo "<p class='required'>Thêm mới không thành công</p>";
                                    }
                                    $_POST['hoten']='';
                                    $_POST['gioitinh']='';
                                    $_POST['ngaysinh']='';
                                    $_POST['socmnd']='';
                                    $_POST['diachi']='';
                                    $_POST['bophan']='';
                                    $_POST['chucvu']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-nhanvien" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="hoten" value="<?php if(isset($_POST['hoten'])) {echo $_POST['hoten'];} ?>" class="form-control" placeholder="Họ tên"></input>
                                <?php
                                    if(isset($errors) && in_array('hoten',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập họ tên</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <input type="text" name="gioitinh" value="<?php if(isset($_POST['gioitinh'])) {echo $_POST['gioitinh'];} ?>" class="form-control" placeholder="Giới tính"></input>
                                <?php
                                    if(isset($errors) && in_array('gioitinh',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập giới tính</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="text" name="ngaysinh" value="<?php if(isset($_POST['ngaysinh'])) {echo $_POST['ngaysinh'];} ?>" class="form-control" placeholder="Ngày sinh"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaysinh',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày sinh</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Số CMND</label>
                                <input type="text" name="socmnd" value="<?php if(isset($_POST['socmnd'])) {echo $_POST['socmnd'];} ?>" class="form-control" placeholder="Số cmnd"></input>
                                <?php
                                    if(isset($errors) && in_array('socmnd',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập số cmnd</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="diachi" value="<?php if(isset($_POST['diachi'])) {echo $_POST['diachi'];} ?>" class="form-control" placeholder="Địa chỉ"></input>
                                <?php
                                    if(isset($errors) && in_array('diachi',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập địa chỉ</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Bộ phận</label>
                                <input type="text" name="bophan" value="<?php if(isset($_POST['bophan'])) {echo $_POST['bophan'];} ?>" class="form-control" placeholder="Bộ phận"></input>
                                <?php
                                    if(isset($errors) && in_array('bophan',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập bộ phận</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <input type="text" name="chucvu" value="<?php if(isset($_POST['chucvu'])) {echo $_POST['chucvu'];} ?>" class="form-control" placeholder="Chức vụ"></input>
                                <?php
                                    if(isset($errors) && in_array('chucvu',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập chức vụ</p>";
                                    }
                                ?>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>