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
                <h4>Thêm thông tin Mượn trả</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
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
                                    $query="insert into phieumuontra(MaDG,MaNV,NgayMuon,NgayTraCT) 
                                            values ('{$madg}','{$manv}','{$ngaymuon}','{$ngaytract}')";
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
                                    $_POST['madg']='';
                                    $_POST['manv']='';
                                    $_POST['ngaymuon']='';
                                    $_POST['ngaytract']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-thongtinphieu" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <div class="form-group">
                                <label>Mã đọc giả</label>
                                <input type="text" name="madg" value="<?php if(isset($_POST['madg'])) {echo $_POST['madg'];} ?>" class="form-control" placeholder="Mã đọc giả"></input>
                                <?php
                                    if(isset($errors) && in_array('madg',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Mã đọc giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã nhân viên</label>
                                <input type="text" name="manv" value="<?php if(isset($_POST['manv'])) {echo $_POST['manv'];} ?>" class="form-control" placeholder="Mã nhân viên"></input>
                                <?php
                                    if(isset($errors) && in_array('manv',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Mã nhân viên</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày mượn</label>
                                <input type="text" name="ngaymuon" value="<?php if(isset($_POST['ngaymuon'])) {echo $_POST['ngaymuon'];} ?>" class="form-control" placeholder="Ngày mượn"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaymuon',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Ngày mượn</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Ngày trả chính thức</label>
                                <input type="text" name="ngaytract" value="<?php if(isset($_POST['ngaytract'])) {echo $_POST['ngaytract'];} ?>" class="form-control" placeholder="Ngày trả chính thức"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaytract',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập Ngày trả chính thức</p>";
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