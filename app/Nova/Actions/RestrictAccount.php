<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class RestrictAccount extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Restrict Account';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->update([
                'status' => $fields->status,
                'restriction_reason' => $fields->reason,
            ]);
        }

        return Action::message('Account(s) updated successfully.');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Select::make('Status')->options([
                'flagged' => 'Flag for Review',
                'restricted' => 'Restrict Account',
                'suspended' => 'Suspend Access',
            ])->rules('required'),

            Text::make('Reason', 'reason')
                ->help('Provide a reason for the restriction (e.g. Policy Violation).')
                ->rules('required'),
        ];
    }
}
