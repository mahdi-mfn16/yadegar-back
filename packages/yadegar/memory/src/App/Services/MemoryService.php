<?php

namespace Yadegar\Memory\App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yadegar\Base\App\Services\BaseService;
use Yadegar\Filesystem\App\Facades\Uploader;
use Yadegar\Filesystem\App\Services\FileService;
use Yadegar\Memory\App\Models\DTOs\MemoryDTO;
use Yadegar\Memory\App\Repositories\Interfaces\MemoryRepositoryInterface;

class MemoryService extends BaseService
{
    public function __construct(
        MemoryRepositoryInterface $repository,
        public FileService $fileService
    )
    {
        parent::__construct($repository);
    }

    

    public function getExploreList()
    {
        $data = request()->all();
        $data['with'] = ['files', 'folder', 'user'];
        request()->merge($data);

        return $this->repository->get();
    }


    public function getFamilyMemoryList()
    {
        $data = request()->all();
        $data['with'] = ['files', 'folder', 'user'];
        $data['filters']['family'] = true;
        request()->merge($data);

        return $this->repository->get();
    }


    public function getMyMemoryList()
    {
        $data = request()->all();
        $data['filters']['user'] = auth('sanctum')->id();
        $data['with'] = ['files', 'folder'];
        request()->merge($data);

        return $this->repository->get();
    }


    public function showMemory($memory)
    {
        $data = request()->all();
        $data['with'] = ['files', 'folder'];
        request()->merge($data);
        return $this->show($memory->id);
    }


    public function createMemory($request)
    {
        try {
            DB::beginTransaction();
            $memory = $this->create(MemoryDTO::fromRequest($request));

            if($request->hasFile('audio')){
                Uploader::fileable($memory)
                    ->file($request->file('audio'))
                    ->type('audio')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            }

            if($request->hasFile('video')){
                Uploader::fileable($memory)
                    ->file($request->file('video'))
                    ->type('video')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            }

            if($request->hasFile('photo')){
                Uploader::fileable($memory)
                    ->file($request->file('photo'))
                    ->type('photo')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            }

            DB::commit();

            return $this->show($memory->id);

        } catch (Exception $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }



    public function updateMemory($request, $memory)
    {
        try {
            DB::beginTransaction();
            $memory = $this->update($memory, MemoryDTO::fromModel($memory, $request->all()));

            if($request->hasFile('audio')){
                Uploader::model($memory->getFile('audio'))
                    ->fileable($memory)
                    ->file($request->file('audio'))
                    ->type('audio')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            }

            if($request->hasFile('video')){
                Uploader::model($memory->getFile('video'))
                    ->fileable($memory)
                    ->file($request->file('video'))
                    ->type('video')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            }

            if($request->hasFile('photo')){
                Uploader::model($memory->getFile('photo'))
                    ->fileable($memory)
                    ->file($request->file('photo'))
                    ->type('photo')
                    ->dir('memory')
                    ->alt('memory-'.$memory->id)
                    ->upload();
            } elseif ($request->input('remove_photo')) {
                $photo = $memory->files()->where('type', 'photo')->first();
                $this->fileService->deleteItem($photo);

            }

            if ($request->input('remove_audio') && !$request->hasFile('audio')) {
                $audio = $memory->files()->where('type', 'audio')->first();
                $this->fileService->deleteItem($audio);
            }

            if ($request->input('remove_video') && !$request->hasFile('video')) {
                $video = $memory->files()->where('type', 'video')->first();
                $this->fileService->deleteItem($video);
            }

            DB::commit();

            return $this->show($memory->id);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }


    public function deleteMemory($memory)
    {
        try {
            DB::beginTransaction();
            
            $files = $memory->files;
            foreach($files as $file){
                $this->fileService->deleteItem($file);
            }

            $this->delete($memory);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }


}