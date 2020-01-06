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
                        //Kiểm tra MaSach có phải kiểu số ko
                        if(isset($_GET['MaSach']) && filter_var($_GET['MaSach'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaSach=$_GET['MaSach'];
                        }
                        else
                        {
                            header('Location: listSach.php');
                            exit();
                        }
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $errors=array();
                            if(empty($_POST['tensach']))
                            {
                                $errors[]='tensach';
                            }
                            else
                            {
                                $tensach=$_POST['tensach'];
                            }
                            if(empty($_POST['matg']))
                            {
                                $errors[]='matg';
                            }
                            else
                            {
                                $matg=$_POST['matg'];
                            }
                            if(empty($_POST['matheloai']))
                            {
                                $errors[]='matheloai';
                            }
                            else
                            {
                                $matheloai=$_POST['matheloai'];
                            }
                            if(empty($_POST['manxb']))
                            {
                                $errors[]='manxb';
                            }
                            else
                            {
                                $manxb=$_POST['manxb'];
                            }
                            if(empty($_POST['namxb']))
                            {
                                $errors[]='namxb';
                            }
                            else
                            {
                                $namxb=$_POST['namxb'];
                            }
                            if(empty($errors))
                            {
                                $tensach=$_POST['tensach'];
                                $matg=$_POST['matg'];
                                $matheloai=$_POST['matheloai'];
                                $manxb=$_POST['manxb'];
                                $namxb=$_POST['namxb'];
                                $query="UPDATE sach
                                        SET TenSach='{$tensach}',
                                            MaTG='{$matg}',
                                            MaTheLoai='{$matheloai}',
                                            MaNXB='{$manxb}',
                                            NamXB='{$namxb}'
                                        WHERE MaSach={$MaSach}";
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
                        $query_MaSach="select TenSach,MaTG,MaTheLoai,MaNXB,NamXB from sach where MaSach={$MaSach}";
                        $results_MaSach=mysqli_query($dbc,$query_MaSach);
                        kt_query($results_MaSach,$query_MaSach);
                        //Kiểm tra xem MaSach có tồn tại hay ko
                        if(mysqli_num_rows($results_MaSach)==1)
                        {
                            list($tensach,$matg,$matheloai,$manxb,$namxb)=mysqli_fetch_array($results_MaSach,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã sách không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-Sach" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Sách: <?php if(isset($tensach)) {echo $tensach;} ?></h4>
                            <div class="form-group">
                                <label>Tên sách</label>
                                <input type="text" name="tensach" value="<?php if(isset($tensach)) {echo $tensach;} ?>" class="form-control" placeholder="Tên sách"></input>
                                <?php
                                    if(isset($errors) && in_array('tensach',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên sách</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã tác giả</label>
                                <input type="text" name="matg" value="<?php if(isset($matg)) {echo $matg;} ?>" class="form-control" placeholder="Mã tác giả"></input>
                                <?php
                                    if(isset($errors) && in_array('matg',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã tác giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã thể loại</label>
                                <input type="text" name="matheloai" value="<?php if(isset($matheloai)) {echo $matheloai;} ?>" class="form-control" placeholder="Mã thể loại"></input>
                                <?php
                                    if(isset($errors) && in_array('matheloai',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã thể loại</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã NXB</label>
                                <input type="text" name="manxb" value="<?php if(isset($manxb)) {echo $manxb;} ?>" class="form-control" placeholder="Mã NXB"></input>
                                <?php
                                    if(isset($errors) && in_array('manxb',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã NXB</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Năm XB</label>
                                <input type="text" name="namxb" value="<?php if(isset($namxb)) {echo $namxb;} ?>" class="form-control" placeholder="Năm XB"></input>
                                <?php
                                    if(isset($errors) && in_array('namxb',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập năm XB</p>";
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