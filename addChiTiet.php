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
                <h4>Thêm thông tin Chi tiết</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
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
                                    $query="insert into chitiet(MaPhieu,MaSach,NgayTra,TTSachTruoc,TTSachSau) 
                                            values ('{$maphieu}','{$masach}','{$ngaytra}','{$ttsachtruoc}','{$ttsachsau}')";
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
                                    $_POST['maphieu']='';
                                    $_POST['masach']='';
                                    $_POST['ngaytra']='';
                                    $_POST['ttsachtruoc']='';
                                    $_POST['ttsachsau']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-chitiet" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <div class="form-group">
                                <label>Mã phiếu</label>
                                <input type="text" name="maphieu" value="<?php if(isset($_POST['maphieu'])) {echo $_POST['maphieu'];} ?>" class="form-control" placeholder="Mã phiếu"></input>
                                <?php
                                    if(isset($errors) && in_array('maphieu',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập mã phiếu</p>";
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
                                <label>Ngày trả</label>
                                <input type="text" name="ngaytra" value="<?php if(isset($_POST['ngaytra'])) {echo $_POST['ngaytra'];} ?>" class="form-control" placeholder="Ngày trả"></input>
                                <?php
                                    if(isset($errors) && in_array('ngaytra',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập ngày trả</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>TT sách trước</label>
                                <input type="text" name="ttsachtruoc" value="<?php if(isset($_POST['ttsachtruoc'])) {echo $_POST['ttsachtruoc'];} ?>" class="form-control" placeholder="TT sách trước"></input>
                                <?php
                                    if(isset($errors) && in_array('ttsachtruoc',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tt sách trước</p>";
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>TT sách sau</label>
                                <input type="text" name="ttsachsau" value="<?php if(isset($_POST['ttsachsau'])) {echo $_POST['ttsachsau'];} ?>" class="form-control" placeholder="Mã sách"></input>
                                <?php
                                    if(isset($errors) && in_array('ttsachsau',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tt sách sau</p>";
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