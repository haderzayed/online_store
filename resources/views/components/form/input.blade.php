@props([
    'type'=>'text' , 'name','value'=>'','placeholder'=>'','label'=>false
])

@if($label)
<label for="">{{$label}}</label>
@endif

<input
       type="{{$type}}"
       name="{{$name}}"
       value="{{old($name,$value)}}"
       placeholder="{{$placeholder}}"
      @class([
        'form-control',
        'is-invalid' => $errors->has($name)
        ])>
     @error($name)
     <div class="text-danger">
        {{$message}}
     </div>
     @enderror
