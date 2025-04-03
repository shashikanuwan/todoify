<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon $due_date
 * @property Carbon $completed_at
 * @property int $user_id
 */
class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime:Y-m-d',
            'due_date' => 'datetime:Y-m-d',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // bool
    public function isCompleted(): bool
    {
        return $this->completed_at !== null;
    }

    // scopes
    #[Scope]
    public function incomplete(Builder $query): Builder
    {
        return $query->whereNull('completed_at');
    }

    #[Scope]
    public function forUser(Builder $query, int $userId): Builder
    {
        return $query->whereUserId($userId);
    }

    #[Scope]
    public function latestPending(Builder $query): Builder
    {
        return $query->orderBy('due_date')
            ->incomplete()
            ->limit(5);
    }

    // accessors and mutators
    protected function dueDate(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? Carbon::parse($value)
                ->format('d M y, h:i A') : null,
        );
    }
}
