<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function inventory()
    {
        $inventory = Inventory::where('user_id', 1)->get();
        foreach ($inventory as $record) {
            $record->name = $record->item->name;
            $record->stackable = $record->item->stackable;
            unset($record->item);
        }
        return response()->json([
            'info' => 'Апи для инициализации инвентаря',
            'data' => $inventory
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function takeItem($itemId, $slotIndex, $quantity)
    {
        $recordId = Inventory::insertGetId([
            'user_id' => 1,
            'item_id' => $itemId,
            'quantity' => 1,
            'slot_index' => $slotIndex,
        ]);
        return response()->json([
            'info' => 'Апи для подбора предметов',
            'record_id' => $recordId,
            'slot_index' => $slotIndex
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function dropItem($inventoryRecordId, $quantity)
    {
        Inventory::find($inventoryRecordId)->delete();
        return response()->json([
            'info' => 'Предмет удалён из инвентаря',
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function mapStart()
    {
        // API для запроса на кластер и поднятие контейнера, получение IP и порта для подключения

    }
}
