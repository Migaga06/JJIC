<nav class="navbar mt-2 " data-bs-theme="dark">
                <form method = "POST" class="form form-inline">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class = "fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search Item Reserved" aria-label="Search" aria-describedby="basic-addon1" name="product_name">
                        <button class="btn btn-dark btn-outline-secondary" name="search">Search</button>
                    </div>
                </form>
                <a href="<?=ROOT?>/profile" class="btn btn-sm btn-dark mt-1"><i class="fa fa-eye"></i> View Cart</a>
            </nav>
            <h1 class="text-white text-center mt-3 mb-4"><i class="fa">Items Reserved</i></h1>
            <div>
            
                <?php if(isset($row_reserve) && $row_reserve) { ?>
                    <table class="table table-dark table-striped align-middle">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Type</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                        <?php foreach ($row_reserve as $index => $item) { ?>
                                <?php include(views_path('profile-tab/profile-reserve/reserve-tab-item')); ?>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                        <?php if(count($_POST)>0): ?>
                            <div class="container-fluid rounded-2 bg-danger p-2 mb-2" style = "background-color: rgba(255, 51, 51, 1);">
                                <h3 class = "text-white text-center">Search result not found!!</h3>
                            </div>
                        <?php endif; ?>
                        <div class="container-fluid rounded-2 bg-dark p-2" style = "background-color: rgba(255, 51, 51, 1);">
                                <h3 class = "text-white text-center">Currently don't have any items reserved!!</h3>
                        </div>
                <?php } ?>
            
            </div>