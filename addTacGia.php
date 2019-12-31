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
                <h4>Thêm thông tin Tác giả</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
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
                                    $query="insert into tacgia(TenTG,GhiChu) values ('{$tentacgia}','{$ghichu}')";
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
                                    $_POST['tentacgia']='';
                                    $_POST['ghichu']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-sach" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <div class="form-group">
                                <label>Tên tác giả</label>
                                <input type="text" name="tentacgia" value="<?php if(isset($_POST['tentacgia'])) {echo $_POST['tentacgia'];} ?>" class="form-control" placeholder="Tên tác giả"></input>
                                <?php
                                    if(isset($errors) && in_array('tentacgia',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên tác giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input type="text" name="ghichu" value="<?php if(isset($_POST['ghichu'])) {echo $_POST['ghichu'];} ?>" class="form-control" placeholder="Ghi chú"></input>
                                <?php
                                    if(isset($errors) && in_array('ghichu',$errors))
                                    {
                                        echo "<p class='required'>Nếu không thêm thông tin hãy điền 'không'</p>";
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