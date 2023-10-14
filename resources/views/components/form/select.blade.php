@props([
    'name','value'=>'','options'=>'','selected'=>'','label'=>false
])


@if($label)
<label for="">{{$label}}</label>
@endif

 
 
<select
  name="{{$name}}"
  @class([
    'form-control',
    'form-select',
    'is-invalid' => $errors->has($name)
    ])
>
 

    @if($options instanceof \Illuminate\Support\Collection )
        @foreach ($options as $option )
        <option value={{$option->id}} @selected($value == $option->id)>{{ $option->name }}</option>
        @endforeach
    @else
        @foreach ($options as $value => $text )
        <option value={{$value}} @selected($value == $selected)>{{ $text }}</option>
        @endforeach
    @endif

</select>
 
@error('status')
<div class="text-danger">
   {{$message}}
</div>
@enderror
