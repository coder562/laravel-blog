<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Models\Category;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function index(){
        $category=Category::all();
        return view('admin/category/index',compact('category'));
    }

    public function store(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:posts|max:8',
            'body' => 'required',
        ]);
        echo $file=$request->file('image');
        echo $filename='image'.time().'.'.$request->image->extension();
        echo $file->move("admin/upload/",$filename);
        $data = new Category();
        $data->name=$request->name; // php js html php-js-html
        $data->slug=Str::slug($request->name,'-');
        $data->description=$request->description;
        $data->image=$filename;
        $data->save();
        return redirect()->back();

    }


    public function update(Request $request,$id)
    {
        //  echo "<pre>";
        //  print_r($request->all());
        //  die('here');

        if($request->hasFile('image'))
        {

            $file=$request->file('image');
            //dd($file);
            //echo "<pre>";
            //print_r($file);
            //die;
        //$filename ='image'. time().'.'.$a->image->extension();
        $filename ='image'. time().'.'.$request->image->getClientOriginalName();
        // echo "<pre>";
        // print_r($filename);
        $file->move("admin/upload/",$filename);
        $data=Category::findOrFail($id);
        $destination="admin/upload/".$data->image;

           if(File::exists($destination))
           {
               File::delete($destination);
            }

        $data->name=$request->name;
        $data->slug= Str::slug($request->name,'-');
        $data->description=$request->description;
        $data->image=$filename;
        $data->save();
        Toastr::success('Data update successfully :)');
            return redirect()->back();
        }
        else
        {
            $data=Category::findOrFail($id);
            $data->name=$request->name;
            $data->slug= Str::slug($request->name,'-');
            $data->description=$request->description;
            $data->save();
            Toastr::success('Data update successfully :)');
                return redirect()->back();
        }

}


//     public function update(Request $a){
//         // echo "<pre>";
//         // print_r($c->all());
//         if($a->hasFile('image')){
//             $file=$a->file('image');
//         // dd($file);
//         // echo "<pre>";
//         // print_r($file);
//         $filename = 'image'. time().'.'.$a->image->extension();
//         $file->move("admin/upload/",$filename);
//         $data=Category::find($a->id);
//         $data->name=$a->name;
//         $data->slug=$a->slug;
//         $data->description=$a->description;
//         $data->image=$filename;
//         $data->save();
//         Toastr::success('Data update successfully :)');
//         return redirect()->back();

//     }
//     else{
//         $data=Category::find($a->id);
//         $data->name=$a->name;
//         $data->slug=$a->slug;
//         $data->description=$a->description;
//         $data->save();
//         Toastr::success('Data update successfully :)');
//         return redirect()->back();

//     }
// }






    public function delete($id)
    {
        // echo $id;
         //die;
         $data = Category::findOrFail($id);
         $destination="admin/upload/".$data->image;
         if(File::exists($destination))
         {
            File::delete($destination);
         }
         $data->delete();
         Toastr::success('Data deleted successfully :)');
         return redirect()->back();
    }
}




