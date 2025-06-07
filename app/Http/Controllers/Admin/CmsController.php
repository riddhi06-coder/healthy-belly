<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CmsController extends Controller
{
    public function shop_details(){
       $fetch_details= DB::table('shop_details')->where('id',1)->first();
        return view('admin.cms.shop-details',compact('fetch_details'));
    }

    public function update_shop_details(Request $request){
        $this->validate($request,[
            'shop_name'=>'required',
            'email1'=>'required',
            'email2'=>'required',
            'contact1'=>'required',
            'contact2'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'address3'=>'required',
            'companydesc'=>'required',
            'metatitle'=>'required',
            'metakeyword'=>'required',
            'metadesc'=>'required'
        ]);

        $shop_name=$request->input('shop_name');
        $email1=$request->input('email1');
        $email2=$request->input('email2');
        $contact1=$request->input('contact1');
        $contact2=$request->input('contact2');
        $address1=$request->input('address1');
        $address2=$request->input('address2');
        $address3=$request->input('address3');
        $companydesc=$request->input('companydesc');
        $metatitle=$request->input('metatitle');
        $metakeyword=$request->input('metakeyword');
        $metadesc=$request->input('metadesc');

        if($request->hasFile('shop_logo') == ''){

            $shop_logo = $request->input('old_logo');

        }else{
                $timestamp = time();
                $shop_logo = $timestamp.'-'.str_replace(' ','-',$request->shop_logo->getClientOriginalName());

                $request->shop_logo->move('public/frontend/images/logo/', $shop_logo);
        }
        DB::update('update shop_details set shop_name=?,shop_logo=?,description=?,contact1=?,contact2=?,email1=?,
        email2=?,address1=?,address2=?,address3=?,meta_title=?,meta_keyword=?,meta_description=?',[$shop_name,
        $shop_logo,$companydesc,$contact1,$contact2,$email1,$email2,$address1,$address2,$address3,$metatitle,$metakeyword,
        $metadesc
        ]);
        return redirect()->route('admin.update_shop_details')->with('success','Data Updated Successfully !!');

    }

    public function list_banner(){
        $fetch_banner_detail=DB::table('sliders')->get();
        return view('admin.cms.list-banner',compact('fetch_banner_detail'))->with('i',1);
    }

    public function add_banner(){
        return view('admin.cms.add-banner');
    }
    public function save_banner(Request $request){
        $this->validate($request,[
            'image' => 'required',
            'xs_image' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/banner/', $image);
        }
        if($request->hasFile('xs_image') == ''){
            $xsimage = 'dummy.jpg';
        }else{
            $timestamp = time();
            $xsimage = $timestamp.'-'.str_replace(' ','-',$request->xs_image->getClientOriginalName());

            $request->xs_image->move(public_path().'/frontend/images/xsbanner/', $xsimage);
        }
        $data=array('title'=>$request->input('image_title'),'image'=>$image,'xs_image'=>$xsimage);
        DB::table('sliders')->insert($data);
        return redirect()->route('admin.list_banner')->with('success','Banner Saved Successfully !!');
    }
    public function edit_banner($id){
        $banner_detail=DB::table('sliders')->where('id',$id)->first();
        return view('admin.cms.edit-banner',compact('banner_detail'));
    }
    public function update_banner(Request $request){

        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/banner/', $image);
        }
        if($request->hasFile('xs_image') == ''){
            $xs_image = $request->input('old_xsimage');
        }else{
            $timestamp = time();
            $xs_image = $timestamp.'-'.str_replace(' ','-',$request->xs_image->getClientOriginalName());

            $request->xs_image->move(public_path().'/frontend/images/xsbanner/', $xs_image);
        }
        $data=array('title'=>$request->input('image_title'),'image'=>$image,'xs_image'=>$xs_image);
        DB::table('sliders')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_banner')->with('success','Banner Updated Successfully !!');
    }

    public function delete_banner($id){
        DB::table('sliders')->where('id',$id)->delete();
        return redirect()->route('admin.list_banner')->with('success','Banner Deleted Successfully !!');
    }
    public function banner_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('sliders')->where('id',$request->id)->update($data);
    }

    public function list_socialmedia(){
        $social_media=DB::table('social_media')->orderby('name','asc')->get();
        return view('admin.cms.list-socialmedia',compact('social_media'))->with('i',1);
    }
    public function edit_socialmedia($id){
        $social_media=DB::table('social_media')->where('id',$id)->first();
        return view('admin.cms.edit-socialmedia',compact('social_media'));
    }
    public function update_socialmedia(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'url'=>'required',
            'logo'=>'required',
        ]);
        $values=array('name'=>$request->input('name'),'url'=>$request->input('url'),'logo'=>$request->input('logo'));
        DB::table('social_media')->where('id',$request->input('id'))->update($values);
        $request->Session()->flash('success','Data Updated Successfully !!');
        return redirect()->route('admin.list_socialmedia');

    }
    public function socialmedia_status(Request $request){
        $data=array('status'=>$request->status);
        $social_name=DB::table('social_media')->where('id',$request->social_id)->first();
        DB::table('social_media')->where('id',$request->social_id)->update($data);
        return response()->json(['success'=> $social_name->name.' Status Changed !']);
    }

    // moved content to productController

    public function list_advertisement(){
        $ad_detail=DB::table('advertisements')->paginate(15);
        return view('admin.cms.list-advertisement',compact('ad_detail'))->with('i',1);
    }
    public function add_advertisement(){
        return view('admin.cms.add-advertise');
    }
    public function save_advertisement(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'link' => 'required',
            'image' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = 'dummy.jpg';
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/advertisement/', $image);
        }
        $data=array('title'=>$request->input('title'),'link'=>$request->input('link'),
        'image'=>$image,'section'=>'Main');
        DB::table('advertisements')->insert($data);
        return redirect()->route('admin.list_advertisement')->with('success','Saved Successfully !!');
    }
    public function edit_advertisement($id){
        $ads_detail=DB::table('advertisements')->where('id',$id)->first();
        return view('admin.cms.edit-advertise',compact('ads_detail'));
    }
    public function update_advertisement(Request $request){
        
        $this->validate($request,[
            'title' => 'required',
            'link' => 'required',
        ]);
        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/advertisement/', $image);
        }
        $data=array('title'=>$request->input('title'),'link'=>$request->input('link'),
        'image'=>$image);
        DB::table('advertisements')->where('id',$request->input('id'))->update($data);
        return redirect()->route('admin.list_advertisement')->with('success','Update Successfully !!');
    }
    public function advertisement_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('advertisements')->where('id',$request->id)->update($data);
    }
    public function delete_advertisement($id){
        DB::table('advertisements')->where('id',$id)->delete();
        return redirect()->route('admin.list_advertisement')->with('success','Deleted Successfully !!');
    }

    public function list_testimonial(){
        $testimonial_detail=DB::table('testimonials')->paginate(15);
        return view('admin.cms.list-testimonial',compact('testimonial_detail'))->with('i',1);
    }
    public function add_testimonial(){
        return view('admin.cms.add-testimonial');
    }
    public function save_testimonial(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'designation' => 'required',
            'description' => 'required',
        ]);
        
        $data=array('name'=>$request->input('name'),'designation'=>$request->input('designation'),'description'=>$request->input('description'));
        DB::table('testimonials')->insert($data);
        return redirect()->route('admin.list_testimonial')->with('success','Saved Successfully !!');
    }
    public function delete_testimonial($id){
        DB::table('testimonials')->where('id',$id)->delete();
        return redirect()->route('admin.list_testimonial')->with('success','Deleted Successfully !!');
    }

    public function about_us(){
        $about_detail=DB::table('abouts')->where('id',1)->first();
        return view('admin.cms.about-us',compact('about_detail'));
    }
    public function update_about_us(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'about_us' => 'required',
        ]); 
        if($request->hasFile('image') == ''){
            $image = $request->input('old_image');
        }else{
            $timestamp = time();
            $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());

            $request->image->move(public_path().'/frontend/images/aboutus/', $image);
        }
        $data=array('title'=>$request->input('title'),'about_us'=>$request->input('about_us'),'image'=>$image,'our_approch'=>$request->input('our_approch'),
        'our_mission'=>$request->input('our_mission'),'our_chef'=>$request->input('our_chef'));
        DB::table('abouts')->where('id',1)->update($data);
        return redirect()->route('admin.about_us');
    }

    // content moved to productController

    public function list_best_chef(){
        $chef_detail=DB::table('our_chefs')->paginate(15);
        return view('admin.cms.list-chef',compact('chef_detail'))->with('i',1);
    }
    public function add_best_chef(){
        return view('admin.cms.add_chef');
    }
    public function save_best_chef(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'profession' => 'required',
            'image' => 'required',
        ]);
        $timestamp = time();
        $image = $timestamp.'-'.str_replace(' ','-',$request->image->getClientOriginalName());
        $request->image->move(public_path().'/frontend/images/chef/', $image);
        $data=array('name'=>$request->input('name'),'profession'=>$request->input('profession'),'image'=>$image);
        DB::table('our_chefs')->insert($data);
        return redirect()->route('admin.list_best_chef')->with('success','Saved Successfully !!');
    }
    public function chef_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('our_chefs')->where('id',$request->id)->update($data);
        return true;
    }
    public function delete_chef($id){
        DB::table('our_chefs')->where('id',$id)->delete();
        return redirect()->route('admin.list_best_chef')->with('success','Deleted Successfully !!'); 
    }
    public function all_review(){
        $all_review=DB::table('reviews')->paginate(10);
        return view('admin.cms.list-review',compact('all_review'))->with('i',1);
    }
    public function delete_review($id){
        DB::table('reviews')->where('id',$id)->delete();
        return redirect()->route('admin.all_review')->with('success','Deleted Successfully !!');
    }
    public function review_status(Request $request){
        $data=array('status'=>$request->status);
        DB::table('reviews')->where('id',$request->id)->update($data);
        return true;
    }

    public function user_enquiry(){
        $all_enquiry=DB::table('enquiry_submission')->paginate(20);
        return view('admin.cms.list-user-enquiry',compact('all_enquiry'))->with('i',1);
    }

    public function list_all_order(){
        $parent_order_detail=DB::table('parent_order_table')->orderBy('id','desc')->get();
        return view('admin.cms.list-all-order',compact('parent_order_detail'))->with('i',1);
    }
    public function update_order_status(Request $request){
        $data=array('order_status'=>$request->input('order_status'));
        DB::table('parent_order_table')->where('id',$request->input('order_id'))->update($data);
        return redirect()->route('admin.list_all_order')->with('success','Order Status Updated!!');
    }
    public function order_description($id){
      $parent_cat=DB::table('parent_order_table')->where('invoice_no',$id)->first();
      return view('admin.cms.order-description',compact('parent_cat'))->with('i',1);
    }

}
