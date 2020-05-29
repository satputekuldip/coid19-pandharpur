<?php

namespace App\DataTables;

use App\Models\QuarantinePatient;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class QuarantinePatientDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'quarantine_patients.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\QuarantinePatient $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(QuarantinePatient $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'patient_id',
            ['name'=>'quarantine_address.address','data'=>'quarantine_address.address','title'=>'Address'],
            'covid_status',
            'present_at_quarantine',
            'remark',
            'quarantined_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'quarantine_patientsdatatable_' . time();
    }
}
