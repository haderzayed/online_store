@extends('layouts.dashboard')

 @section('title','Products')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Products</li>
 @endsection
 @section('content')
   <div class="mb-5">
    <a href="{{route('dashboard.products.create')}}" class="btn btn-sm btn-primary m-2">Create </a>
    <a href="{{route('dashboard.products.trash')}}" class="btn btn-sm btn-dark">Trash </a>
   </div>
    <x-alert type="success"/>
    <x-alert type="info"/>
    <x-alert type="danger"/>

    <form action="{{URL::current()}}" method="get" class="d-flex  mb-5">
        <x-form.input name="name" :value="request('name')" placeholder="Name"  class="mx-2"></x-form.input>
        <select name="status" class="form-control mx-2">
            <option value=""> All </option>
            <option value="active" @selected(request('status')=='active')>Active</option>
            <option value="archived" @selected(request('status')=='archived')>Archived</option>
        </select>
        <button class="btn btn-dark mx-2"> filter</button>

    </form>
<table class="table" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ asset('storage/'.$product->image )}}" height="100" width="100"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->store->name}}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-small btn-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submi">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">NO Products Defiend.</td></tr>
        @endforelse
    </tbody>
</table>

{{$products->WithQueryString()->links()}}


@endsection
