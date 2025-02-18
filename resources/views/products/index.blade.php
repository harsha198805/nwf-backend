@extends('products.layout')
     
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Product Management System</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
        <div class="row">
            <div class="col-md-12 d-grid gap-2 d-md-flex justify-content-md-end mb-4">
                <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
            </div>
        </div>

                <!-- Search and Filter Form -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="row">
                <!-- Search by product name -->
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search Products"
                        value="{{ request('search') }}">
                </div>

                <!-- Filter by category -->
                <div class="col-md-3">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Range Filter -->
                <div class="col-md-2">
                    <input type="number" name="min_price" class="form-control" placeholder="Min Price"
                        value="{{ request('min_price') }}">
                </div>

                <div class="col-md-2">
                    <input type="number" name="max_price" class="form-control" placeholder="Max Price"
                        value="{{ request('max_price') }}">
                </div>

                <!-- Filter Button -->
                <div class="col-md-2">
                <div class="d-flex">
                    <!-- Filter Button -->
                    <button type="submit" class="btn btn-primary mr-2">Filter</button>

                    <!-- Refresh Button -->
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Refresh</a>
                </div>
            </div>
            </div>
        </form>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="{{ asset('uploads/products/'.$product->image)}}"  width="40" height="30"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit"   class="btn btn-danger btn-sm btn-delete"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
  
  </div>
</div>  
@push('scripts')

<script type="text/javascript">
    $(".btn-delete").click(function(e){
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
@endsection
