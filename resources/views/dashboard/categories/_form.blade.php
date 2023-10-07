

<div class="form-group ">

    <x-form.input type="text" name="name"  value="{{$category->name}}" label="Category Name"/>

</div>
<div class="form-group ">

    <label for="">Category Parent</label>
     <select name="parent_id"
     @class([
        'form-control',
        'is-invalid' => $errors->has('parent_id')
        ])>
        <option value="" >Select Parent</option>
        @foreach ($parents as $parent )
        <option value="{{$parent->id}}" @selected(old('parent_id',$category->parent_id ) == $parent->id)>{{$parent->name}}</option>
        @endforeach
     </select>

     @error('parent_id')
     <div class="text-danger">
        {{$message}}
     </div>
     @enderror
</div>
@if($category->image)
<img src="{{ asset('storage/'.$category->image )}}" height="100" width="100" class="m-4"></td>
@endif
<div class="custom-file">
    <x-form.label id="image">Choose Image</x-form.label>
    <x-form.input type="file" name="image" />

</div>
<div class="form-group">
    <x-form.textarea   name="description"  value="{{$category->description}}" label="Category Description"/>

</div>
<div class="form-group ">
   <x-form.label>Status</x-form.label>
   <x-form.radio   name="status" checked="{{$category->status}}" :options="['active'=>'Active','archived'=>'Archived']"/>
</div>

<button type="submit" class="btn btn-info">{{$button_label ?? 'Save'}}</button>
<button type="reset" class="btn btn-default float-right">Cancel</button>
