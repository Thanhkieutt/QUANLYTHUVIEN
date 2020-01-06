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
                        //Kiểm tra MaVP có phải kiểu số ko
                        if(isset($_GET['MaVP']) && filter_var($_GET['MaVP'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaVP=$_GET['MaVP'];
                        }
                        else
                        {
                            header('Location: listViPham.php');
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
                            if(empty($_POST['masach']))
                            {
                                $errors[]='masach';
                            }
                            else
                            {
                                $masach=$_POST['masach'];
                            }
                            if(empty($_POST['lidophat']))
                            {
                                $errors[]='lidophat';
                            }
                            else
                            {
                                $lidophat=$_POST['lidophat'];
                            }
                            if(empty($_POST['tienphat']))
                            {
                                $errors[]='tienphat';
                            }
                            else
                            {
                                $tienphat=$_POST['tienphat'];
                            }
                            if(empty($errors))
                            {
                                $madg=$_POST['madg'];
                                $manv=$_POST['manv'];
                                $masach=$_POST['masach'];
                                $lidophat=$_POST['lidophat'];
                                $tienphat=$_POST['tienphat'];
                                $query="UPDATE xulivipham
                                        SET MaDG='{$madg}',
                                            MaNV='{$manv}',
                                            MaSach='{$masach}',
                                            LiDoPhat='{$lidophat}',
                                            TienPhat='{$tienphat}'
                                        WHERE MaVP={$MaVP}";
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
                        $query_MaVP="select MaDG,MaNV,MaSach,LiDoPhat,TienPhat from xulivipham where MaVP={$MaVP}";
                        $results_MaVP=mysqli_query($dbc,$query_MaVP);
                        kt_query($results_MaVP,$query_MaVP);
                        //Kiểm tra xem MaVP có tồn tại hay ko
                        if(mysqli_num_rows($results_MaVP)==1)
                        {
                            list($madg,$manv,$masach,$lidophat,$tienphat)=mysqli_fetch_array($results_MaVP,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã phiếu không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-ViPham" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Phiếu mượn trả: <?php if(isset($MaVP)) {echo $MaVP;} ?></h4>
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
                                <label>Lí do phạt</label>
                                <input type="text" name="lidophat" value="<?php if(isset($lidophat)) {echo $lidophat;} ?>" class="form-control" placeholder="Lí do phạt"></input>
                                <?php
                                    if(isset($errors) && in_array('lidophat',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập lí do phạt</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Tiền phạt</label>
                                <input type="text" name="tienphat" value="<?php if(isset($tienphat)) {echo $tienphat;} ?>" class="form-control" placeholder="Tiền phạt"></input>
                                <?php
                                    if(isset($errors) && in_array('tienphat',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tiền phạt</p>";
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