@extends('layouts.admin.admin_layout')


@section('content')

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="row gutters content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <h4>Category</h4>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="btn-alignment">
                            <button class="btn btn-info add-btn float-right" data-toggle="modal" data-target=".product-add">
                                <i class="icon-plus"></i> Add
                            </button>
                        </div>
                        <div class="custom-search">
                            <input type="text" id="category_search" name="search" class="search-query" placeholder="Search Here..." value="">
                            <button type="button" id="category_search_btn" class="btn-light"><i class="icon-search1"></i></button>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoryList">
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
<div class="modal fade product-add" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section>
                    <form id="categoryForm">
                        @csrf
                        <input type="hidden" id="category_id" name="category_id">
                        <div class="row gutters">
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    <span class="text-danger" id="nameError"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="" readonly>
                                    <span class="text-danger" id="slugError"></span>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control summernote" id="description" name="description"></textarea>
                                    <span class="text-danger" id="descriptionError"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Add Image</label>
                                    <label class="pro-image-delete"><span class="icon-delete"></span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="imageError"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div id="currentImage"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    <span class="text-danger" id="statusError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info" id="submitBtn">Add</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- customer add Modal end  -->
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        fetchCategories();

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
        $(document).on('submit', '#categoryForm444', function(e) {
            e.preventDefault();

            let formElement = document.getElementById('categoryForm');
            let formData = new FormData(formElement);

            let categoryId = $('#category_id').val();
            let url = categoryId ? '/categories/' + categoryId : '/categories';
            let method = categoryId ? 'POST' : 'POST';

            $.ajax({
                url: url,
                type: method,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.errors) {
                        $.each(response.errors, function(key, value) {
                            $('#' + key + 'Error').text(value);
                        });
                    } else {
                        toastr.success(response.success);
                        $('#categoryForm')[0].reset();
                        $('#category_id').val('');
                        $('#submitBtn').text('Submit');
                        fetchCategories();
                        $('#categoryModal').modal('hide');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        });

        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();
            $('#nameError').text('');
            $('#slugError').text('');
            $('#descriptionError').text('');
            $('#imageError').text('');
            $('#statusError').text('');

            let formElement = document.getElementById('categoryForm');
            let formData = new FormData(formElement);

            let categoryId = $('#category_id').val();
            let url = categoryId ? '/categories/' + categoryId : '/categories';
            let method = categoryId ? 'POST' : 'POST';
            let msg_res = categoryId ? 'edited' : 'created';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.errors) {
                        $('#nameError').text(response.errors.name);
                        $('#slugError').text(response.errors.slug);
                        $('#descriptionError').text(response.errors.description);
                        $('#imageError').text(response.errors.image);
                        $('#statusError').text(response.errors.status);
                    } else {
                        $('#categoryForm')[0].reset();
                        $('.product-add').modal('hide');
                        toastr.success('Category ' + msg_res + ' successfully');
                        fetchCategories();
                    }
                },
                error: function(response) {
                    toastr.error('Failed to create category');
                }
            });
        });


        $('.summernote').summernote({
            height: 200,
        });
    });

    function fetchCategories(page = 1) {
        const search = $('#category_search').val();
        $.ajax({
            url: '/categories/getdata?page=' + page,
            method: 'GET',
            data: {
                search: search
            },
            success: function(data) {
                let categoryList = '';
                data.categories.data.forEach(category => {
                    const formattedDate = formatDate(category.created_at);
                    categoryList += `
                <tr>
                    <td><img src="/uploads/category/${category.image || 'default-image.png'}" class="pro-img" alt="${category.name}"></td>
                    <td>${category.name}</td>
                    <td>${formattedDate}</td>
                    <td>Admin</td>
                    <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" ${category.status == 1 ? 'checked' : ''} id="customSwitch${category.id}">
                            <label class="custom-control-label" for="customSwitch${category.id}"></label>
                        </div>
                    </td>
                    <td>
                        <div class="task-list">
                            <div class="task-block">
                                <li class="dropdown">
                                    <a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-dots-three-horizontal action-icon"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions">
                                        <a href="#" data-toggle="modal" data-target=".product-add" onclick="editCategory(${category.id})">
                                            <i class="icon-edit1"></i> Edit
                                        </a>
                                        <a href="#" onclick="deleteCategory(${category.id})">
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

                $('#categoryList').html(categoryList);

                let paginationLinks = '';
                data.categories.links.forEach(link => {
                    if (link.url) {
                        let page = link.url.split('=')[1];
                        let activeClass = link.active ? 'active' : '';
                        paginationLinks += `<button class="btn btn-secondary btn-sm ${activeClass}" onclick="fetchCategories(${page})">${link.label}</button>`;
                    } else {
                        paginationLinks += `<button class="btn btn-secondary btn-sm disabled">${link.label}</button>`;
                    }
                });
                $('#paginationLinks').html(paginationLinks);
            }
        });
    }

    function editCategory(categoryId) {
        $.ajax({
            url: '/categories/' + 'edit/' + categoryId,
            method: 'GET',
            success: function(data) {
                $('#name').val(data.category.name);
                $('#slug').val(data.category.slug);
                $('#description').summernote('code', data.category.description);
                $('#status').val(data.category.status);
                if (data.category.image) {
                    $('#currentImage').html(`<img src="/uploads/category/${data.category.image}" alt="${data.category.name}" class="img-fluid">`);
                } else {
                    $('#currentImage').html(`<img src="/uploads/category/default-image.png" alt="No Image" class="img-fluid">`);
                }
                $('#submitBtn').text('Update');
                $('#myExtraLargeModalLabel').text('Edit Category');
                $('#categoryForm').attr('action', '/categories/' + categoryId);
                $('#category_id').val(categoryId);

            }
        });
    }

    function deleteCategory(categoryId) {

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
                    url: '/categories/' + categoryId,
                    method: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        toastr.success('Category deleted successfully');
                        fetchCategories();
                    }
                });
                // }
            }
        });
    }
    $('#category_search_btn').on('click', function(e) {
        e.preventDefault();
        fetchCategories();
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
</script>
@endpush