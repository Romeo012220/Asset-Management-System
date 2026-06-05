<?php
namespace App\Livewire\Items;

use Livewire\Component;
use App\Models\Item;

class ItemList extends Component
{
    public $selectedItem;
    public $assigned_to;
    public $date_assigned;

    public function openAsset($itemId)
    {
        $this->selectedItem = Item::findOrFail($itemId);

        $this->assigned_to = $this->selectedItem->assigned_to;
        $this->date_assigned = $this->selectedItem->date_assigned;
    }

    public function render()
    {
        return view('livewire.items.item-list', [
            'items' => Item::latest()->get(),
            'totalAssets' => Item::count(),
            'assignedAssets' => Item::where('status', 'Assigned')->count(),
            'availableAssets' => Item::where('status', 'Available')->count(),
            'maintenanceAssets' => Item::where('status', 'Maintenance')->count(),
        ]);
    }
}