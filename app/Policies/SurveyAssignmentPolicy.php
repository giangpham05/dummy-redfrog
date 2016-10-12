<?php

namespace App\Policies;

use App\User;
use App\SurveyAssignment;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyAssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the surveyAssignment.
     *
     * @param  App\User  $user
     * @param  App\SurveyAssignment  $surveyAssignment
     * @return mixed
     */
    public function view(User $user, SurveyAssignment $surveyAssignment)
    {
        //
    }

    /**
     * Determine whether the user can create surveyAssignments.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the surveyAssignment.
     *
     * @param  App\User  $user
     * @param  App\SurveyAssignment  $surveyAssignment
     * @return mixed
     */
    public function update(User $user, SurveyAssignment $surveyAssignment)
    {
        //
    }

    /**
     * Determine whether the user can delete the surveyAssignment.
     *
     * @param  App\User  $user
     * @param  App\SurveyAssignment  $surveyAssignment
     * @return mixed
     */
    public function delete(User $user, SurveyAssignment $surveyAssignment)
    {
        //
    }
}
