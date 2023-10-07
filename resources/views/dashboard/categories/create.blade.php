@extends('layouts.dashboard')

 @section('title','Create Category')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Categories</li>
              <li class="breadcrumb-item active">Create</li>
 @endsection
 @section('content')
 <div class="col-8">
      <form action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @include('dashboard.categories._form')

      </form>
 </div>
@endsection
