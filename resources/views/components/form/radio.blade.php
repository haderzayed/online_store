
@props([
    'name','options','checked'=>false
])

 @foreach ($options as $value => $text )

 <div class="form-check">
    <input

     @class([
        'form-check-input',
        ])

     type="radio" name="{{$name}}" value="{{$value}}"
     @checked(old($name,$checked )  == $value)>
    <label class="form-check-label" >
     {{ $text }}
    </label>
  </div>

 @endforeach

 @error('status')
 <div class="text-danger">
    {{$message}}
 </div>
 @enderror
