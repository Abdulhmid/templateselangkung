<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Increase\Repository\RolesRepository;
use App\Increase\DataTables\RolesDataTable;
use App\Increase\Forms\RolesForm;
use Kris\LaravelFormBuilder\FormBuilder;

class RolesController extends Controller
{
    protected $title = "Roles";
    protected $url = "roles";
    protected $folder = "admin.roles";
    protected $form;

    public function __construct(RolesRepository $service)
    {
        $this->service = $service;
        $this->form     = RolesForm::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $dataTable)
    {        
        $data['title'] = $this->title;
        $data['subTitle'] = $this->subTitle();
        $data['breadcrumb'] = $this->url;

        return $dataTable->render($this->folder . '.index', $data);
    }

    /**
     * Show the form for inviting a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'method' => 'POST',
            'route' => $this->url . '.store'
        ]);

        return view($this->folder . '.form', [
            'title' => $this->title,
            'subTitle' => $this->subTitle(),
            'form' => $form,
            'breadcrumb' => 'new-' . $this->url
        ]);
    }

    /**
     * Show the form for inviting a customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RolesRequest $request)
    {
        $result = $this->service
                    ->create(
                        $request->except([
                            '_token', '_method','save_continue'
                        ])
                    );

        $rest = $result->id;
        $save_continue = $request->get('save_continue');
        $redirect = empty($save_continue) ? $this->url : 
                        $this->url.'/'.$rest.'/edit';

        if ($result) {
            return redirect()->to($redirect)
                ->with('message', 'Data Berhasil Ditambahkan');
        }

        return back()->with('error', 'Failed to invite');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FormBuilder $formBuilder,$id)
    {
        $model = $this->service->find($id);

        $form = $formBuilder->create($this->form, [
            'method' => 'PUT',
            'url' => route($this->url . '.update', $id),
            'model' => $model
        ]);

        return view($this->folder . '.form', [
            'title' => $this->title,
            'form' => $form,
            'subTitle' => $this->subTitle(),
            'breadcrumb' => 'new-' . $this->url
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\RolesRequest $request, $id)
    {
        $result = $this->service
                    ->update(
                        $id, 
                        $request->except([
                            '_token', '_method','save_continue'
                        ])
                    );

        $result = $id;
        $save_continue = $request->get('save_continue');
        $redirect = empty($save_continue) ? $this->url : 
                        $this->url.'/'.$result.'/edit';

        if ($result) {
            return redirect()->to($redirect)
                ->with('message', 'Data Berhasil Diubah');
        }

        return back()->with('error', 'Failed to update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect()->to($this->url)
                    ->with('message', 'Successfully deleted');
        }

        return back()->with('error', 'Failed to delete');
    }
}
