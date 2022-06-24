@extends('layouts.admin_master')
@section('admin_content')

 <!-- Begin Page Content -->
 <div class="container-fluid">


  

  <!-- Categories table -->
  <div class="row">
    <div class="col-lg-8 col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
            </div>
            {{-- @if ({{ session('delete') }})
                <span class="alert alert-danger" role="alert">{{ session('delete') }}</span>
            @endif --}}
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Id</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @php
                            $i = 1
                        @endphp
                        
                          @foreach ($categories as $category )
                          <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $category->category_name }}</td>
                              <td>
                                @if ($category->category_status == 1)
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-danger">Deactive</span>                                                               
                                @endif
                              </td>
                              <td>
                                <a href="{{ url('admin/categories/edit/' .$category->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/categories/delete/' .$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                              </td>
                              <a href="{{ route('admin.category') }}" class="btn btn-sm "></a>
                              
                          </tr>
                          @endforeach
                            
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
       @if (session('success'))
       <div class="alert alert-success" role="alert">
    
    
        {{ session('success') }}
        
      </div>
       @endif
       
        <form method="POST" action={{ route('store.category') }}  class="pt-3 pb-4 px-3" style="background-color: #fff;">
            @csrf
            <h3 class="mb-4">Add Category</h3>
            <input class="form-control form-control-md mb-3 @error('category_name')
                is-invalid
            @enderror" type="text" placeholder="Cartegory Name" name="category_name">
            @error('category_name')
            <p class="mt-2 text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-sm btn-primary ">Add Category</button>
        </form>
    </div>
  </div>

  

</div>
<!-- /.container-fluid -->
    
@endsection