<?php

namespace App\Http\Modules;

use App\Traits\HasCrudExtraData;
use App\Traits\HasCrudRedirect;

class BaseWebCrud extends BaseCrud
{
    use HasCrudExtraData, HasCrudRedirect;

    public $viewPath = 'pages.';

    public $successStoreMsg = "Data successfully created!";
    public $successUpdateMsg = "Data successfully updated!";
    public $successDestroyMsg = "Data successfully deleted!";


    public function __prepareQueryListType($query)
    {

        $query = $query->paginate($this->paginationPerPage);

        $this->__prepareListPaginationAppend($query);

        return $query;
    }

    public function __successList($query)
    {
        $data['list'] = $query;

        $data = $this->__extraDataList($data);

        return view($this->viewPath . '.list', $data);
    }

    public function create()
    {
        $data['row'] = $this->row;

        $data = $this->__extraDataCreate($data);

        return view($this->viewPath . '.create', $data);
    }

    public function __successStore()
    {
        return redirect($this->__redirectSuccessStored())->with('success_msg', $this->successStoreMsg);
    }


    public function __successShow()
    {
        $data['row'] = $this->row;

        $data = $this->__extraDataShow($data);

        return view($this->viewPath . '.show', $data);
    }


    public function edit($id)
    {
        $query = $this->model::where($this->modelKey, $id);

        $this->__prepareQueryRelationShow($query);

        $this->__prepareQueryRowShow($query);

        $this->row = $query->firstOrFail();

        $data['row'] = $this->row;

        $data = $this->__extraDataShow($data);

        return view($this->viewPath . '.edit', $data);
    }

    public function __successUpdate()
    {
        return redirect($this->__redirectSuccessUpdated())->with('success_msg', $this->successUpdateMsg);
    }

    public function __successDestroy()
    {
        return redirect($this->__redirectSuccessDeleted())->with('success_msg', $this->successDestroyMsg);
    }
}
