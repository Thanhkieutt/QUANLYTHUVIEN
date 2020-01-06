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
                    <h4>Danh sách Sách</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã sách</th>
                                <th>Tên sách</th>
                                <th>Tên tác giả</th>
                                <th>Tên thể loại</th>
                                <th>Tên NXB</th>
                                <th>Năm XB</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="SELECT MaSach,TenSach,TenTG,TenTheLoai,TenNXB,NamXB FROM sach,tacgia,theloai,nhaxb where sach.MaTG=tacgia.MaTG AND sach.MaTheLoai=theloai.MaTheLoai and sach.MaNXB=nhaxb.MaNXB";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($sach=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $sach['MaSach']; ?></td>
                                        <td><?php echo $sach['TenSach']; ?></td>
                                        <td><?php echo $sach['TenTG']; ?></td>
                                        <td><?php echo $sach['TenTheLoai']; ?></td>
                                        <td><?php echo $sach['TenNXB']; ?></td>
                                        <td><?php echo $sach['NamXB']; ?></td>
                                        <td><a href="editSach.php?MaSach=<?php echo $sach['MaSach'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteSach.php?MaSach=<?php echo $sach['MaSach'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addSach.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>