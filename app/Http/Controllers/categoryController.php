<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    
        public function index(){
            $categories = category::get();
            return view('category.index',compact('categories'));
        } 
        public function create(){
            return view('category.create');
        }
        public function store(Request $request){
            //validation data
           $request->validate([
                'name'=>'required',
                'status'=>'required',
                
            ]);
    
            $category = new category();
            $category->name = $request->name;
            $category->status = $request->status;
           
            $category->save();
            return back()->withSuccess('Category addedd successfully');
    
        }
        public function edit($category_id){
            $category = category::where('category_id',$category_id)->first();
            return view('category.edit',['category'=> $category]); 
        }
        public function update(Request $request, $category_id){
        
            $request->validate([
                'name' => 'required',
                'status' => 'required',
            ]);
        
            $category = category::find($category_id);
        
            
        
            // Update other fields
            $category->name = $request->name;
            $category->status = $request->status;
        
           // Save the changes
           $category->update();  
            return back()->withSuccess('Caregory updated successfully!!');
        }
        
        public function destroy($category_id){
            $category = category::find($category_id);
            $category->delete();
            return back()->withSuccess('Category deleted successfully!!');
        }
        

    }
    
    
    
    

