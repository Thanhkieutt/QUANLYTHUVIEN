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
                        //Kiểm tra MaPhieu có phải kiểu số ko
                        if(isset($_GET['MaPhieu']) && filter_var($_GET['MaPhieu'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaPhieu=$_GET['MaPhieu'];
                        }
                        else
                        {
                            header('Location: listThongTinPhieu.php');
                            exit();
                        }
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $errors=array();
                            if(empty($_POST['madg']))
                            {
                                $errors[]='madg';
                            }
                            else
                            {
                                $madg=$_POST['madg'];
                            }
                            if(empty($_POST['manv']))
                            {
                                $errors[]='manv';
                            }
                            else
                            {
                                $manv=$_POST['manv'];
                            }
                            if(empty($_POST['ngaymuon']))
                            {
                                $errors[]='ngaymuon';
                            }
                            else
                            {
                                $ngaymuon=$_POST['ngaymuon'];
                            }
                            if(empty($_POST['ngaytract']))
                            {
                                $errors[]='ngaytract';
                            }
                            else
                            {
                                $ngaytract=$_POST['ngaytract'];
                            }
                            if(empty($errors))
                            {
                                $madg=$_POST['madg'];
                                $manv=$_POST['manv'];
                                $ngaymuon=$_POST['ngaymuon'];
                                $ngaytract=$_POST['ngaytract'];
                                $query="UPDATE phieumuontra
                                        SET MaDG='{$madg}',
                                            MaNV='{$manv}',
                                            NgayMuon='{$ngaymuon}',
                                            NgayTraCT='{$ngaytract}'
                                        WHERE MaPhieu={$MaPhieu}";
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
                        $query_MaPhieu="select MaDG,MaNV,NgayMuon,NgayTraCT from phieumuontra where MaPhieu={$MaPhieu}";
                        $results_MaPhieu=mysqli_query($dbc,$query_MaPhieu);
                        kt_query($results_MaPhieu,$query_MaPhieu);
                        //Kiểm tra xem MaPhieu có tồn tại hay ko
                        if(mysqli_num_rows($results_MaPhieu)==1)
                        {
                            list($madg,$manv,$ngaymuon,$ngaytract)=mysqli_fetch_array($results_MaPhieu,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã phiếu không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-ThongTinPhieu" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Phiếu mượn trả: <?php if(isset($MaPhieu)) {echo $MaPhieu;} ?></h4>
                            <div class="form-group">
                                <label>Mã đọc giả</label>
                                <input type="text" name="madg" value="<?php if(isset($madg)) {echo $madg;} ?>" class="form-control" placeholder="Mã đọc giả"></input>
                                <?php
                                    if(isset($errors) && in_array('madg',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã đọc giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã nhân viên</label>
                                <input type="text" name="manv" value="<?php if(isset($manv)) {echo $manv;} ?>" class="form-control" placeholder="Mã nhân viên"></input>
                                <?php
                                    if(isset($errors) && in_array('manv',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã nhân viên</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày mượn</label>
                                <input type="text" name="ngaymuon" value="<?php if(isset($ngaymuon)) {echo $ngaymuon;} ?>" class="form-control" placeholder="Ngày mượn"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaymuon',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Ngày mượn</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày trả chính thức</label>
                                <input type="text" name="ngaytract" value="<?php if(isset($ngaytract)) {echo $ngaytract;} ?>" class="form-control" placeholder="Ngày trả chính thức"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaytract',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Ngày trả chính thức</p>";
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