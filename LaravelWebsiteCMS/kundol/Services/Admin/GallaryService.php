<?php

namespace App\Services\Admin;

use App\Models\Admin\GallaryDetail;
use App\Models\Admin\GallaryTag;
use App\Models\Admin\Setting;
use App\Models\Admin\Tag;
use App\Traits\ApiResponser;
use DB;
use Image;

class GallaryService
{
    use ApiResponser;
    public function saveImage($img, $destinationPath, $type, $input, $height, $width, $manualHeight = '', $manualWidth = '')
    {
        if ($manualHeight == '' && $manualWidth == '') {
            $height = Setting::gallaryHeightWidth($height)->value('value');
            $width = Setting::gallaryHeightWidth($width)->value('value');
        } else {
            $height = $manualHeight;
            $width = $manualWidth;
        }

        if ($height == '') {
            $height = 150;
        }

        if ($width == '') {
            $width = 150;
        }

        $img->resize($height, $width, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $type . $input);
        $arr['height'] = $height;
        $arr['width'] = $width;
        $arr['path'] = '/gallary/' . $type . $input;
        $arr['gallary_type'] = $type;
        return $arr;
    }

    public function store($img, $destinationPath, $imageName, $gallaryId, $type = '')
    {
        $this->storeLargeImage($img, $destinationPath, $imageName, $gallaryId, $type);
        $this->storeMediumImage($img, $destinationPath, $imageName, $gallaryId, $type);
        $this->storeThumbnailImage($img, $destinationPath, $imageName, $gallaryId, $type);

        return 1;

    }

    public function storeLargeImage($img, $destinationPath, $imageName, $gallaryId)
    {
        try {
            $largePath = $this->saveImage($img, $destinationPath, 'large', $imageName, 'large_width', 'large_height');
            $largePath['gallary_id'] = $gallaryId;
            GallaryDetail::updateOrCreate(
                ['gallary_id' => $gallaryId, 'gallary_type' => 'large'],
                $largePath
            );
            // $query = new GallaryDetail;
            // $query->create($largePath);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function storeMediumImage($img, $destinationPath, $imageName, $gallaryId)
    {
        try {
            $mediumPath = $this->saveImage($img, $destinationPath, 'medium', $imageName, 'medium_width', 'medium_height');
            $mediumPath['gallary_id'] = $gallaryId;
            GallaryDetail::updateOrCreate(
                ['gallary_id' => $gallaryId, 'gallary_type' => 'medium'],
                $mediumPath
            );
            // $query = new GallaryDetail;
            // $query->create($mediumPath);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function storeThumbnailImage($img, $destinationPath, $imageName, $gallaryId)
    {
        try {
            $thumbPath = $this->saveImage($img, $destinationPath, 'thumbnail', $imageName, 'thumbnail_width', 'thumbnail_height');
            $thumbPath['gallary_id'] = $gallaryId;
            GallaryDetail::updateOrCreate(
                ['gallary_id' => $gallaryId, 'gallary_type' => 'thumbnail'],
                $thumbPath
            );
            // $query = new GallaryDetail;
            // $query->create($thumbPath);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
    }

    public function storeGallaryTag($gallaryId, $tags)
    {
        foreach ($tags as $tag) {
            if ($tag == '') {
                continue;
            }

            try {
                $gallaryTag = Tag::updateOrCreate(['name' => $tag], ['name' => $tag]);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }

            try {
                GallaryTag::updateOrCreate(['gallary_id' => $gallaryId, 'tag_id' => $gallaryTag->id], ['gallary_id' => $gallaryId, 'tag_id' => $gallaryTag->id]);
            } catch (Exception $e) {
                DB::rollback();
                return $this->errorResponse();
            }
        }
        return 1;
    }

    public function deleteGallaryTag($gallaryId)
    {
        try {
            GallaryTag::where('gallary_id',$gallaryId)->delete();
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorResponse();
        }
        return 1;
    }

    public function resizeImage($gallary, $parms)
    {
        $gallary = GallaryDetail::find($parms['id']);
        $destinationPath = public_path('/gallary');
        $img = Image::make(file_get_contents(public_path() . $gallary->path));
        return $this->saveImage($img, $destinationPath, $gallary->gallary_type, $gallary->Gallary->name, $gallary->gallary_type . '_width', $gallary->gallary_type . '_height', $parms['height'], $parms['width']);

    }
}
