<?php

namespace App\Livewire\Admin;

use App\Models\MediaItem;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MediaLibrary extends Component
{
    use WithPagination, WithFileUploads;

    public string $search = '';
    public string $typeFilter = ''; // '' | 'image' | 'video'
    public array $uploadFiles = [];

    protected $queryString = [
        'search'     => ['except' => ''],
        'typeFilter' => ['except' => ''],
    ];

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedTypeFilter(): void
    {
        $this->resetPage();
    }

    public function updatedUploadFiles(): void
    {
        $this->upload();
    }

    public function upload(): void
    {
        try {
            $this->validate([
                'uploadFiles'   => 'required|array|min:1',
                'uploadFiles.*' => 'file|max:51200', // Relaxed validation
            ]);

            $imageService = new ImageService();

            foreach ($this->uploadFiles as $file) {
                $mime    = $file->getMimeType() ?? 'application/octet-stream';
                $isImage = str_starts_with($mime, 'image/');
                $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                if ($isImage) {
                    $path = $imageService->storeAsWebP($file, 'media');
                    $type = 'image';
                    $savedMime = \Illuminate\Support\Facades\Storage::disk('public')->mimeType($path) ?: $mime;
                } else {
                    $path = $file->store('media/videos', 'public');
                    $type = 'video';
                    $savedMime = $mime;
                }

                MediaItem::create([
                    'name'      => $baseName,
                    'path'      => $path,
                    'type'      => $type,
                    'mime_type' => $savedMime,
                    'size'      => \Illuminate\Support\Facades\Storage::disk('public')->size($path),
                ]);
            }

            $this->reset('uploadFiles');
            $this->resetPage();
            session()->flash('success', 'Files uploaded to the media library!');
            
        } catch (\Throwable $e) {
            session()->flash('error', 'Upload Error: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
        }
    }

    public function delete(int $id): void
    {
        $item = MediaItem::findOrFail($id);
        Storage::disk('public')->delete($item->path);
        $item->delete();
        session()->flash('success', 'File removed from library.');
    }

    public function render()
    {
        $items = MediaItem::query()
            ->when($this->search, fn ($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->typeFilter, fn ($q) => $q->where('type', $this->typeFilter))
            ->latest()
            ->paginate(24);

        return view('livewire.admin.media-library', ['items' => $items])
            ->layout('components.layouts.admin', ['header' => 'Media Library']);
    }
}
