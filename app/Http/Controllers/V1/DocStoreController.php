<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\DocStoreResource;
use App\Models\DocStore;
use App\Http\Requests\StoreDocStoreRequest;
use App\Http\Requests\UpdateDocStoreRequest;
use App\Http\Controllers\Controller;

class DocStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocStoreResource::collection(DocStore::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocStoreRequest $request)
    {
        $docstore = DocStore::create($request->all());

        return new DocStoreResource($docstore);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocStore  $docstore
     * @return \Illuminate\Http\Response
     */
    public function show(DocStore $docstore)
    {
        return new DocStoreResource($docstore);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocStoreRequest  $request
     * @param  \App\Models\DocStore  $docstore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocStoreRequest $request, DocStore $docstore)
    {
        $docstore->update($request->all());

        return new DocStoreResource($docstore);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocStore  $docstore
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocStore $docstore)
    {
        $docstore->delete();

        return response('Document was deleted successfully!', 200);
    }
}
