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
                    <h4>Danh sách Vi phạm</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã vi phạm</th>
                                <th>Tên đọc giả</th>
                                <th>Tên nhân viên</th>
                                <th>Tên sách</th>
                                <th>Lí do phạt</th>
                                <th>Tiền phạt</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="SELECT MaVP,thedocgia.HoTen as 'TenDG' ,nhanvien.HoTen as 'TenNV',TenSach,LiDoPhat,TienPhat 
                                        FROM xulivipham, thedocgia, nhanvien, sach 
                                        WHERE xulivipham.MaDG=thedocgia.MaDG 
                                                AND xulivipham.MaNV=nhanvien.MaNV 
                                                AND xulivipham.MaSach=sach.MaSach";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($xulivipham=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $xulivipham['MaVP']; ?></td>
                                        <td><?php echo $xulivipham['TenDG']; ?></td>
                                        <td><?php echo $xulivipham['TenNV']; ?></td>
                                        <td><?php echo $xulivipham['TenSach']; ?></td>
                                        <td><?php echo $xulivipham['LiDoPhat']; ?></td>
                                        <td><?php echo $xulivipham['TienPhat']; ?></td>
                                        <td><a href="editViPham.php?MaVP=<?php echo $xulivipham['MaVP'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteViPham.php?MaVP=<?php echo $xulivipham['MaVP'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addViPham.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>