@extends('products.layout')
     
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Category Management</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}"> <i class="fa fa-plus"></i> Create New Category</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($category as $categories)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $categories->name }}</td>
                    <td>{{ $categories->description }}</td>
                    <td>
                        <form action="{{ route('categories.destroy',$categories->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('categories.show',$categories->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$categories->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-delete"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $category->withQueryString()->links('pagination::bootstrap-5') !!}
  
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
