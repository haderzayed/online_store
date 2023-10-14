

<div class="form-group row">
    <div class=" col-md-6">
       <x-form.input type="text" name="name"  value="{{$product->name}}" label="Product Name"/>
    </div>
    <div class=" col-md-6">
        <x-form.select  name="category_id"   label="Category Name" :options="$categories" :value="old('category_id',$product->category_id)"/>
        </div>
</div>

<div class="form-row ">
    <div class="class col-md-6">
       <x-form.input  name="price" type="number"   label="price" :value="$product->price"/>
    </div>
    <div class="class col-md-6">
        <x-form.input  name="compare_price" type="number"   label="compare price" :value="$product->compare_price"/>
     </div>
</div>
 
<div class="form-group row">
    <div class=" col-md-6">
        <x-form.label>Status</x-form.label>
        <x-form.radio   name="status" checked="{{$product->status}}" :options="['active'=>'Active','archived'=>'Archived','draft'=>'Draft']"/>
    </div>
</div>
@if($product->image)
<div class="form-group row">
<img src="{{ asset('storage/'.$product->image )}}" height="100" width="100" class="m-4"></td>
</div>
@endif
 
<div class="form-group row">
    <div class="custom-file  col-md-12">
        <x-form.label id="image">Choose Image</x-form.label>
        <x-form.input type="file" name="image" />
    </div>
</div>
    <div class="form-group row">
        <div class="class col-md-12">
           {{-- <x-form.input  name="tags"    label="Tags" :value="$tags"/> --}}
           <x-form.textarea   name="tags"   :value="$tags"  label="Tags" />
        </div>
         
    </div>
    <div class="form-group row">
        <div class="class col-md-12">
            <x-form.textarea   name="description"  value="{{$product->description}}" label="Category Description"/>
        </div>  
    </div>
 
 
  
<div cclass="mt-3 row">
<button type="submit" class="btn btn-info">{{$button_label ?? 'Save'}}</button>
<button type="reset" class="btn btn-default float-right">Cancel</button>
</div>

@push('styles')
<link href="{{ asset('dist/css/tagify.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('dist/js/tagify.js') }}"></script>
<script src="{{ asset('dist/js/tagify.polyfills.min.js')}}"></script>
<script>
    var inputElm = document.querySelector('[name=tags]'),
    tagify = new Tagify (inputElm);
</script>
@endpush