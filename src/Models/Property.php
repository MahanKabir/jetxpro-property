<?php

namespace JetXPro\Property\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = ['category_id', 'title', 'keyword', 'description', 'content', 'area', 'country', 'state', 'city', 'images', 'amenity', 'price', 'age', 'slug', 'status'];

    //getters
    public function getCategoryId(){
        return $this->category_id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getKeyword(){
        return $this->keyword;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getContent(){
        return $this->content;
    }

    public function getArea(){
        return $this->area;
    }

    public function getCountry(){
        return $this->country;
    }

    public function getState(){
        return $this->state;
    }

    public function getCity(){
        return $this->city;
    }

    public function getImages(){
        return $this->images;
    }

    public function getAmenity(){
        return $this->amenity;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getAge(){
        return $this->age;
    }

    public function getSlug(){
        return $this->slug;
    }
}