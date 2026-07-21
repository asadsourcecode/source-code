<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price'             => 'decimal:2',
        'sale_price'        => 'decimal:2',
        'ebook_price'       => 'decimal:2',
        'hardcopy_price'    => 'decimal:2',
        'pages'             => 'integer',
        'cost_per_item'     => 'decimal:2',
        'weight'            => 'decimal:2',
        'charge_taxes'      => 'boolean',
        'track_quantity'    => 'boolean',
        'allow_oversell'    => 'boolean',
        'requires_shipping' => 'boolean',
        'status'            => 'boolean',
        'tags'              => 'array',
        'images'            => 'array',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(ProductSection::class, 'section_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function pdfPages(): HasMany
    {
        return $this->hasMany(ProductPage::class)->orderBy('page_number');
    }

    public function exerciseFields(): HasMany
    {
        return $this->hasMany(ExerciseField::class)->orderBy('page_number')->orderBy('order');
    }

    /**
     * How many pages of this book the given student is currently allowed to read.
     * No assigned teacher, or a teacher who hasn't touched this book yet, means no gating.
     */
    public function allowedPagesFor(User $student): int
    {
        $total = (int) ($this->pdf_page_count ?: 0);

        if (! $student->teacher_id) {
            return $total;
        }

        $progress = TeacherBookProgress::where('teacher_id', $student->teacher_id)
            ->where('product_id', $this->id)
            ->first();

        if (! $progress) {
            return $total;
        }

        $override = StudentBookOverride::where('student_id', $student->id)
            ->where('product_id', $this->id)
            ->value('unlocked_page') ?? 0;

        return min($total, max($progress->unlocked_page, $override));
    }

    /**
     * Whether the given user is allowed to view this specific page's image right now.
     * Students: must own the book (paid order) and the page must be within their unlocked range.
     * Teachers: must have at least one assigned student who owns the book — teachers see every
     * page regardless of the class-wide unlock limit, since they're the ones setting it.
     */
    public function canViewPage(User $user, int $pageNumber): bool
    {
        if ($user->role === 'teacher') {
            $studentIds = User::where('teacher_id', $user->id)->where('role', 'student')->pluck('id');

            return OrderItem::where('product_id', $this->id)
                ->whereHas('order', fn ($query) => $query->whereIn('user_id', $studentIds)->where('status', 'paid'))
                ->exists();
        }

        $owns = $user->orders()
            ->where('status', 'paid')
            ->whereHas('items', fn ($query) => $query->where('product_id', $this->id))
            ->exists();

        if (! $owns) {
            return false;
        }

        return $pageNumber <= $this->allowedPagesFor($user);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }

    public function imageUrl(?string $fallback = null): string
    {
        $images = $this->images ?? [];
        $first  = $images[0] ?? null;

        if ($first) {
            return str_starts_with($first, 'http')
                ? $first
                : asset('admin-storage/' . $first);
        }

        if ($this->featured_image) {
            return asset('admin-storage/' . $this->featured_image);
        }

        return $fallback ?? asset('images/placeholder.jpg');
    }
}
