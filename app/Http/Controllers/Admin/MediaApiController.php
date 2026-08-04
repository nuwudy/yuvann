<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class MediaApiController extends Controller
{
    /**
     * Return paginated media items as JSON for the client-side media picker.
     * This endpoint is called via fetch() from Alpine.js — no Livewire involved.
     */
    public function index(Request $request)
    {
        $items = MediaItem::query()
            ->when($request->filled('type'), fn ($q) => $q->where('type', $request->type))
            ->when($request->filled('search'), fn ($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->limit(120)
            ->get()
            ->map(fn ($item) => [
                'id'             => $item->id,
                'name'           => $item->name,
                'type'           => $item->type,
                'url'            => $item->url,
                'path'           => $item->path,
                'formatted_size' => $item->formatted_size,
            ]);

        return response()->json($items);
    }
}
