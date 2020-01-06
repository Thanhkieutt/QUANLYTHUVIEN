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
                        //Kiểm tra MaDG có phải kiểu số ko
                        if(isset($_GET['MaDG']) && filter_var($_GET['MaDG'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaDG=$_GET['MaDG'];
                        }
                        else
                        {
                            header('Location: listDocGia.php');
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
                                $query="UPDATE thedocgia
                                        SET HoTen='{$hoten}',
                                            GioiTinh='{$gioitinh}',
                                            SoCMND='{$socmnd}',
                                            DiaChi='{$diachi}',
                                            SDT='{$sdt}',
                                            NgayCap='{$ngaycap}',
                                            NgayHetHan='{$ngayhethan}'
                                        WHERE MaDG={$MaDG}";
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
                        $query_MaDG="select HoTen, GioiTinh, SoCMND, DiaChi, SDT, NgayCap, NgayHetHan from thedocgia where MaDG={$MaDG}";
                        $results_MaDG=mysqli_query($dbc,$query_MaDG);
                        kt_query($results_MaDG,$query_MaDG);
                        //Kiểm tra xem MaDG có tồn tại hay ko
                        if(mysqli_num_rows($results_MaDG)==1)
                        {
                            list($hoten,$gioitinh,$socmnd,$diachi,$sdt,$ngaycap,$ngayhethan)=mysqli_fetch_array($results_MaDG,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã đọc giả không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-docgia" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Đọc giả: <?php if(isset($hoten)) {echo $hoten;} ?></h4>
                            <div>
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
                                <label>SĐT</label>
                                <input type="text" name="sdt" value="<?php if(isset($sdt)) {echo $sdt;} ?>" class="form-control" placeholder="Sđt"></input>
                                <?php
                                    if(isset($errors) && in_array('sdt',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập số điện thoại</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày cấp</label>
                                <input type="text" name="ngaycap" value="<?php if(isset($ngaycap)) {echo $ngaycap;} ?>" class="form-control" placeholder="Ngày cấp"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaycap',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày cấp</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <input type="text" name="ngayhethan" value="<?php if(isset($ngayhethan)) {echo $ngayhethan;} ?>" class="form-control" placeholder="Ngày hết hạn"></input>
                                <?php
                                    if(isset($errors) && in_array('ngayhethan',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày hết hạn</p>";
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