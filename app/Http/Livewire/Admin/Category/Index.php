<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        // $categories = DB::table('category_tbl')->orderBy('id','DESC')->paginate(1);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }

   

}
