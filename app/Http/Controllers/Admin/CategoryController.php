<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add()
    {
       return view('admin.category.add');
    }

    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $file->move('assets/uploads/category',$fileName);//moving file to the server
            $category->image = $fileName;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');

        $category->save();


       return redirect('/dashboard')->with('status', "Category Added Successfully");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $fileName = time().'.'.$ext;
                $file->move('assets/uploads/category',$fileName);//moving file to the server
                $category->image = $fileName;
            
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE?'1':'0';
        $category->popular = $request->input('popular') == TRUE?'1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');

        $category->update();

        return redirect('dashboard')->with('status','category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->name;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();

        return redirect('categories')->with('status','category deleted successfully');
    }
}
