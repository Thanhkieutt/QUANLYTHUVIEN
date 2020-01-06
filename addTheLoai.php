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
                <h4>Thêm thông tin Thể loại</h4>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        include('inc/myconnect.php');
                        include('inc/function.php');
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
                                    $query="insert into theloai(TenTheLoai) values ('{$tentheloai}')";
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
                                    $_POST['tentheloai']='';
                                }
                                else
                                {
                                    $message="<p class='required'>Bạn hãy nhập đầy đủ thông tin.</p>";
                                }
                            }
                        ?>
                        <form name="frmadd-theloai" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input type="text" name="tentheloai" value="<?php if(isset($_POST['tentheloai'])) {echo $_POST['tentheloai'];} ?>" class="form-control" placeholder="Tên thể loại"></input>
                                <?php
                                    if(isset($errors) && in_array('tentheloai',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên thể loại</p>";
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