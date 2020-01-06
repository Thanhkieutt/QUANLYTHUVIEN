<?php include('includes/header.php'); ?>
<?php include('inc/myconnect.php'); ?>
<?php include('inc/function.php'); ?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Thông Tin
                </div>
                <div class="card-body"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4>Danh sách Đọc Giả</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã đọc giả</th>
                                <th>Tên đọc giả</th>
                                <th>Giới tính</th>
                                <th>Số CMND</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Ngày cấp</th>
                                <th>Ngày hết hạn</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="select * from thedocgia";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($docgia=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $docgia['MaDG']; ?></td>
                                        <td><?php echo $docgia['HoTen']; ?></td>
                                        <td><?php echo $docgia['GioiTinh']; ?></td>
                                        <td><?php echo $docgia['SoCMND']; ?></td>
                                        <td><?php echo $docgia['DiaChi']; ?></td>
                                        <td><?php echo $docgia['SDT']; ?></td>
                                        <td><?php echo $docgia['NgayCap']; ?></td>
                                        <td><?php echo $docgia['NgayHetHan']; ?></td>
                                        <td><a href="editDocGia.php?MaDG=<?php echo $docgia['MaDG'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteDocGia.php?MaDG=<?php echo $docgia['MaDG'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addDocGia.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>