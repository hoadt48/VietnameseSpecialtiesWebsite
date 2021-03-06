<?php 
    $open ='product';
    require_once __DIR__. '\..\..\autoload\autoload.php';
    
    /* $product = $db ->fetchAll('product');*/
  
    if (isset($_GET['page'])) {
    
     $p=$_GET['page'];
    }
    else {
     $p=1;
    }
    $select="select product.*, category.name as namecat from product left join category on category.id=product.category_id";
    $product=$db->fetchJone('product',$select,$p,4,true);
    
    if(isset($product['page']))
    {
     $sotrang=$product['page'];
     unset($product['page']);
    }
    

    
    ?>
<?php require_once __DIR__. '\..\..\layouts\header.php';?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <h1>Danh sách đặc sản theo các tỉnh</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo admin_page() ?>">Dashboard </a>
            </li>
            <li class="breadcrumb-item active"> Danh mục <a href="add.php"class="btn btn-success" >Thêm mới</a></li>
        </ol>
        <?php if (isset($_SESSION['success'])) : ?>
        <!-- Breadcrumbs-->
        <div class="clearfix">
            <li class="alert alert-success">
                <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
            </li>
        </div>
        <?php endif?>
        <!-- Page Content -->                
        <div class="card-header">
            <i class="fas fa-table"></i> Danh sách các danh mục  
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>
                                    Show 
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 80px;">STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Tên sản phẩm</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Danh mục</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Giá sản phẩm </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Giảm giá</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Số lượng </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 180px;">Hình ảnh</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 300px;">Nội dung </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt= 1; foreach ($product as $item): ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $stt ?></td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $item['namecat'] ?></td>
                                        <td><?php echo $item['price'] ?></td>
                                        <td><?php echo $item['sale_price'] ?></td>
                                        <td><?php echo $item['quantity'] ?></td>
                                        <td><img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'];?>" width='150px' height='150px'></td>
                                        <td><?php echo $item['content'] ?></td>
                                        <td><a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-success">Sửa</a>
                                            <a href="delete.php?id=<?php echo $item['id'] ?>"class="btn btn-success" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php $stt++; endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous " id="dataTable_previous"><a href="" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                   <?php for ($i = 1; $i <=$sotrang ; $i++) : ?>
                                       <?php 
                                           if(isset($_GET['page']))
                                           {
                                               $p=$_GET['page'];
                                           }
                                           else {
                                               $p=1;
                                           }
                                           
                                           ?>
                                         <li class="<?php echo($i==$p)? 'active' : '' ?>">
                                           <a class="btn btn-success" href="? page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                         </li>
                                       <?php endfor; ?>
                                  <!--   <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                  <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                  <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                  <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                  <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                  <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li> -->
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<?php require_once __DIR__. '\..\..\layouts\footer.php';?>