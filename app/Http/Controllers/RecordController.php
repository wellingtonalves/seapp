<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordCreateRequest;
use App\Http\Requests\RecordUpdateRequest;
use Domain\Features\Record\RecordAll;
use Domain\Features\Record\RecordCreate;
use Domain\Features\Record\RecordDestroy;
use Domain\Features\Record\RecordShow;
use Domain\Features\Record\RecordUpdate;
use Illuminate\Http\Response;

class RecordController extends Controller
{

    /**
     * @param RecordCreateRequest $request
     * @param RecordCreate $createRecord
     * @return mixed
     */
    public function store(RecordCreateRequest $request, RecordCreate $createRecord)
    {
        try {
            $response = $createRecord->create($request);
            return Response::custom($response, null, 201);
        } catch (\Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }

    /**
     * @param int $id
     * @param RecordUpdateRequest $request
     * @param RecordUpdate $recordUpdate
     * @return mixed
     */
    public function update(int $id, RecordUpdateRequest $request, RecordUpdate $recordUpdate)
    {
        try {
            $response = $recordUpdate->update($id, $request);
            return Response::custom($response);
        } catch (\Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }

    /**
     * @param int $id
     * @param RecordShow $recordShow
     * @return mixed
     */
    public function show(int $id, RecordShow $recordShow)
    {
        try {
            $response = $recordShow->show($id);
            return Response::custom('Detalhe do disco', $response);
        } catch (\Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }

    /**
     * @param int $id
     * @param RecordDestroy $recordDestroy
     * @return mixed
     */
    public function destroy(int $id, RecordDestroy $recordDestroy)
    {
        try {
            $response = $recordDestroy->destroy($id);
            return Response::custom('Disco excluído', $response);
        } catch (\Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }

    /**
     * @return mixed
     */
    public function index(RecordAll $recordAll)
    {
        try {
            $response = $recordAll->all();
            return Response::custom('Listagem de discos', $response);
        } catch (\Exception $exception) {
            return Response::custom($exception->getMessage(), null, 500, 'error');
        }
    }
}
