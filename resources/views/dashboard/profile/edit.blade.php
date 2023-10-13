@extends('layouts.dashboard')

 @section('title','Edite Category')
 @section('breadcrumb')
              @parent
              <li class="breadcrumb-item active">Categories</li>
              <li class="breadcrumb-item active">Edit</li>
 @endsection
 @section('content')
 <x-alert type="success"/>
 <div class="col-8">
      <form action="{{route('dashboard.profile.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('Patch')

        <div class="form-row ">
             <div class="class col-md-6">
                <x-form.input  name="first_name"    label="First Name" :value="$user->profile->first_name"/>
             </div>
             <div class="class col-md-6">
                <x-form.input  name="last_name"   label="Last Name" :value="$user->profile->last_name"/>
             </div>
        </div>
        <div class="form-row ">
            <div class="class col-md-6">
               <x-form.input  name="birthday" type="date"   label="birthday" :value="$user->profile->birthday"/>
            </div>
            <div class="class col-md-6">
               <x-form.radio  name="gender"   label="Gender" :options="['male'=>'Male','female'=>'Female']" :checked="$user->profile->gender"/>
            </div>
       </div>
       <div class="form-row ">
        <div class="class col-md-4">
           <x-form.input  name="street_address"  label="Street Address" :value="$user->profile->street_address"/>
        </div>
        <div class="class col-md-4">
           <x-form.input  name="city"   label="City" :value="$user->profile->city" />
        </div>
        <div class="class col-md-4">
            <x-form.input  name="state"   label="State" :value="$user->profile->state"/>
         </div>
      </div>
       <div class="form-row ">
        <div class="class col-md-4">
           <x-form.input  name="postal_code"  label="Postal Code" :value="$user->profile->postal_code"/>
        </div>
        <div class="class col-md-4">
           <x-form.select  name="country"   label="Country" :options="$countries" :selected="$user->profile->country"/>
        </div>
        <div class="class col-md-4">
            <x-form.select  name="locale"   label="Locale" :options="$locales" :selected="$user->profile->locale"/>
         </div>
      </div>
      <div  class="mt-3">
        <button type="submit" class="btn btn-info"> Save</button>
        <button type="reset" class="btn btn-default float-right">Cancel</button>
      </div>


      </form>
 </div>
@endsection
