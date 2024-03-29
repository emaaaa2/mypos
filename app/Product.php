<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model
{
    use Translatable;
    
    public $translatedAttributes = ['name','description'];
    public $guarded =[];
    protected $appends = ['image_path', 'profit_percent'];


    public function category()
    {
        return $this->belongsTo(Category::class);

    }//end fo category

    public function getImagePathAttribute()
    {

       return asset('uploads/product_images/' . $this->image) ;

    }//end of image path


    public function getProfitPercentAttribute()
    {
        $profit = $this->sale_price - $this->purchase_price;
        $profit_percent = $profit * 100 / $this->purchase_price;
        return number_format($profit_percent, 2);

    }//end of get profit attribute


}//end of class
