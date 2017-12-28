<?php

namespace GetShitDone\Rules;

use GetShitDone\Objective;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PriorityLimitRule implements Rule
{
    /** @var Objective */
    protected $objective;

    /**
     * Create a new rule instance.
     *
     * @param Objective $objective
     */
    public function __construct(Objective $objective)
    {
        $this->objective = $objective;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        DB::beginTransaction();

        $objective = $this->objective->fresh();

        $objective->update([$attribute => $value]);

        $count = Objective::whereUserId($objective->user->id)
            ->wherePriority(1)
            ->whereDueAt($attribute == 'due_at' ? $value : $objective->due_at)
            ->count();

        DB::rollBack();

        return $count < 5;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You scheduled too many Priority A\'s for this day.';
    }
}
