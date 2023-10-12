@extends('layouts.dashboard')

 @section('title',$category->name . ' Category')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Categories</li>
              <li class="breadcrumb-item active">show</li>
 @endsection
 @section('content')
 <div class="mb-5">
    <table class="table" >
        <thead>
            <tr>

                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>store</th>
                <th>Status</th>
                 <th>Created At</th>
                 <th class="text-center">Action</th>
             </tr>
        </thead>
        <tbody>

            @forelse ( $products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('storage/'.$product->image )}}" height="100" width="100"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->store->name}}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <a href="{{route('dashboard.products.show',$product->id)}}" class="btn btn-small btn-success">show</a>
                </td>

            </tr>
            @empty
            <tr><td colspan="7" class="text-center">NO Products Defiend.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->WithQueryString()->links()}}

 </div>
@endsection
