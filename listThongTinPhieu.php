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
                    <h4>Danh sách Phiếu mượn trả</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã phiếu</th>
                                <th>Tên đọc giả</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày mượn</th>
                                <th>Ngày trả CT</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="SELECT MaPhieu,thedocgia.HoTen as 'TenDG' ,nhanvien.HoTen as 'TenNV',NgayMuon,NgayTraCT FROM phieumuontra, thedocgia, nhanvien WHERE phieumuontra.MaDG=thedocgia.MaDG AND phieumuontra.MaNV=nhanvien.MaNV ";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($phieumuontra=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $phieumuontra['MaPhieu']; ?></td>
                                        <td><?php echo $phieumuontra['TenDG']; ?></td>
                                        <td><?php echo $phieumuontra['TenNV']; ?></td>
                                        <td><?php echo $phieumuontra['NgayMuon']; ?></td>
                                        <td><?php echo $phieumuontra['NgayTraCT']; ?></td>
                                        <td><a href="editThongTinPhieu.php?MaPhieu=<?php echo $phieumuontra['MaPhieu'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteThongTinPhieu.php?MaPhieu=<?php echo $phieumuontra['MaPhieu'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addThongTinPhieu.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>