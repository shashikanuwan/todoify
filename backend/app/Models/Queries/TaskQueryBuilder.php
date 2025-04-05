<?php

namespace App\Models\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method whereUserId(int $id)
 * @method incomplete()
 */
class TaskQueryBuilder extends Builder
{
    public function whereUser(User $user): self
    {
        return $this->whereUserId($user->id);
    }
}
