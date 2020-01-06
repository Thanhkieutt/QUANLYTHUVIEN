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
                        //Kiểm tra MaTheLoai có phải kiểu số ko
                        if(isset($_GET['MaTheLoai']) && filter_var($_GET['MaTheLoai'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaTheLoai=$_GET['MaTheLoai'];
                        }
                        else
                        {
                            header('Location: listTheLoai.php');
                            exit();
                        }
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $errors=array();
                            if(empty($_POST['tentheloai']))
                            {
                                $errors[]='tentheloai';
                            }
                            else
                            {
                                $tentheloai=$_POST['tentheloai'];
                            }
                            if(empty($errors))
                            {
                                $tentheloai=$_POST['tentheloai'];
                                $query="UPDATE TheLoai
                                        SET TenTheLoai='{$tentheloai}'
                                        WHERE MaTheLoai={$MaTheLoai}";
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
                        $query_MaTheLoai="select TenTheLoai from theloai where MaTheLoai={$MaTheLoai}";
                        $results_MaTheLoai=mysqli_query($dbc,$query_MaTheLoai);
                        kt_query($results_MaTheLoai,$query_MaTheLoai);
                        //Kiểm tra xem MaTheLoai có tồn tại hay ko
                        if(mysqli_num_rows($results_MaTheLoai)==1)
                        {
                            list($tentheloai)=mysqli_fetch_array($results_MaTheLoai,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã thể loại không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-TheLoai" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Thể loại</h4>
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input type="text" name="tentheloai" value="<?php if(isset($tentheloai)) {echo $tentheloai;} ?>" class="form-control" placeholder="Tên thể loại"></input>
                                <?php
                                    if(isset($errors) && in_array('tentheloai',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên thể loại</p>";
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