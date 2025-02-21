@extends('layouts.admin.admin_layout')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row gutters content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <h4>Products</h4>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="btn-alignment">
                            <button class="btn btn-info add-btn float-right" data-toggle="modal" data-target=".product-add">
                                <i class="icon-plus"></i> Add
                            </button>
                        </div>
                        <div class="custom-search">
                            <form method="GET" action="">
                                <input type="text" name="search" class="search-query" placeholder="Search Here..." value="">
                                <button type="submit" class="btn-light"><i class="icon-search1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container">
            <div class="table-responsive">
                <table class="table custom-table m-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Amount (Rs)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="img/product/1.jpg" class="pro-img"></td>
                            <td>Chicken Pizza</td>
                            <td>2025-01-01 08:00PM</td>
                            <td>Admin</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                            <td>
                                <b class="new-price">2000.00</b>
                                <b class="old-price">1500.00</b>
                            </td>
                            <td>
                                <div class="task-list">
                                    <div class="task-block">
                                        <li class="dropdown">
                                            <a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-dots-three-horizontal action-icon"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(35px, 36px, 0px);">
                                                <a href="#0" data-toggle="modal" data-target=".product-add">
                                                    <i class="icon-edit1"></i> Edit
                                                </a>
                                                <a href="#0">
                                                    <i class="icon-delete"></i> Delete
                                                </a>
                                            </div>
                                        </li>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td><img src="img/product/1.jpg" class="pro-img"></td>
                            <td>Chicken Pizza</td>
                            <td>2025-01-01 08:00PM</td>
                            <td>Admin</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2"></label>
                                </div>
                            </td>
                            <td>
                                <b class="new-price">2222000.00</b>
                                <b class="old-price">1500.00</b>
                            </td>
                            <td>
                                <div class="task-list">
                                    <div class="task-block">
                                        <li class="dropdown">
                                            <a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-dots-three-horizontal action-icon"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(35px, 36px, 0px);">
                                                <a href="#0" data-toggle="modal" data-target=".product-add">
                                                    <i class="icon-edit1"></i> Edit
                                                </a>
                                                <a href="#0">
                                                    <i class="icon-delete"></i> Delete
                                                </a>
                                            </div>
                                        </li>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- customer add Modal start  -->
<div class="modal fade product-add"  id="productModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                    <section>
                        <div class="row gutters">
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="cate">Category</label>
                                    <select class="form-control">
                                        <option>Rice</option>
                                        <option>Pizza</option>
                                        <option>Burger</option>
                                        <option>Submarine</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="cate">Sub Category</label>
                                    <select class="form-control">
                                        <option>Chicken</option>
                                        <option>Fish</option>
                                        <option>Beef</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control required" name="name" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Price</label>
                                    <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Sale Price</label>
                                    <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Tags</label>
                                    <input type="text" class="form-control" value="Test, Sri Lanka" data-role="tagsinput">
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Weight (KG)</label>
                                    <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">New Arrivals</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Featured Products</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Short Description</label>
                                    <div class="summernote"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Long Description</label>
                                    <div class="summernote"></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 1</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 2</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 3</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 4</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="cate">Status</label>
                                    <select class="form-control">
                                        <option>Active</option>
                                        <option>In Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Focus Keywords</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- customer add Modal end  -->
@push('scripts')

<script type="text/javascript">

// jQuery validation and AJAX form submission
$('#productForm').on('submit', function (e) {
    alert("777");
    e.preventDefault();

    // Perform validation
    let valid = true;
    $('#productForm').find('input, select').each(function () {
        if ($(this).prop('required') && $(this).val() === '') {
            valid = false;
            alert($(this).attr('name') + ' is required');
            return false;
        }
    });

    if (!valid) return;

    let formData = new FormData(this);
    $.ajax({
        url: "{{ route('products.store') }}", // Replace with the actual route
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#productModal').modal('hide');
            alert(response.success);
            // Optionally, update the list of products dynamically
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('Something went wrong.');
        }
    });
});



    $(".btn-delete").click(function(e) {
        e.preventDefault();
        var form = $(this).parents("form");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
</script>
@endpush
