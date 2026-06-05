<?php

namespace App\Livewire\Items;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class EditItem extends Component
{
    public Item $item;

    public $users = [];

    public $item_name;
    public $category;
    public $brand;
    public $model;
    public $serial_number;
    public $date_purchased;
    public $status;
    public $assigned_to;
    public $date_assigned;
    public $remarks;

    public function mount(Item $item)
    {
        $this->item = $item;

        $this->item_name = $item->item_name;
        $this->category = $item->category;
        $this->brand = $item->brand;
        $this->model = $item->model;
        $this->serial_number = $item->serial_number;
       $this->date_purchased = $item->date_purchased
    ? date('Y-m-d', strtotime($item->date_purchased))
    : null;
        $this->status = $item->status;
        $this->assigned_to = $item->assigned_to;
        $this->date_assigned = optional($item->date_assigned)->format('Y-m-d');
        $this->remarks = $item->remarks;

        $this->users = User::where('status', 'Active')
            ->orderBy('name')
            ->get();
    }

    public function updateItem()
    {
        $this->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255|unique:items,serial_number,' . $this->item->id,
            'date_purchased' => 'nullable|date',
            'status' => 'required|string|max:255',
            'assigned_to' => 'nullable|string|max:255',
            'date_assigned' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $this->item->update([
            'item_name' => $this->item_name,
            'category' => $this->category,
            'brand' => $this->brand,
            'model' => $this->model,
            'serial_number' => $this->serial_number,
            'date_purchased' => $this->date_purchased,
            'status' => $this->status,
            'assigned_to' => $this->assigned_to,
            'date_assigned' => $this->date_assigned,
            'remarks' => $this->remarks,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Asset updated successfully.');
    }

    public function render()
    {
        return view('livewire.items.edit-item');
    }
}