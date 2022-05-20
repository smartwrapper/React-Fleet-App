<?php

namespace App\Repository\Admin;

use App\Contract\Admin\BarcodeInterface;
use App\Http\Resources\Admin\Barcode as BarcodeResource;
use App\Models\Admin\Gallary;
use App\Models\Admin\Language;
use App\Models\Admin\Product;
use App\Traits\ApiResponser;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class BarcodeRepository implements BarcodeInterface
{
    use ApiResponser;
    public function all($parms)
    {
        try {

            $Barcode = Product::type()->with('product_combination')->whereIn('id', $parms['product_id']);

            $languageId = Language::defaultLanguage()->value('id');

            $Barcode = $Barcode->getBarcodeCategoryDetailByLanguageId($languageId);

            $Barcode = $Barcode->getProductDetailByLanguageId($languageId);
            $generate_barcode = array();
            $Barcode = $Barcode->get();
            foreach ($Barcode as $i => $Barcodes) {
                if ($Barcodes->product_type == 'simple') {
                    $generate_barcode[$i]['product_id'] = $Barcodes->id;
                    $generate_barcode[$i]['title'] = isset($Barcodes->detail[0]->title) ? $Barcodes->detail[0]->title : '';
                    $generate_barcode[$i]['product_combination_id'] = null;
                    $generate_barcode[$i]['price'] = $Barcodes->price;
                    $gallary_name = '';
                    if ($Barcodes->gallary_id != '') {
                        $gallary_name = Gallary::with('detail')->find($Barcodes->gallary_id)->value('name');
                        $generate_barcode[$i]['image'] = "/gallary/thumbnail" . $gallary_name;
                    } else {
                        $generate_barcode[$i]['image'] = '';
                    }
                    $generate_barcode[$i]['category'] = isset($Barcodes->category[0]->category->detail[0]->category_name) ? $Barcodes->category[0]->category->detail[0]->category_name : '';
                    $generate_barcode[$i]['src'] = 'data:image/png;base64,' . DNS1D::getBarcodePNG($Barcodes->product_slug, 'C39');
                } else {
                    foreach ($Barcodes->product_combination as $product_combinations) {
                        if (isset($parms['product_combination_id']) && is_array($parms['product_combination_id']) && in_array($product_combinations->id, $parms['product_combination_id'])) {
                            $generate_barcode[$i]['product_id'] = $Barcodes->id;
                            $generate_barcode[$i]['product_combination_id'] = $product_combinations->id;
                            $generate_barcode[$i]['title'] = isset($Barcodes->detail[0]->title) ? $Barcodes->detail[0]->title : '';
                            $generate_barcode[$i]['price'] = $product_combinations->price;
                            $gallary_name = '';
                            if ($product_combinations->gallary_id != '') {
                                $gallary_name = Gallary::with('detail')->find($product_combinations->gallary_id)->value('name');
                                $generate_barcode[$i]['image'] = "/gallary/thumbnail" . $gallary_name;
                            } else {
                                $generate_barcode[$i]['image'] = '';
                            }
                            $generate_barcode[$i]['category'] = isset($Barcodes->category[0]->category->detail[0]->category_name) ? $Barcodes->category[0]->category->detail[0]->category_name : '';
                            $generate_barcode[$i]['src'] = 'data:image/png;base64,' . DNS1D::getBarcodePNG($product_combinations->sku, 'C39');
                        }
                    }
                }
            }

            return $this->successResponse(BarcodeResource::collection($generate_barcode), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }
}
