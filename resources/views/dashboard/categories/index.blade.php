@extends('layouts.dashboard')

 @section('title','Categories')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Categories</li>
 @endsection
 @section('content')
   <div class="mb-5">
    <a href="{{route('dashboard.categories.create')}}" class="btn btn-sm btn-primary m-2">Create </a>
    <a href="{{route('dashboard.categories.trash')}}" class="btn btn-sm btn-dark">Trash </a>
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
            <th>Parent</th>
            <th>Status</th>
            <th style="width: 12%;">Products #</th>
            <th>Created At</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><img src="{{ asset('storage/'.$category->image )}}" height="100" width="100"></td>
            <td><a href="{{route('dashboard.categories.show', $category->id)}}">{{ $category->name }}</a></td>
            <td>{{ $category->parent->name  }}</td>
            <td>{{ $category->status }}</td>
            <td>{{ $category->products_count }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-small btn-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-small btn-danger" type="submi">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="9" class="text-center">NO Categories Defiend.</td></tr>
        @endforelse
    </tbody>
</table>

{{$categories->WithQueryString()->links()}}


@endsection
