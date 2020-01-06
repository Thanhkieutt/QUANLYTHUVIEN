<?php ob_start(); ?>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
                        //Kiểm tra MaNV có phải kiểu số ko
                        if(isset($_GET['MaNV']) && filter_var($_GET['MaNV'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaNV=$_GET['MaNV'];
                        }
                        else
                        {
                            header('Location: listNhanVien.php');
                            exit();
                        }
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
                                $query="UPDATE nhanvien
                                        SET HoTen='{$hoten}',
                                            GioiTinh='{$gioitinh}',
                                            NgaySinh='{$ngaysinh}',
                                            SoCMND='{$socmnd}',
                                            DiaChi='{$diachi}',
                                            BoPhan='{$bophan}',
                                            ChucVu='{$chucvu}'
                                        WHERE MaNV={$MaNV}";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                if(mysqli_affected_rows($dbc)==1)
                                {
                                    echo "<p style='color:green'>Sửa thành công</p>";
                                }
                                else
                                {
                                    echo "<p class='required'>Sửa không thành công</p>";
                                }
                            }
                            else
                            {
                                $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                            }
                        }
                        $query_MaNV="select HoTen,GioiTinh,NgaySinh,SoCMND,DiaChi,BoPhan,ChucVu from nhanvien where MaNV={$MaNV}";
                        $results_MaNV=mysqli_query($dbc,$query_MaNV);
                        kt_query($results_MaNV,$query_MaNV);
                        //Kiểm tra xem MaNV có tồn tại hay ko
                        if(mysqli_num_rows($results_MaNV)==1)
                        {
                            list($hoten,$gioitinh,$ngaysinh,$socmnd,$diachi,$bophan,$chucvu)=mysqli_fetch_array($results_MaNV,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã nhân viên không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-nhanvien" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Nhân viên: <?php if(isset($hoten)) {echo $hoten;} ?></h4>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="hoten" value="<?php if(isset($hoten)) {echo $hoten;} ?>" class="form-control" placeholder="Họ tên"></input>
                                <?php
                                    if(isset($errors) && in_array('hoten',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập họ tên</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <input type="text" name="gioitinh" value="<?php if(isset($gioitinh)) {echo $gioitinh;} ?>" class="form-control" placeholder="Giới tính"></input>
                                <?php
                                    if(isset($errors) && in_array('gioitinh',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập giới tính</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="text" name="ngaysinh" value="<?php if(isset($ngaysinh)) {echo $ngaysinh;} ?>" class="form-control" placeholder="Ngày sinh"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaysinh',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày sinh</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Số CMND</label>
                                <input type="text" name="socmnd" value="<?php if(isset($socmnd)) {echo $socmnd;} ?>" class="form-control" placeholder="Số cmnd"></input>
                                <?php
                                    if(isset($errors) && in_array('socmnd',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập số cmnd</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="diachi" value="<?php if(isset($diachi)) {echo $diachi;} ?>" class="form-control" placeholder="Địa chỉ"></input>
                                <?php
                                    if(isset($errors) && in_array('diachi',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập địa chỉ</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Bộ phận</label>
                                <input type="text" name="bophan" value="<?php if(isset($bophan)) {echo $bophan;} ?>" class="form-control" placeholder="Bộ phận"></input>
                                <?php
                                    if(isset($errors) && in_array('bophan',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập bộ phận</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <input type="text" name="chucvu" value="<?php if(isset($chucvu)) {echo $chucvu;} ?>" class="form-control" placeholder="Chức vụ"></input>
                                <?php
                                    if(isset($errors) && in_array('chucvu',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập chức vụ</p>";
                                    }
                                ?>
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Sửa">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php ob_flush(); ?>