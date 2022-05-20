<?php

namespace App\Repository\Admin;

use App\Contract\Admin\GallaryInterface;
use App\Http\Resources\Admin\Gallary as GallaryResource;
use App\Http\Resources\Admin\GallaryDetail as GallaryDetailResource;
use App\Models\Admin\Gallary;
use App\Models\Admin\GallaryDetail;
use App\Services\Admin\GallaryService;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Support\Collection;
use Image;
use App\Services\Admin\DeleteValidatorService;
use SebastianBergmann\Environment\Console;

class GallaryRepository implements GallaryInterface
{
    use ApiResponser;

    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $gallary = new Gallary;
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $gallary = $gallary->with('detail');
            }
            if (isset($_GET['getGallaryTag']) && $_GET['getGallaryTag'] == '1') {
                $gallary = $gallary->with('gallary_tag.tag');
                if (isset($_GET['tag_id']) && $_GET['tag_id'] != '') {
                    $gallary_tag = $_GET['tag_id'];
                    $gallary = $gallary->whereHas('gallary_tag', function ($query) use ($gallary_tag) {
                        $query->where('gallary_tags.tag_id', $gallary_tag);
                    });
                }
            }

            $sortBy = ['id'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $gallary = $gallary->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            
            return $this->successResponse(GallaryResource::collection($gallary->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($gallary)
    {
        try {
            $gallary = Gallary::where('id', $gallary);
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $gallary = $gallary->with('detail');
            }
            if (isset($_GET['getGallaryTag']) && $_GET['getGallaryTag'] == '1') {
                $gallary = $gallary->with('gallary_tag.tag');
            }
            $gallary = $gallary->firstOrFail();
            return $this->successResponse(new GallaryResource($gallary) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store($parms, $dataCollection = '')
    {
        \DB::beginTransaction();
        try {
            $image = $parms;
            $name = $image->getClientOriginalName();
            $input['imagename'] = date('Ymdis') . $name;

            $destinationPath = public_path('/gallary');
            $img = Image::make($image->path());

            $image->move($destinationPath, $input['imagename']);

            $arr['name'] = $input['imagename'];
            $arr['extension'] = $image->getClientMimeType();
            $arr['user_id'] = Auth::id();

            $arr['created_by'] = \Auth::id();
            $sql = new Gallary;
            $sql = $sql->create($arr);
        } catch (Exception $e) {
            \DB::rollback();
            return $this->errorResponse();
        }

        if ($sql) {
            $gallaryService = new GallaryService;
            $result = $gallaryService->store($img, $destinationPath, $input['imagename'], $sql->id);
        }

        if ($result && isset($dataCollection['gallary_tags']) && count($dataCollection['gallary_tags']) > 0) {
            $gallaryService = new GallaryService;
            $result = $gallaryService->storeGallaryTag($sql->id, $dataCollection['gallary_tags']);
        }

        if ($result) {
            \DB::commit();
            return $this->successResponse(new GallaryResource($sql), 'Gallary Save Successfully!');
        } else {
            \DB::rollback();
            return $result;
        }
    }

    public function update($parms, $gallary)
    {
        if (isset($parms['gallary_tags']) && count($parms['gallary_tags']) > 0) {
            $gallaryService = new GallaryService;
            
            $gallaryService->deleteGallaryTag($gallary->id);

            $result = $gallaryService->storeGallaryTag($gallary->id, $parms['gallary_tags']);
        }

        if ($result) {
            \DB::commit();
            return $this->successResponse(new GallaryResource($gallary), 'Tag update successfully!');
        } else {
            \DB::rollback();
            return $result;
        }
    }

    public function destroy($gallary)
    {
        $deleteValidatorService = new DeleteValidatorService;
        $isExistedInOtherTable = $deleteValidatorService->deleteValidate('gallary_id', $gallary);
        
        if($isExistedInOtherTable === 1){
            return $this->errorResponse('linked in another table can not be deleted',422,null);
        }


        try {
            $sql = Gallary::whereIn('id', $gallary);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Gallary Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function resizeSingleImage($parms)
    {
        \DB::beginTransaction();
        try {
            $gallary = GallaryDetail::find($parms['id']);
            $gallaryService = new GallaryService;
            $mediumPath = $gallaryService->resizeImage($gallary, $parms);
            $mediumPath['gallary_id'] = $gallary->gallary_id;
            $result = GallaryDetail::find($gallary->id);
            $result->update($mediumPath);
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($result) {
            \DB::commit();
            return $this->successResponse(new GallaryDetailResource($result), 'Gallary Update Successfully!');
        } else {
            return $result;
        }
    }

    public function regenrateAllImages()
    {
        $gallary = GallaryDetail::all();
        $result = 1;
        foreach ($gallary as $res) {

            try {
                $image = public_path($res->path);
                $imagename = $res->Gallary->name;

                $destinationPath = public_path('/gallary');
                $img = Image::make(file_get_contents($image));
            } catch (Exception $e) {
                \DB::rollback();
                return $this->errorResponse();
            }
            $gallaryService = new GallaryService;
            $result = $gallaryService->store($img, $destinationPath, $imagename, $res->gallary_id, 'regenerate');
        }

        if ($result) {
            \DB::commit();
            return $this->successResponse('', 'Gallary regenerated successfully!');
        } else {
            \DB::rollback();
            return $result;
        }
    }
}
