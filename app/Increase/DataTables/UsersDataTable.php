<?php

namespace App\Increase\DataTables;

use App\Increase\Models\Users;
use Yajra\Datatables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('photo','<img src="{!! GLobalHelper::checkImage($photo) !!}" style="max-height:100px" class="thumbnail"> ')
            ->editColumn('active', function ($row) {
                return $row->status=="1"?'Aktif':'Tidak Aktif';
            })
            ->editColumn('role_id', function ($row) {
                return $row->role->name;
            })
            ->addColumn('action', function ($row) {
                $column = "<a href=\"" . route('users.edit', $row->id) . "\" class=\"btn btn-flat btn-default btn-sm\" data-toggle=\"tooltip\" data-original-title=\"Edit\">
                    <i class=\"fa fa-pencil\"></i> Ubah
                </a>
                <a href=\"" . route('users.destroy', $row->id) . "\" class=\"btn btn-flat btn-danger btn-sm btn-delete\" data-toggle=\"tooltip\" data-original-title=\"Delete\" onclick=\"swal_alert(this,null,'delete','" . csrf_token() . "'); return false;\">
                    <i class=\"fa fa-trash-o\"></i> Hapus
                </a>";

                return $column;
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $model = (new Users);
        $query = $model->with('role')
                    ->select('photo','name','email','active','role_id','id');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'photo' => [
                'title' => 'Photo',
                'width' => '25%'
            ],
            'name' => [
                'title' => 'Name',
                'width' => '25%'
            ],
            'email' => [
                'title' => 'Email',
                'width' => '15'
            ],
            'active' => [
                'title' => 'Status',
                'width' => '15'
            ],
            'role_id' => [
                'title' => 'Grup',
                'width' => '15'
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . time();
    }
}
