<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\TaskFactory;
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
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
