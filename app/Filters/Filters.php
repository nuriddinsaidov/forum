<?php

namespace App\Filters;

//use http\Env\Request;
use Illuminate\Http\Request;


abstract class Filters
{

    /**
     * @var Request
     */
    protected $request, $builder;


    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Create a new ThreadFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply($builder)
    {

        $this->builder = $builder;

        $this->getFilters()

            ->filter(function ($filter) {
                return method_exists($this, $filter);

            })

            ->each(function ($filter, $value ) {
                $this->$filter($value);

            });

        return $this->builder;

    }

    /**
     * @return bool
     */
    public function getFilters()
    {
        return collect($this->request->only($this->filters))->flip();
    }
}