<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Http\Requests\NovaRequest;

class Creator extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Creator>
     */
    public static $model = \App\Models\Creator::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'niche', 'status'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User'),
            Date::make('Date of Birth', 'dob'),
            Text::make('Niche')->sortable(),
            Text::make('Sub Niche')->sortable(),
            Select::make('Status')->options([
                'active' => 'Active',
                'flagged' => 'Flagged for Review',
                'restricted' => 'Restricted',
                'suspended' => 'Suspended',
            ])->displayUsingLabels(),
            Text::make('Restriction Reason')->hideFromIndex(),
            KeyValue::make('Social Media Links')->rules('json'),
        ];
    }

    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [
            new Actions\RestrictAccount,
        ];
    }
}
