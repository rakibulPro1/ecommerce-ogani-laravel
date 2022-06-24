@extends('layouts.admin_master')
@section('admin_content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

 <!-- Categories table -->
  <div class="row">
    <div class="col-lg-8 col-12">
        
        <form method="POST" action={{ route('update.category') }}  class="pt-3 pb-4 px-3" style="background-color: #fff;">
            @csrf
            {{-- hidden input  --}}
            <input type="hidden" value="{{ $category->id }}" name="category_id">
            {{-- --/ hidden inoput end  --}}
            <h3 class="mb-4">Edit Category</h3>
            <input class="form-control form-control-md mb-3 @error('category_name')
                is-invalid
            @enderror" type="text" name="category_name" value="{{ $category->category_name }}">
            @error('category_name')
            <p class="mt-2 text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-sm btn-primary ">Update</button>
        </form>
    </div>
  </div>

  

</div>
<!-- /.container-fluid -->
    
@endsection