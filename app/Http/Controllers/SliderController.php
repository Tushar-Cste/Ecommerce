<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use Session;

class SliderController extends Controller
{
    public function index(){
    	return view('admin.addSlider');
    }

    public function storeSlider(Request $request){
    	$slider = new Slider;
    	$slider->publication_status = $request->publication_status;
    	$fullnamewithext = $request->file('slider_image')->getClientOriginalName();
    	$namewithoutext = pathinfo($fullnamewithext,PATHINFO_FILENAME);
    	$nameofExt = $request->file('slider_image')->getClientOriginalExtension();
    	$imageToStore = $namewithoutext.'_'.time().'.'.$nameofExt;
    	$slider->slider_image = $imageToStore;
    	$path = $request->file('slider_image')->storeAs('public/slider_images',$imageToStore);
    	$slider->save();
    	return redirect('/addSlider');
    }

    public function allSlider(){
    	$all_slider = Slider::all();
    	return view('admin.allSlider')->with('all_slider',$all_slider);
    }

    public function unactive_slider($slider_id){
    	$slider = Slider::find($slider_id);
    	$slider->publication_status = 0;
    	$slider->save();
    	Session::put('message','Slider is unactivated');
    	return redirect('/allSlider');
    }

    public function active_slider($slider_id){
    	$slider =  Slider::find($slider_id);
    	$slider->publication_status = 1;
    	$slider->save();
    	Session::put('message','Slider is activated');
    	return redirect('/allSlider');
    }

    public function deleteslider($slider_id){
    	$slider = Slider::find($slider_id);
    	Storage::delete('public/slider_images/'.$slider->slider_image);
    	$slider->delete();
    	return redirect('/allSlider');
    }
}
