<?php

namespace App\Livewire\Admin;

use App\Models\Review;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class ReviewManager extends Component
{
    use WithPagination;

    public $statusFilter = 'all';

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function toggleApproval($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = !$review->is_approved;
        $review->save();

        $this->dispatch('notify', ['message' => 'Review status updated successfully.']);
    }

    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();
        $this->dispatch('notify', ['message' => 'Review deleted successfully.']);
    }

    public function render()
    {
        $query = Review::with('product')->latest();

        if ($this->statusFilter === 'pending') {
            $query->where('is_approved', false);
        } elseif ($this->statusFilter === 'approved') {
            $query->where('is_approved', true);
        }

        return view('livewire.admin.review-manager', [
            'reviews' => $query->paginate(10)
        ]);
    }
}
