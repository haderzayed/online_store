@props([
     'name','value'=>'','label'=>false
])

@if($label)
<label for="" class="pt-3">{{$label}}</label>
@endif

<textarea

       name="{{$name}}"
      @class([
        'form-control',
        'is-invalid' => $errors->has($name)
        ])>{{old($name,$value)}}
</textarea>
     @error($name)
     <div class="text-danger">
        {{$message}}
     </div>
     @enderror
