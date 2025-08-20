<?php

namespace App\DataTables;

use App\Models\Review;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReviewsDataTable extends DataTable
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
            ->setRowId('id')
            ->addColumn('student_name', function ($review) {

                return $review->student->firstName . ' ' . $review->student->lastName;
            });
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


    public function query(Review $model): QueryBuilder
    {
        $query = $model->newQuery()->with('student');

        if ($this->course_id) {
            $query->where('course_id', $this->course_id);
        }

        return $query;
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
            Column::computed('student_name')->title('Student Name'),
            Column::make('rating'),
            Column::make('comment'),
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
