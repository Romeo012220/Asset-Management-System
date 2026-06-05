<?php

namespace App\Livewire\Items;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Item;

class ItemList extends Component
{
    use WithPagination;

    public $selectedItem;
    public $assigned_to;
    public $date_assigned;

    public $search = '';
    public $category = '';
    public $status = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategory()
    {
        $this->resetPage();
    }

    public function updatedStatus()
    {
        $this->resetPage();
    }

    public function openAsset($itemId)
    {
        $this->selectedItem = Item::findOrFail($itemId);

        $this->assigned_to = $this->selectedItem->assigned_to;
        $this->date_assigned = $this->selectedItem->date_assigned;
    }

    public function render()
    {
        $items = Item::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('asset_tag', 'like', '%' . $this->search . '%')
                      ->orWhere('item_name', 'like', '%' . $this->search . '%')
                      ->orWhere('brand', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(5);

        return view('livewire.items.item-list', [
            'items' => $items,

            'categories' => Item::whereNotNull('category')
                ->distinct()
                ->orderBy('category')
                ->pluck('category'),

            'statuses' => Item::whereNotNull('status')
                ->distinct()
                ->orderBy('status')
                ->pluck('status'),

            'totalAssets' => Item::count(),
            'assignedAssets' => Item::where('status', 'Assigned')->count(),
            'availableAssets' => Item::where('status', 'Available')->count(),
            'maintenanceAssets' => Item::where('status', 'Maintenance')->count(),
        ]);
    }
}