<?php

namespace App\Policies;

use App\Models\User;
use App\Models\course_prerequisites;
use Illuminate\Auth\Access\Response;

class CoursePrerequisitesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, course_prerequisites $coursePrerequisites): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, course_prerequisites $coursePrerequisites): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, course_prerequisites $coursePrerequisites): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, course_prerequisites $coursePrerequisites): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, course_prerequisites $coursePrerequisites): bool
    {
        //
    }
}
