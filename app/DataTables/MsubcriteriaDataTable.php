<?php

namespace App\DataTables;

use App\Models\Msubcriteria;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MsubcriteriaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public $format_date = 'd-m-Y H:i:s';
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('criteria_id', function ($data) {
                return $data->criteria->name;
            })
            ->editColumn('created_at', function ($row) {
                return date_format($row->created_at, $this->format_date);
            })
            ->editColumn('updated_at', function ($row) {
                return date_format($row->updated_at, $this->format_date);
            })
            ->addColumn('action', function ($row) {
                return view("modules.master.subcriterias.action", ['data' => $row->id]);
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Msubcriterion $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Msubcriteria $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'asc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('msubcriteria-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                'responsive' => true,
                'autoWidth' => false
            ])
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::make('code')->title('Kode Sub-Kriteria'),
            Column::make('name')->title('Nama Sub-Kriteria'),
            Column::make('value')->title('Nilai Sub-Kriteria'),
            Column::make('criteria_id')->title('Kriteria'),
            Column::make('created_at')->title('Tanggal Dibuat'),
            Column::make('updated_at')->title('Tanggal Diubah'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return auth()->user()->name . '_subcriteria_' . date('YmdHis');
    }
}