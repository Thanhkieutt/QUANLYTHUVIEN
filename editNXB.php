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
                        //Kiểm tra MaNXB có phải kiểu số ko
                        if(isset($_GET['MaNXB']) && filter_var($_GET['MaNXB'],FILTER_VALIDATE_INT,array('min_range'=>1)))
                        {
                            $MaNXB=$_GET['MaNXB'];
                        }
                        else
                        {
                            header('Location: listNXB.php');
                            exit();
                        }
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $errors=array();
                            if(empty($_POST['tennxb']))
                            {
                                $errors[]='tennxb';
                            }
                            else
                            {
                                $tennxb=$_POST['tennxb'];
                            }
                            if(empty($errors))
                            {
                                $tennxb=$_POST['tennxb'];
                                $query="UPDATE nhaxb
                                        SET TenNXB='{$tennxb}'
                                        WHERE MaNXB={$MaNXB}";
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
                        $query_MaNXB="select TenNXB from nhaxb where MaNXB={$MaNXB}";
                        $results_MaNXB=mysqli_query($dbc,$query_MaNXB);
                        kt_query($results_MaNXB,$query_MaNXB);
                        //Kiểm tra xem MaNXB có tồn tại hay ko
                        if(mysqli_num_rows($results_MaNXB)==1)
                        {
                            list($tennxb)=mysqli_fetch_array($results_MaNXB,MYSQLI_NUM);
                        }
                        else
                        {
                            $message="<p class='required'>Mã nhà xuất bản không tồn tại.</p>";
                        }
                        ?>
                        <form name="frmadd-NXB" method="POST">
                            <?php
                                if(isset($message))
                                {
                                    echo $message;
                                }
                            ?>
                            <h4>Sửa thông tin NXB</h4>
                            <div class="form-group">
                                <label>Tên NXB</label>
                                <input type="text" name="tennxb" value="<?php if(isset($tennxb)) {echo $tennxb;} ?>" class="form-control" placeholder="Tên NXB"></input>
                                <?php
                                    if(isset($errors) && in_array('tennxb',$errors))
                                    {
                                        echo "<p class='required'>Bạn chưa nhập tên NXB</p>";
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