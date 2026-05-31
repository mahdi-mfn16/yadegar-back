<?php

namespace Yadegar\Memory\App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yadegar\Base\App\Services\BaseService;
use Yadegar\Memory\App\Models\DTOs\FolderDTO;
use Yadegar\Memory\App\Repositories\Interfaces\FolderRepositoryInterface;
use Yadegar\Memory\App\Repositories\Interfaces\MemoryRepositoryInterface;

class FolderService extends BaseService
{
    public function __construct(
        FolderRepositoryInterface $repository,
        public MemoryRepositoryInterface $memoryRepo
    )
    {
        parent::__construct($repository);
    }


    public function getMyFolderList()
    {
        $data = request()->all();
        $data['filters']['user'] = auth('sanctum')->id();
        $data['with'] = ['memories'];
        request()->merge($data);

        return $this->repository->get();
    }



    public function createFolder($request)
    {
        try {
            DB::beginTransaction();
            
            $memory = $this->create(FolderDTO::fromRequest($request));
            
            DB::commit();

            return $this->show($memory->id);

        } catch (Exception $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }



    public function updateFolder($request, $folder)
    {
        try {
            DB::beginTransaction();
            $folder = $this->update($folder, FolderDTO::fromModel($folder, $request->all()));

            DB::commit();

            return $this->show($folder->id);

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }


    public function deleteFolder($folder)
    {
        try {
            DB::beginTransaction();
            
            foreach($folder->memories as $memory){
                $this->memoryRepo->deleteOne($memory);
            }
            
            $this->delete($folder);

            DB::commit();


        } catch (\Throwable $th) {
            DB::rollBack();
            Log::channel('memory')->info($th);
            return null;
        }
        
    }
}