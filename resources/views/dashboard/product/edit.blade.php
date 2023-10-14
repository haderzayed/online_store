@extends('layouts.dashboard')

 @section('title','Edite Product')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Products</li>
              <li class="breadcrumb-item active">Edit</li>
 @endsection
 @section('content')
 <div >
      <form action="{{route('dashboard.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
            @include('dashboard.product._form', [
                'button_label'=>'Update'
            ] )
      </form>
 </div>
@endsection
