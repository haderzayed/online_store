<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $request=request();
         $categories=Category::filter($request->query())
                               ->paginate();
        //  $categories=Category::active()->paginate();
        // $categories=Category::status('archived')->paginate();

         return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents=Category::all();
        $category=new Category();

        return view('dashboard.categories.create',compact('category','parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
       $request->merge([
        'slug'=>Str::slug($request->name)
       ]);

         $data=$request->except('image');
          if($request->hasFile('image')){
               $file=$request->file('image');
               $path=$file->store('uploads/categoories','public');
               $data['image']=$path;
          }
        Category::create($data);

        return Redirect::route('dashboard.categories.index')->with('success','Category Created Succesfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);

        $parents=Category::where('id','<>',$id)
                                ->where(function($query)use($id){
                                $query->whereNull('parent_id')
                                ->orWhere('parent_id','<>',$id);
                           })->get();


        return view('dashboard.categories.edit',compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category=Category::find($id);
         $old_image=$category->image;
        $data=$request->except('image');
          if($request->hasFile('image')){
               $file=$request->file('image');
               $path=$file->store('uploads/categoories','public');
               $data['image']=$path;
          }
        $category->update($data);
        if($old_image && isset($data['image'])){
            Storage::disk('public')->delete($old_image);
        }
        return Redirect::route('dashboard.categories.index')->with('success','Category Updated Succesfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        $category->delete();

        return Redirect::route('dashboard.categories.index')->with('success','Category Deleted Succesfuly');
    }

    public function trash(){

        $categories=Category::onlyTrashed()->paginate();
        return view('dashboard.categories.trash', compact('categories'));

    }


    public function restore(Request $Request ,$id){
        $category=Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return Redirect::route('dashboard.categories.trash')
         ->with('success','Category Trashed Succesfuly');
    }
    public function forceDelete($id){
        $category=Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if(  $category->image){
            Storage::disk('public')->delete( $category->image);
        }
        return Redirect::route('dashboard.categories.trash')
         ->with('success','Category Deleted Forever Succesfuly');
    }
}
