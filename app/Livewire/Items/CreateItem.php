<?php

namespace App\Livewire\Items;

use Livewire\Component;
use App\Models\Item;

class CreateItem extends Component
{

    public $item_name;
    public $category;
    public $brand;
    public $model;
    public $serial_number;
    public $status = 'Available';
    public $remarks;
    public $date_purchased;

    protected $rules = [
    
        'item_name' => 'required',
        'category' => 'required',
        'brand' => 'nullable',
        'model' => 'nullable',
        'serial_number' => 'nullable|unique:items,serial_number',
        'remarks' => 'nullable',
        'date_purchased' => 'nullable|date',
        
    ];

    public function save()
{
    $this->validate();

    $year = now()->year;

    $lastAsset = Item::where('asset_tag', 'like', "AST-{$year}-%")
        ->latest('id')
        ->first();

    if ($lastAsset) {

        $parts = explode('-', $lastAsset->asset_tag);

        $lastNumber = (int) end($parts);

        $nextNumber = $lastNumber + 1;

    } else {

        $nextNumber = 1;

    }

    $assetTag = 'AST-' . $year . '-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    Item::create([
        'asset_tag'     => $assetTag,
        'item_name'     => $this->item_name,
        'category'      => $this->category,
        'brand'         => $this->brand,
        'model'         => $this->model,
        'serial_number' => $this->serial_number,
        'status'        => 'Available',
        'remarks'       => $this->remarks,
        'date_purchased' => $this->date_purchased,
        
    ]);

    session()->flash(
        'success',
        "Asset {$assetTag} has been successfully created."
    );

    return redirect()->route('items.index');
}

    public function render()
    {
        return view('livewire.items.create-item');
    }
}