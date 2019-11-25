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
                        //Kiểm tra MaTG có phải kiểu số ko
                        if(isset($_GET['MaTG']) && filter_var($_GET['MaTG'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaTG=$_GET['MaTG'];
                        }
                        else
                        {
                            header('Location: listTacGia.php');
                            exit();
                        }
                            if($_SERVER['REQUEST_METHOD']=='POST')
                            {
                                $errors=array();
                                if(empty($_POST['tentacgia']))
                                {
                                    $errors[]='tentacgia';
                                }
                                else
                                {
                                    $tentacgia=$_POST['tentacgia'];
                                }
                                if(empty($_POST['ghichu']))
                                {
                                    $errors[]='ghichu';
                                }
                                else
                                {
                                    $tentacgia=$_POST['ghichu'];
                                }
                                if(empty($errors))
                                {
                                    $tentacgia=$_POST['tentacgia'];
                                    $ghichu=$_POST['ghichu'];
                                    $query="UPDATE tacgia
                                            SET TenTG='{$tentacgia}',
                                                GhiChu='{$ghichu}'
                                            WHERE MaTG={$MaTG}";
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
                            $query_matg="select TenTG, GhiChu from tacgia where MaTG={$MaTG}";
                            $results_matg=mysqli_query($dbc,$query_matg);
                            kt_query($results_matg,$query_matg);
                            //Kiểm tra xem MaTG có tồn tại hay ko
                            if(mysqli_num_rows($results_matg)==1)
                            {
                                list($tentacgia,$ghichu)=mysqli_fetch_array($results_matg,MYSQLI_NUM);
                            }
                            else
                            {
                                $message="<p class='required'>Mã tác giả không tồn tại.</p>";
                            }
                        ?>
                        <form name="frmadd-sach" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin Tác giả: <?php if(isset($tentacgia)) {echo $tentacgia;} ?></h4>
                            <div class="form-group">
                                <label>Tên tác giả</label>
                                <input type="text" name="tentacgia" value="<?php if(isset($tentacgia)) {echo $tentacgia;} ?>" class="form-control" placeholder="Tên tác giả"></input>
                                <?php
                                    if(isset($errors) && in_array('tentacgia',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên tác giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input type="text" name="ghichu" value="<?php if(isset($ghichu)) {echo $ghichu;} ?>" class="form-control" placeholder="Ghi chú"></input>
                                <?php
                                    if(isset($errors) && in_array('ghichu',$errors))
                                    {
                                        echo "<p class='required'>Nếu không thêm thông tin hãy điền 'không'</p>";
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