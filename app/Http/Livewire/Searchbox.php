<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Searchbox extends Component
{
    public $showdiv = false;
    public $search = "";
    public $records;
    public $empDetails;
    
   
    public function mount()
    {
        $this->records = Product::all();
    }
    // Fetch records
    public function searchResult(){

        if(!empty($this->search)){

            $this->records = Product::orderby('name','asc')
                    ->select('*')
                    ->where('name','like','%'.$this->search.'%')
                    ->limit(5)
                    ->get();

            $this->showdiv = true;
        }else{
            $this->showdiv = false;
        }
    }

    // Fetch record by ID
    public function fetchEmployeeDetail($id = 0){

        $record = Product::select('*')
                    ->where('id',$id)
                    ->first();

        $this->search = $record->name;
        $this->empDetails = $record;
        $this->showdiv = false;
    }

    public function render(){ 
        return view('livewire.searchbox');
    }
}