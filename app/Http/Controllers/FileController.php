<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FileService;
use App\Http\Resources\FileResource;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    protected $FileService;

    public function __construct(FileService $FileService)
    {
        $this->FileService = $FileService;
    }

    public function store(FileRequest $request)
    {
        $validated = $request->validated();
        $File=$this->FileService->FileCrear($validated);
        //dd($File);
        return FileResource::collection($File);
    }
}
