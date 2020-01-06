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
                <h4>Thêm thông tin Vi phạm</h4>
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
                                    $query="insert into xulivipham(MaDG,MaNV,MaSach,LiDoPhat,TienPhat) 
                                            values ('{$madg}','{$manv}','{$masach}','{$lidophat}',{$tienphat})";
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
                                    $_POST['masach']='';
                                    $_POST['lidophat']='';
                                    $_POST['tienphat']='';
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
                                        echo "<p class='required'>Bạn chưa nhập mã đọc giả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã nhân viên</label>
                                <input type="text" name="manv" value="<?php if(isset($_POST['manv'])) {echo $_POST['manv'];} ?>" class="form-control" placeholder="Mã nhân viên"></input>
                                <?php
                                    if(isset($errors) && in_array('manv',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã nhân viên</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Mã sách</label>
                                <input type="text" name="masach" value="<?php if(isset($_POST['masach'])) {echo $_POST['masach'];} ?>" class="form-control" placeholder="Mã sách"></input>
                                <?php
                                    if(isset($errors) && in_array('masach',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã sách</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Lí do phạt</label>
                                <input type="text" name="lidophat" value="<?php if(isset($_POST['lidophat'])) {echo $_POST['lidophat'];} ?>" class="form-control" placeholder="Lí do phạt"></input>
                                <?php
                                    if(isset($errors) && in_array('lidophat',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập lí do phạt</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Tiền phạt</label>
                                <input type="text" name="tienphat" value="<?php if(isset($_POST['tienphat'])) {echo $_POST['tienphat'];} ?>" class="form-control" placeholder="Tiền phạt"></input>
                                <?php
                                    if(isset($errors) && in_array('tienphat',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tiền phạt</p>";
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