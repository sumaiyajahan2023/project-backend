<?php

namespace App\Http\Controllers;
use App\Models\service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function index(){
        $services = service::get();
        return view('service.index',compact('services'));
    } 
    public function create(){
        return view('service.create');
    }

    public function store(Request $request){
        //validation data
       $request->validate([
            'title'=>'required',
           // 'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
            'status'=>'required',
            'category_id'=>'required',
            
        ]);

        //image upload

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('service'), $image);
       

        $service = new service();
        $service->title = $request->title;
        $service->image = $image;
        $service->status = $request->status;
        $service->category_id = $request->category_id;
       
        $service->save();
        return back()->withSuccess('Service addedd successfully');

    }
    public function edit($id){
        $service = service::where('id',$id)->first();
        return view('service.edit',['service'=> $service]); 
    }
    public function update(Request $request, $id){
    
        $request->validate([
            'title' => 'required',
            // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'status' => 'required',
            'category_id'=>'required',
        ]);
    
        $service = service::find($id);
    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if (file_exists(public_path('service/' . $service->image))) {
                unlink(public_path('service/' . $service->image));
            }
    
            // Upload the new image
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('service'), $image);
    
            // Update the image field in the database
            $service->image = $image;
        }
    
        // Update other fields
        $service->title = $request->title;
        $service->status = $request->status;
        $service->category_id = $request->category_id;
       
    
       // Save the changes
       $service->update();  
        return back()->withSuccess('Service updated successfully!!');
    }
    
    public function destroy($id){
        $service = service::where('id',$id)->first();
        $service->delete();
        return back()->withSuccess('Service deleted successfully!!');

}
}
