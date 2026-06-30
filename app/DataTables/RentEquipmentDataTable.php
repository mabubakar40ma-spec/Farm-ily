<?php

namespace App\DataTables;

use App\Models\RentEquipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RentEquipmentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<RentEquipment> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.rent-equipment.edit', $query->id) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('admin.rent-equipment.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger ml-2"><i class="fas fa-trash"></i></a>';

                return $edit . $delete;
            })

            ->addColumn('location', function ($query) {
                return $query->location->name;
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return "<span class='badge badge-primary'>Active</span>";
                } else {
                    return "<span class='badge badge-danger'>Inactive</span>";
                }
            })

            ->addColumn('is_available', function ($query) {
                if ($query->is_available === 1) {
                    return "<span class='badge badge-primary'>Yes</span>";
                } else {
                    return "<span class='badge badge-danger'>No</span>";
                }
            })
            ->addColumn('is_featured', function ($query) {
                if ($query->is_featured === 1) {
                    return "<span class='badge badge-primary'>Yes</span>";
                } else {
                    return "<span class='badge badge-danger'>No</span>";
                }
            })
            ->addColumn('is_verified', function ($query) {
                if ($query->is_verified === 1) {
                    return "<span class='badge badge-primary'>Yes</span>";
                } else {
                    return "<span class='badge badge-danger'>No</span>";
                }
            })
            ->addColumn('image', function ($query) {
                return '<img width="60" src="' . asset($query->image) . '" >';
            })
            ->addColumn('by', function ($query) {
                return $query->user?->name;
            })
            ->rawColumns(['status', 'action', 'is_featured', 'is_verified', 'image', 'is_available'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<RentEquipment>
     */
    public function query(RentEquipment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('rentequipment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
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
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('image'),
            Column::make('title'),
            Column::make('location'),
            Column::make('status'),
            Column::make('is_available'),
            Column::make('is_featured')->width(80),
            Column::make('is_verified')->width(80),
            Column::make('by'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RentEquipment_' . date('YmdHis');
    }
}