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
                            <button id="add_btn" class="btn btn-info add-btn float-right" data-toggle="modal" data-target=".product-add">
                                <i class="icon-plus"></i> Add
                            </button>
                        </div>
                        <div class="custom-search">
                            <form method="GET" action="">
                                <input type="text" id="product_search" name="search" class="search-query" placeholder="Search Here..." value="">
                                <button type="button" id="product_search_btn" class="btn-light"><i class="icon-search1"></i></button>
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
                    <tbody id="productList">

                    </tbody>
                </table>
                <div class="pagination_admin" id="paginationLinks">
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Row end -->

<!-- customer add Modal start  -->
<div class="modal fade product-add" id="productModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-scrolls">
                <form id="productForm">
                    @csrf
                    <input type="hidden" id="product_id" name="product_id">
                    <section>

                        <div class="row gutters">
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="cate">Category</label>
                                    <select class="form-control selectpicker" name="category_id" id="category_id" data-live-search="true">
                                    </select>
                                    <span class="error-text text-danger" id="category_idError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control required" name="name" id="name" placeholder="">
                                    <span class="error-text text-danger" id="nameError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="" readonly>
                                    <span class="error-text text-danger" id="slugError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="product_price">Product Price</label>
                                    <input type="text" class="form-control" name="product_price" id="product_price" placeholder="">
                                    <span class="error-text text-danger" id="product_priceError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="">
                                    <span class="error-text text-danger" id="sale_priceError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" class="form-control" id="tags" name="tags" value="Test, Sri Lanka" data-role="tagsinput">
                                    <span class="error-text text-danger" id="tagsError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Weight (KG)</label>
                                    <input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="">
                                    <span class="error-text text-danger" id="product_weightError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="new_arrivals" id="new_arrivals" value="1">
                                        <label class="custom-control-label" for="new_arrivals">New Arrivals</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="featured" id="featured" value="1">
                                        <label class="custom-control-label" for="featured">Featured Products</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <textarea class="form-control summernote" id="short_description" name="short_description"></textarea>
                                    <span class="error-text text-danger" id="short_descriptionError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="description">Long Description</label>
                                    <textarea class="form-control summernote" id="long_description" name="long_description"></textarea>
                                    <span class="error-text text-danger" id="long_descriptionError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 1</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_1" id="image_1">
                                            <label class="custom-file-label" for="image_1" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error-text text-danger" id="image_1Error"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 2</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_2" id="image_2">
                                            <label class="custom-file-label" for="image_2" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error-text text-danger" id="image_2Error"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 3</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_3" id="image_3">
                                            <label class="custom-file-label" for="image_3" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error-text text-danger" id="image_3Error"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Product Image 4</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image_4" id="image_4">
                                            <label class="custom-file-label" for="image_4" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="error-text text-danger" id="image_4Error"></span>
                                </div>
                            </div>

                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="error-text text-danger" id="statusError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Meta Title</label>
                                    <textarea class="form-control" id="meta_title" name="meta_title"></textarea>
                                    <span class="error-text text-danger" id="meta_titleError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"></textarea>
                                    <span class="error-text text-danger" id="meta_descriptionError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="name">Focus Keywords</label>
                                    <textarea class="form-control" id="focus_keywords" name="focus_keywords"></textarea>
                                    <span class="error-text text-danger" id="focus_keywordsError"></span>
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
    function getCategorylist() {
        fetch('/category_list')
            .then(response => response.json())
            .then(data => {
                let categoryList = document.getElementById('category_id');
                let defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.text = 'Select One';
                categoryList.appendChild(defaultOption);
                data.forEach(category => {
                    let option = document.createElement('option');
                    option.value = category.id;
                    option.text = category.name;
                    categoryList.appendChild(option);
                });
                $('.selectpicker').selectpicker('refresh');
            })
            .catch(error => console.error('Error loading categories:', error));

    };

    $(document).ready(function() {
        ;
        $('.selectpicker').selectpicker();
        $(document).on('keyup', '.bs-searchbox input', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                let newCategory = $(this).val().trim();
                if (newCategory !== "") {
                    let slug = generateSlug(newCategory);
                    if ($('#category_id option').filter(function() {
                            return $(this).text().toLowerCase() === newCategory.toLowerCase();
                        }).length === 0) {

                        $(this).val('');
                        $.ajax({
                            url: '/add_new_category',
                            method: 'POST',
                            data: {
                                name: newCategory,
                                slug: slug,
                                status: 1,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success && response.new_category_id > 0) {
                                    let categoryList = document.getElementById('category_id');
                                    categoryList.innerHTML = '';
                                    getCategorylist();
                                    let newCategoryId = response.new_category_id;
                                    $('#category_id').append(new Option(newCategory, newCategoryId)).selectpicker('refresh');
                                    $('#category_id').selectpicker('val', newCategoryId);
                                    $('.bs-searchbox').val('');
                                    $('.selectpicker').selectpicker('toggle');
                                    $('.bs-searchbox input').val('');
                                    toastr.success('New category added successfully!');
                                }
                            },
                            error: function(error) {
                                toastr.error('Failed to added new category');
                            }
                        });
                    } else {
                        alert('Category already exists!');
                    }
                }
            }
        });

        fetchProducts();

        $('#name').on('keyup', function() {
            var name = $(this).val();
            var slug = generateSlug(name);
            $('#slug').val(slug);
        });

        function generateSlug(text) {
            return text.toString()
                .toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }

        $('#productForm').on('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            $('.error-text').text(''); // Assuming you add the class 'error-text' to all your error display elements

            // Prepare form data
            let formElement = document.getElementById('productForm');
            let formData = new FormData(formElement);

            // Get product ID (if editing)
            let productId = $('#product_id').val();
            let url = productId ? '/products/' + productId : '/products';
            let method = productId ? 'PUT' : 'POST'; // Changed method to PUT for updating
            let msg_res = productId ? 'edited' : 'created';

            // Perform the AJAX request
            $.ajax({
                url: url,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle errors if any
                    if (response.errors) {
                        // Loop through all errors and display them dynamically
                        for (let field in response.errors) {
                            if (response.errors.hasOwnProperty(field)) {
                                // $('#' + field + 'Error').text(response.errors[field][0]); // Field-specific error
                                $('#' + field + 'Error').html(
                                    response.errors[field][0].charAt(0).toUpperCase() + response.errors[field][0].slice(1)
                                );
                            }
                        }

                        let firstErrorField = $('.error-text').filter(function() {
                            return $(this).text().trim() !== '';
                        }).first();

                        if (firstErrorField.length) {
                            let errorFieldId = firstErrorField.attr('id').replace('Error', '');
                            let errorField = $('#' + errorFieldId);
                            let modalBody = $('.modal-body');
                            let errorOffsetTop = errorField.offset().top;

                            modalBody.animate({
                                scrollTop: errorOffsetTop - 150 - modalBody.offset().top + modalBody.scrollTop()
                            }, 500);
                        }
                    } else {
                        // Reset form, close modal, and show success message
                        $('#productForm')[0].reset();
                        $('.product-add').modal('hide');
                        toastr.success('Product ' + msg_res + ' successfully');
                        fetchProducts(); // Refresh product list
                    }
                },
                error: function(response) {
                    // Handle server errors
                    toastr.error('Failed to create product');
                }
            });
        });
        $('#productForm111').on('submit', function(e) {
            e.preventDefault();
            $('#categoryIdError').text('');
            $('#nameError').text('');
            $('#slugError').text('');
            $('#descriptionError').text('');
            $('#imageError').text('');
            $('#statusError').text('');

            let formElement = document.getElementById('productForm');
            let formData = new FormData(formElement);

            let productId = $('#product_id').val();
            let url = productId ? '/products/' + productId : '/products';
            let method = productId ? 'POST' : 'POST';
            let msg_res = productId ? 'edited' : 'created';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        $('#categoryIdError').text(response.errors.category_id);
                        $('#nameError').text(response.errors.name);
                        $('#slugError').text(response.errors.slug);
                        $('#descriptionError').text(response.errors.description);
                        $('#imageError').text(response.errors.image);
                        $('#statusError').text(response.errors.status);
                    } else {
                        $('#productForm')[0].reset();
                        $('.product-add').modal('hide');
                        toastr.success('Product ' + msg_res + ' successfully');
                        fetchProducts();
                    }
                },
                error: function(response) {
                    toastr.error('Failed to create product');
                }
            });
        });


        $('.summernote').summernote({
            height: 200,
        });
    });

    $('#add_btn').on('click', function(e) {
        // $('#productyForm')[0].reset();
        $('#description').summernote('code', '');
        $("#imagePreview").attr("src", "").removeClass("show-image-preview");
        $("#removeImage").addClass("hidden");
        getCategorylist();

    });

    function fetchProducts(page = 1) {
        const search = $('#product_search').val();
        $.ajax({
            url: '/products/getdata?page=' + page,
            method: 'GET',
            data: {
                search: search
            },
            success: function(data) {
                let productList = '';
                data.products.data.forEach(product => {
                    const formattedDate = formatDate(product.created_at);
                    productList += `
                <tr>
                    <td><img src="/uploads/products/${product.image_1 || 'default-image.png'}" class="pro-img" alt="${product.name}"></td>
                    <td>${product.name}</td>
                    <td>${formattedDate}</td>
                    <td>Admin</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" ${product.status == 1 ? 'checked' : ''} id="customSwitch${product.id}" onchange="toggleStatus(${product.id}, this.checked)">
                            <label class="custom-control-label" for="customSwitch${product.id}"></label>
                        </div>
                    </td>
                    <td>${product.product_price == null ? '':product.product_price}</td>
                    <td>
                        <div class="task-list">
                            <div class="task-block">
                                <li class="dropdown">
                                    <a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-dots-three-horizontal action-icon"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions">
                                        <a href="#" data-toggle="modal" data-target=".product-add" onclick="editProduct(${product.id})">
                                            <i class="icon-edit1"></i> Edit
                                        </a>
                                        <a href="#" onclick="deleteProduct(${product.id})">
                                            <i class="icon-delete"></i> Delete
                                        </a>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </td>
                </tr>
                `;
                });

                $('#productList').html(productList);

                let paginationLinks = '';
                data.products.links.forEach(link => {
                    if (link.url) {
                        let page = link.url.split('=')[1];
                        let activeClass = link.active ? 'active' : '';
                        paginationLinks += `<button class="btn btn-secondary btn-sm ${activeClass}" onclick="fetchProducts(${page})">${link.label}</button>`;
                    } else {
                        paginationLinks += `<button class="btn btn-secondary btn-sm disabled">${link.label}</button>`;
                    }
                });
                $('#paginationLinks').html(paginationLinks);
            }
        });
    }

    function editProduct(productId) {
        $.ajax({
            url: '/products/' + 'edit/' + productId,
            method: 'GET',
            success: function(data) {
                $('#name').val(data.product.name);
                $('#slug').val(data.product.slug);
                $('#description').summernote('code', data.product.description);
                $('#status').val(data.product.status);
                if (data.product_1) {
                    $('#imagePreview').attr('src', '/uploads/product/' + data.product.image_1).removeClass('hidden');
                }
                $('#submitBtn').text('Update');
                $('#myExtraLargeModalLabel').text('Edit Product');
                $('#productForm').attr('action', '/products/' + productId);
                $('#product_id').val(productId);
                $("#imagePreview").addClass("show-image-preview");
                $("#removeImage").removeClass("hidden");

            }
        });
    }

    function deleteProduct(productId) {
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
                $.ajax({
                    url: '/products/' + productId,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        toastr.success('Product deleted successfully');
                        fetchProducts();
                    }
                });
                // }
            }
        });
    }
    $('#product_search_btn').on('click', function(e) {
        e.preventDefault();
        fetchProducts();
    });

    function formatDate(dateString) {
        if (!dateString) {
            return 'N/A';
        }

        const date = new Date(dateString);
        return date.toLocaleString('en-US', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            hour12: true,
            timeZone: 'UTC'
        }).replace(',', '');
    }

    function toggleStatus(productId, status) {
        $.ajax({
            url: '/products/update-status',
            method: 'put',
            data: {
                id: productId,
                status: status ? 1 : 0,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    toastr.success('Status updated successfully.');
                } else {
                    toastr.error('Failed to update status.');
                }
            },
            error: function(xhr) {
                toastr.error('An error occurred while updating the status.');
            }
        });
    }

    $("#inputGroupFile02").change(function(event) {
        let file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").attr("src", e.target.result).addClass("show-image-preview");
                $("#removeImage").removeClass("hidden");
            };
            reader.readAsDataURL(file);
        }
    });

    $("#removeImage").click(function() {
        $("#inputGroupFile02").val("");
        $("#imagePreview").attr("src", "").removeClass("show-image-preview");
        $("#removeImage").addClass("hidden");
    });
</script>

@endpush