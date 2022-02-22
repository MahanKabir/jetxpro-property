<?php

namespace App\Http\Controllers\admin\properties;

use Illuminate\Http\Request;
use JetXPro\Property\Http\Controllers\BaseController;
use JetXPro\Property\Models\Property;
use Session;

class propertyController extends BaseController
{
    public function index(){

        Session::put('pageTitle',"Properties");
        $dataList = Property::orderBy('id','desc');
        $dataList = $dataList->paginate(30);
        $dataList = $dataList->withPath('properties');
        return view('admin.properties.list',['dataList' => $dataList]);
    }

    public function submit(Request $request){

        $request->validate([
            'title' => 'required|min:3',
            'keywords' => 'required',
            'description' => 'required|min:10',
            'content' => 'required|min:10',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'image' => 'required',
            'price' => 'required',
            'slug' => 'required|min:3',
        ]);

        if($request->mode == "new"){
            $property = new Property();
            $property->category_id = rand(1000000, 9999999);
            $property->title = $request->title;
            $property->keywords = $request->keywords;
            $property->description = $request->description;
            $property->content = $request->content;
            $property->area = $request->area;
            $property->country = $request->country;
            $property->state = $request->state;
            $property->city = $request->city;
            $property->images = $request->image;
            $property->amenity = $request->amenity;
            $property->price = $request->price;
            $property->age = $request->age;
            $property->slug = crc32(time());
            $property->save();
        }else{

            $request->validate(['id' => 'required']);
            $id = $request->id;
                Property::where('id', '=', $id)->update([
                    'title' => $request->title,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'content' => $request->content,
                    'area' => $request->area,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'images' => $request->image,
                    'amenity' => $request->amenity,
                    'price' => $request->price,
                    'age' => $request->age,
                ]);
            }

        return back();
    }

    public function edit(Request $request)
    {
        $property = Property::where('id', '=', $request->id)->limit(1)->get()[0];
        return $property;
    }
}
