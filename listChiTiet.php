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
                    <h4>Danh sách Chi tiết mượn trả sách</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã phiếu chi tiết</th>
                                <th>Mã Phiếu</th>
                                <th>Tên sách</th>
                                <th>Ngày trả</th>
                                <th>TT sách trước</th>
                                <th>TT sách sau</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="select MaPhieuCT, MaPhieu, TenSach, NgayTra, TTSachTruoc, TTSachSau FROM chitiet,sach where chitiet.MaSach=sach.MaSach;";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($chitiet=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $chitiet['MaPhieuCT']; ?></td>
                                        <td><?php echo $chitiet['MaPhieu']; ?></td>
                                        <td><?php echo $chitiet['TenSach']; ?></td>
                                        <td><?php echo $chitiet['NgayTra']; ?></td>
                                        <td><?php echo $chitiet['TTSachTruoc']; ?></td>
                                        <td><?php echo $chitiet['TTSachSau']; ?></td>
                                        <td><a href="editChiTiet.php?MaPhieuCT=<?php echo $chitiet['MaPhieuCT'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteChiTiet.php?MaPhieuCT=<?php echo $chitiet['MaPhieuCT'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addChiTiet.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>