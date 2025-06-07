<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function list_parent_category(){
        $parent_cat=DB::table('parent_category')->paginate(15);
        return view('admin.cms.list-parent-category',compact('parent_cat'))->with('i',1);
    }
    public function add_parent_category(){
        return view('admin.cms.add-parent-category');
    }
    public function save_parent_category(Request $request){
        $this->validate($request,[
            'product_category_name' => 'required',
            'product_category_slug' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/parentCategory/', $image);
        }
        $data=array('category_name'=>$request->input('product_category_name'),'slug'=>$request->input('product_category_slug'),
        'image'=>$image,'description'=>$request->input('description'));
        DB::table('parent_category')->insert($data);
        return redirect()->route('admin.list_parent_category')->with('success','Category Saved Successfully !!');
    }
    public function edit_parent_category($id){
        $cat_detail=DB::table('parent_category')->where('id',$id)->first();
        return view('admin.cms.edit-parent-category',compact('cat_detail'));
    }
    public function update_parent_category(Request $request){
        
        $this->validate($request,[
            'product_category_name' => 'required',
            'product_category_slug' => 'required',
            'description' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/parentCategory/', $image);
        }
        $data=array('category_name'=>$request->input('product_category_name'),'slug'=>$request->input('product_category_slug'),
        'image'=>$image,'description'=>$request->input('description'));
        DB::table('parent_category')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_parent_category')->with('success','Category Update Successfully !!');
    }
    public function parent_category_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('parent_category')->where('id',$request->id)->update($data);
    }
    public function delete_parent_category($id){
        DB::table('parent_category')->where('id',$id)->delete();
        return redirect()->route('admin.list_parent_category')->with('success','Category Deleted Successfully !!');
    }

    public function list_sub_category(){
        $sub_cat=DB::table('product_sub_category')->paginate(15);
        $parent_cat=DB::table('parent_category')->get();
        return view('admin.cms.list-sub-category',compact('sub_cat','parent_cat'))->with('i',1);
    }
    public function add_sub_category(){
        $parent_cat=DB::table('parent_category')->get();
        return view('admin.cms.add-sub-category',compact('parent_cat'));
    }
    public function save_sub_category(Request $request){
        $this->validate($request,[
            'product_category_name' => 'required',
            'product_category_slug' => 'required',
            'description' => 'required',
            'parent_cat' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/subCategory/', $image);
        }
        $data=array('name'=>$request->input('product_category_name'),'slug'=>$request->input('product_category_slug'),
        'image'=>$image,'description'=>$request->input('description'),'parent_cat_id'=>$request->input('parent_cat'));
        DB::table('product_sub_category')->insert($data);
        return redirect()->route('admin.list_sub_category')->with('success','Category Saved Successfully !!');
    }
    public function edit_sub_category($id){
        $cat_detail=DB::table('product_sub_category')->where('id',$id)->first();
        $parent_cat=DB::table('parent_category')->get();
        return view('admin.cms.edit-sub-category',compact('cat_detail','parent_cat'));
    }
    public function update_sub_category(Request $request){
        
        $this->validate($request,[
            'product_category_name' => 'required',
            'product_category_slug' => 'required',
            'description' => 'required',
            'parent_cat' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/subCategory/', $image);
        }
        $data=array('name'=>$request->input('product_category_name'),'slug'=>$request->input('product_category_slug'),
        'image'=>$image,'description'=>$request->input('description'),'parent_cat_id'=>$request->input('parent_cat'));
        DB::table('product_sub_category')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_sub_category')->with('success','Category Update Successfully !!');
    }
    public function sub_category_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('product_sub_category')->where('id',$request->id)->update($data);
    }
    public function delete_sub_category($id){
        DB::table('product_sub_category')->where('id',$id)->delete();
        return redirect()->route('admin.list_sub_category')->with('success','Category Deleted Successfully !!');
    }

    public function list_product(){
        $product_detail=DB::table('products')->paginate(15);
        return view('admin.cms.list-product',compact('product_detail'))->with('i',1);
    }
    public function add_product(){
        $parent_cat=DB::table('parent_category')->get();
        return view('admin.cms.add-product',compact('parent_cat'));
    }
    public function save_product(Request $request){
        $this->validate($request,[
            'product_name' => 'required',
            'product_slug' => 'required',
            'description' => 'required',
            'parent_cat' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/product/', $image);
        }
        $data=array('product_name'=>$request->input('product_name'),'slug'=>$request->input('product_slug'),
        'image'=>$image,'description'=>$request->input('description'),'parent_cat'=>$request->input('parent_cat')
        ,'sub_cat'=>$request->input('sub_cat'),
        'new_arrival'=>$request->input('new_arrival'),'best_seller'=>$request->input('best_seller'));
        DB::table('products')->insert($data);
        return redirect()->route('admin.list_product')->with('success','Product Saved Successfully !!');
    }
    public function edit_product($id){
        $product_detail=DB::table('products')->where('id',$id)->first();
        $parent_cat=DB::table('parent_category')->get();
        $sub_cat=DB::table('product_sub_category')->get();
        return view('admin.cms.edit-product',compact('product_detail','parent_cat','sub_cat'));
    }
    public function update_product(Request $request){
        
        $this->validate($request,[
            'product_name' => 'required',
            'product_slug' => 'required',
            'description' => 'required',
            'parent_cat' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/product/', $image);
        }
        $data=array('product_name'=>$request->input('product_name'),'slug'=>$request->input('product_slug'),
        'image'=>$image,'description'=>$request->input('description'),'parent_cat'=>$request->input('parent_cat'),
        'sub_cat'=>$request->input('sub_cat'),
        'best_seller'=>$request->input('best_seller'),'new_arrival'=>$request->input('new_arrival'));
        DB::table('products')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_product')->with('success','Product Update Successfully !!');
    }
    public function product_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('products')->where('id',$request->id)->update($data);
    }
    public function product_bestseller_status(Request $request){
        $data=array('best_seller'=>$request->best_seller);
        DB::table('products')->where('id',$request->id)->update($data);
    }
    public function product_newarrival_status(Request $request){
        $data=array('new_arrival'=>$request->new_arrival);
        DB::table('products')->where('id',$request->id)->update($data);
    }
    public function product_available_status(Request $request){
        $data=array('available'=>$request->available);
        DB::table('products')->where('id',$request->id)->update($data);
    }

    public function delete_product($id){
        DB::table('products')->where('id',$id)->delete();
        DB::table('product_variants')->where('product_id',$id)->delete();
        DB::table('product_images')->where('product_id',$id)->delete();
        return redirect()->route('admin.list_product')->with('success','Category Deleted Successfully !!');
    }
    public function get_product_sub_category($id)
    {
        $sub_category = DB::table("product_sub_category")
        ->where("parent_cat_id",$id)->pluck("name","id");
        return json_encode($sub_category);
    }
    //////////////
    public function list_product_variant(){
        $variant_detail=DB::table('product_variants')->paginate(15);
        return view('admin.cms.list-product-variant',compact('variant_detail'))->with('i',1);
    }
    public function add_product_variant(){
        $product=DB::table('products')->where('status',1)->get();
        return view('admin.cms.add-product-variant',compact('product'));
    }
    public function save_product_variant(Request $request){
        $this->validate($request,[
            'product_id' => 'required',
            'cost' => 'required',
            'product_type' => 'required'
        ]);
        $packed=NULL;
        if($request->pack_size!=''){
            $packed=1;
        }
        $data=array('product_id'=>$request->input('product_id'),'weight'=>$request->input('weight'),'weight_unit'=>$request->input('weight_unit'),
        'size_category'=>$request->input('size_category'),'packed'=>$packed,'packed_size'=>$request->input('pack_size'),'cost'=>$request->input('cost'));
        DB::table('product_variants')->insert($data);
        return redirect()->route('admin.list_product_variant')->with('success','Saved Successfully !!');
    }
    public function product_variant_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('product_variants')->where('id',$request->id)->update($data); 
    }
    public function edit_product_variant($id){
        $variant_detail=DB::table('product_variants')->where('id',$id)->first();
        $product=DB::table('products')->where('status',1)->get();
        return view('admin.cms.edit-product-variant',compact('variant_detail','product'));
    }
    public function update_product_variant(Request $request){
        $this->validate($request,[
            'product_id' => 'required',
            'cost' => 'required',
        ]);
        $data=array('product_id'=>$request->input('product_id'),'weight'=>$request->input('weight'),'weight_unit'=>$request->input('weight_unit'),
        'size_category'=>$request->input('size_category'),'packed_size'=>$request->input('pack_size'),'cost'=>$request->input('cost'));
        DB::table('product_variants')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_product_variant')->with('success','Updated Successfully !!');
    }
    public function delete_product_variant($id){
        DB::table('product_variants')->where('id',$id)->delete();
        return redirect()->route('admin.list_product_variant')->with('success','Deleted Successfully !!');
    }

    public function list_product_image(){
        $image_detail=DB::table('product_images')->paginate(15);
        return view('admin.cms.list-product-image',compact('image_detail'));
    }
    public function add_product_image(){
        $product=DB::table('products')->where('status',1)->get();
        return view('admin.cms.add-product-image',compact('product'));
    }
    public function save_product_image(Request $request){
        $this->validate($request,[
            'product_id' => 'required',
            'image' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/productImage/', $image);
        }
        $data=array('product_id'=>$request->input('product_id'),'image'=>$image);
        DB::table('product_images')->insert($data);
        return redirect()->route('admin.list_product_image')->with('success','Inserted Successfully !!','i',1);
    }
    public function product_image_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('product_images')->where('id',$request->id)->update($data);
    }
    public function delete_product_image($id){
        DB::table('product_images')->where('id',$id)->delete();
        return redirect()->route('admin.list_product_image')->with('success','Deleted Successfully !!'); 
    }
    
    public function shiprocket()
    {
        
    }
}
