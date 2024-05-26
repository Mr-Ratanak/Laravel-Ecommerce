<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public $products,$category,$brandInputs = [];
    protected $queryString = ['brandInputs'];

    public function mount($products,$category){
        $this->products = $products;
        $this->category = $category;
    }

    public function render(){
        $this->products = Products::where('category_tbl_id',$this->category->id)
        ->where($this->brandInputs, function($q){
            $q->whereIn('brand',$this->brandInputs);
        })
        ->where('status','0')->get();

        return view('livewire.frontend.product.index',[
            'products'=>$this->products,
            'category'=>$this->category,
        ]);
    }
}
