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
                    <h4>Danh sách Tác giả</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Mã tác giả</th>
                                <th>Tên tác giả</th>
                                <th>Ghi chú</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query="select * from tacgia";
                                $results=mysqli_query($dbc,$query);
                                kt_query($results,$query);
                                while($tacgia=mysqli_fetch_array($results,MYSQLI_ASSOC))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $tacgia['MaTG']; ?></td>
                                        <td><?php echo $tacgia['TenTG']; ?></td>
                                        <td><?php echo $tacgia['GhiChu']; ?></td>
                                        <td><a href="editTacGia.php?MaTG=<?php echo $tacgia['MaTG'];?>"><img width="25" src="Content/edit1.png"></a></td>
                                        <td><a onclick="return confirm('Bạn có muốn xóa không?');" href="deleteTacGia.php?MaTG=<?php echo $tacgia['MaTG'];?>"><img width="25" src="Content/delete1.png"></a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <a href="addTacGia.php"><input type="submit" name="submit" class="btn btn-primary" value="Thêm"></a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include('includes/footer.php') ?>