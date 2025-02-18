@extends('products.layout')
     
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit Product</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label"><strong>Category</strong></label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Select Category</option>
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}" {{$product->category_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $product->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label"><strong>Price:</strong></label>
            <input value="{{ old('price',$product->price) }}" id="price" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
            @error('price')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="description" class="form-label"><strong>Description:</strong></label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                style="height:100px" 
                name="description" 
                id="description" 
                placeholder="Description">{{ $product->description }}</textarea>
            @error('description')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            <img src="{{asset('uploads/products/'.$product->image)}}"  width="150" height="130">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@endsection