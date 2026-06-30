<?php

namespace App\DataTables;

use App\Models\AgentRentEquipment;
use App\Models\RentEquipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AgentRentEquipmentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<AgentRentEquipment> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('user.rent-equipment.edit', $query->id) . '" class="btn btn-sm btn-primary ml-2 "><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('user.rent-equipment.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger ml-2 "><i class="fas fa-trash"></i></a>';



                return $edit . $delete;
            })

            ->addColumn('location', function ($query) {
                return $query->location->name;
            })
            ->addColumn('image', function ($query) {
                return '<img width="60" src="' . asset($query->image) . '" >';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    $status = "<span class='badge bg-success me-1'>Active</span>";
                } else {
                    $status = "";
                }

                if ($query->is_featured === 1) {
                    $featured = "<span class='badge bg-primary me-1'>Featured</span>";
                } else {
                    $featured = "";
                }

                if ($query->is_verified === 1) {
                    $verified = "<span class='badge bg-info me-1'>Verified</span>";
                } else {
                    $verified = "";
                }
                if ($query->is_approved === 0) {
                    $approved = "<span class='badge bg-warning me-1'>Pending</span>";
                } else {
                    $approved = "";
                }
                return $approved . $status . $featured . $verified;
            })


            ->rawColumns(['status', 'action', 'is_featured', 'is_verified', 'is_approved', 'image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<AgentRentEquipment>
     */
    public function query(RentEquipment $model): QueryBuilder
    {
        return $model->where('user_id', Auth::user()->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('agentrentequipment-table')
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
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AgentRentEquipment_' . date('YmdHis');
    }
}