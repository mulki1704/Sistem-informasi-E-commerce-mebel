<?php
namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama',
            ],
        ];
    }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return '/images/no-image.png';
        }

        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        if (str_starts_with($this->image, 'storage/')) {
            return '/' . $this->image;
        }

        if (str_starts_with($this->image, '/')) {
            return $this->image;
        }

        $normalizedPath = ltrim($this->image, '/');

        if (Storage::disk('public')->exists($normalizedPath)) {
            return '/storage/' . $normalizedPath;
        }

        if (file_exists(public_path($normalizedPath))) {
            return '/' . $normalizedPath;
        }

        if (file_exists(public_path('storage/' . $normalizedPath))) {
            return '/storage/' . $normalizedPath;
        }

        return '/storage/' . $normalizedPath;
    }
}
