@extends('layouts.dashboard')

 @section('title','Edite Category')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Categories</li>
              <li class="breadcrumb-item active">Edit</li>
 @endsection
 @section('content')
 <div class="col-8">
      <form action="{{route('dashboard.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            @include('dashboard.categories._form', [
                'button_label'=>'Update'
            ] )
      </form>
 </div>
@endsection
