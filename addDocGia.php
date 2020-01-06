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
                <h4>Thêm thông tin Đọc giả</h4>
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
                                if(empty($_POST['sdt']))
                                {
                                    $errors[]='sdt';
                                }
                                else
                                {
                                    $sdt=$_POST['sdt'];
                                }
                                if(empty($_POST['ngaycap']))
                                {
                                    $errors[]='ngaycap';
                                }
                                else
                                {
                                    $ngaycap=$_POST['ngaycap'];
                                }
                                if(empty($_POST['ngayhethan']))
                                {
                                    $errors[]='ngayhethan';
                                }
                                else
                                {
                                    $ngayhethan=$_POST['ngayhethan'];
                                }
                                if(empty($errors))
                                {
                                    $hoten=$_POST['hoten'];
                                    $gioitinh=$_POST['gioitinh'];
                                    $socmnd=$_POST['socmnd'];
                                    $diachi=$_POST['diachi'];
                                    $sdt=$_POST['sdt'];
                                    $ngaycap=$_POST['ngaycap'];
                                    $ngayhethan=$_POST['ngayhethan'];
                                    $query="insert into thedocgia(HoTen,GioiTinh,SoCMND,DiaChi,SDT,NgayCap,NgayHetHan) 
                                            values ('{$hoten}','{$gioitinh}','{$socmnd}','{$diachi}','{$sdt}','{$ngaycap}','{$ngayhethan}')";
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
                                    $_POST['socmnd']='';
                                    $_POST['diachi']='';
                                    $_POST['sdt']='';
                                    $_POST['ngaycap']='';
                                    $_POST['ngayhethan']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-docgia" method="POST">
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
                                <label>SĐT</label>
                                <input type="text" name="sdt" value="<?php if(isset($_POST['sdt'])) {echo $_POST['sdt'];} ?>" class="form-control" placeholder="Sđt"></input>
                                <?php
                                    if(isset($errors) && in_array('sdt',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập số điện thoại</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày cấp</label>
                                <input type="text" name="ngaycap" value="<?php if(isset($_POST['ngaycap'])) {echo $_POST['ngaycap'];} ?>" class="form-control" placeholder="Ngày cấp"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaycap',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày cấp</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <input type="text" name="ngayhethan" value="<?php if(isset($_POST['ngayhethan'])) {echo $_POST['ngayhethan'];} ?>" class="form-control" placeholder="Ngày hết hạn"></input>
                                <?php
                                    if(isset($errors) && in_array('ngayhethan',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày hết hạn</p>";
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