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
                        //Kiểm tra MaPhieuCT có phải kiểu số ko
                        if(isset($_GET['MaPhieuCT']) && filter_var($_GET['MaPhieuCT'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaPhieuCT=$_GET['MaPhieuCT'];
                        }
                        else
                        {
                            header('Location: listChiTiet.php');
                            exit();
                        }
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $errors=array();
                            if(empty($_POST['maphieu']))
                            {
                                $errors[]='maphieu';
                            }
                            else
                            {
                                $maphieu=$_POST['maphieu'];
                            }
                            if(empty($_POST['masach']))
                            {
                                $errors[]='masach';
                            }
                            else
                            {
                                $masach=$_POST['masach'];
                            }
                            if(empty($_POST['ngaytra']))
                            {
                                $errors[]='ngaytra';
                            }
                            else
                            {
                                $ngaytra=$_POST['ngaytra'];
                            }
                            if(empty($_POST['ttsachtruoc']))
                            {
                                $errors[]='ttsachtruoc';
                            }
                            else
                            {
                                $ttsachtruoc=$_POST['ttsachtruoc'];
                            }
                            if(empty($_POST['ttsachsau']))
                            {
                                $errors[]='ttsachsau';
                            }
                            else
                            {
                                $ttsachsau=$_POST['ttsachsau'];
                            }
                            if(empty($errors))
                            {
                                $maphieu=$_POST['maphieu'];
                                $masach=$_POST['masach'];
                                $ngaytra=$_POST['ngaytra'];
                                $ttsachtruoc=$_POST['ttsachtruoc'];
                                $ttsachsau=$_POST['ttsachsau'];
                                $query="UPDATE chitiet
                                        SET MaPhieu='{$maphieu}',
                                            MaSach='{$masach}',
                                            NgayTra='{$ngaytra}',
                                            TTSachTruoc='{$ttsachtruoc}',
                                            TTSachSau='{$ttsachsau}'
                                        WHERE MaPhieuCT={$MaPhieuCT}";
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
                        $query_MaPhieuCT="select MaPhieu, MaSach, NgayTra, TTSachTruoc, TTSachSau from chitiet where MaPhieuCT={$MaPhieuCT}";
                        $results_MaPhieuCT=mysqli_query($dbc,$query_MaPhieuCT);
                        kt_query($results_MaPhieuCT,$query_MaPhieuCT);
                        //Kiểm tra xem MaPhieuCT có tồn tại hay ko
                        if(mysqli_num_rows($results_MaPhieuCT)==1)
                        {
                            list($maphieu,$masach,$ngaytra,$ttsachtruoc,$ttsachsau)=mysqli_fetch_array($results_MaPhieuCT,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã chi tiết phiếu không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-chitiet" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Chi tiết phiếu: <?php if(isset($MaPhieuCT)) {echo $MaPhieuCT;} ?></h4>
                            <div class="form-group">
                                <label>Mã phiếu</label>
                                <input type="text" name="maphieu" value="<?php if(isset($maphieu)) {echo $maphieu;} ?>" class="form-control" placeholder="Mã phiếu"></input>
                                <?php
                                    if(isset($errors) && in_array('maphieu',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã phiếu</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã sách</label>
                                <input type="text" name="masach" value="<?php if(isset($masach)) {echo $masach;} ?>" class="form-control" placeholder="Mã sách"></input>
                                <?php
                                    if(isset($errors) && in_array('masach',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã sách</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày trả</label>
                                <input type="text" name="ngaytra" value="<?php if(isset($ngaytra)) {echo $ngaytra;} ?>" class="form-control" placeholder="Ngày trả"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaytra',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày trả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>TT sách trước</label>
                                <input type="text" name="ttsachtruoc" value="<?php if(isset($ttsachtruoc)) {echo $ttsachtruoc;} ?>" class="form-control" placeholder="TT sách trước"></input>
                                <?php
                                    if(isset($errors) && in_array('ttsachtruoc',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tt sách trước</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>TT sách sau</label>
                                <input type="text" name="ttsachsau" value="<?php if(isset($ttsachsau)) {echo $ttsachsau;} ?>" class="form-control" placeholder="Mã sách"></input>
                                <?php
                                    if(isset($errors) && in_array('ttsachsau',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tt sách sau</p>";
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