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
  @foreach ($options as $value => $text )
      <option value={{$value}} @selected($value == $selected)>{{ $text }}</option>
  @endforeach

</select>
