<?php

namespace App\DataTables;

use App\Models\Complain;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ComplainDataTable extends DataTable
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
            ->editColumn('created_at',function($row){
                return $row->created_at->diffForHumans();
            })
            ->editColumn('id',function($row){

                return view('backend.includes.checkbox',['row'=>$row->id])->render();
            })
            ->editColumn('updated_at',function($row){
                return $row->updated_at->diffForHumans();
            })
            ->editColumn('seen',function($row){
                return $row->status();
            })
            ->editColumn('user_id',function($row){
                return $row->user->name;
            })
            ->setRowId(function ($row) {

                return 'color_'.$row->id;
            })

            // ->editColumn('action', function($row){
            //   return view('backend.includes.action',['row'=>$row])->render();

            // })

            ->rawColumns(['created_at','updated_at','id','seen']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Complain $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Complain $model): QueryBuilder
    {
        return $model->orderBy('id','desc')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('complain-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->setTableAttribute('class','example_complain table-hover table-responsive-md data-table table table-bordered data-table')
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id')->title('<input class="form-check-input" type="checkbox" value="" id="select_all" onClick="toggle(this)">')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center'),
            Column::make('body')->addClass('text-center')->title('نص الشكوى'),
            Column::make('seen')->addClass('text-center')->title('الحالة'),
            Column::make('user_id')->addClass('text-center')->title('صاحب الشكوى'),
            Column::make('created_at')->addClass('text-center')->title('تاريخ الانشاء'),
            Column::make('updated_at')->addClass('text-center')->title('تاريخ التعديل'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center')->title('العملية'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Complain_' . date('YmdHis');
    }
}
