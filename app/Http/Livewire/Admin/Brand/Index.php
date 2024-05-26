<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public $name,$slug,$status;
    public $isOpen = 0;

    public function render()
    {
        $data['brands'] = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brands.index',$data);
    }
}
