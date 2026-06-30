<?php

namespace App\DataTables;

use App\Models\AgentEquipmentRentBooking;
use App\Models\RentEquipmentBooking;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AgentEquipmentRentBookingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<AgentEquipmentRentBooking> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', function ($query) {
            //      $delete = '<a href="' . route('admin.rent-equipment.destroy', $query->id) . '" class="delete-item btn btn-sm btn-danger ml-2"><i class="fas fa-trash"></i></a>';

            //     return  $delete;
            // })
            // ->rawColumns(['action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<AgentEquipmentRentBooking>
     */
    public function query(RentEquipmentBooking $model): QueryBuilder
    {
        // return $model->newQuery();
        return $model->newQuery()
            ->whereHas('equipment', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->with(['equipment.user']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('agentequipmentrentbooking-table')
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
            Column::make('customer_name'),
            Column::make('location'),
            Column::make('customer_email'),
            Column::make('customer_phone'),
            Column::make('customer_message'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AgentEquipmentRentBooking_' . date('YmdHis');
    }
}