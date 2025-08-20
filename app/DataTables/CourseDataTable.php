<?php

namespace App\DataTables;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CourseDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', 'course.action')
            ->setRowId('id');
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */


    protected $course_id;

    public function with(array|string $key, mixed $value = null): static
    {
        if (is_array($key) && isset($key['course_id'])) {
            $this->course_id = $key['course_id'];
        } elseif (is_string($key) && $key === 'course_id') {
            $this->course_id = $value;
        }

        return $this;
    }


    public function query(User $model): QueryBuilder
    {
        $course = \App\Models\Course::find($this->course_id);

        if ($course) {
            return $course->students()->getQuery();
        }

        return $model->newQuery()->whereRaw('0=1');
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('course-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'searching' => false,
                'lengthChange' => false,
                'pageLength' => 10,
                'info' => false,
            ])
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                // Button::make('reset'),
                // Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
           
            Column::make('id'),
            Column::make('firstName'),
            Column::make('lastName'),
            Column::make('email'),

            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Course_' . date('YmdHis');
    }
}
