<?php

namespace App\Repository\Admin;

use App\Contract\Admin\QuotationInterface;
use App\Http\Resources\Admin\Quotation as QuotationResource;
use App\Models\Admin\Language;
use App\Models\Admin\Quotation;
use App\Models\Admin\QuotationDetail;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class QuotationRepository implements QuotationInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $quotation = new Quotation;
            if (isset($_GET['getPurchaser']) && $_GET['getPurchaser'] == '1') {
                $quotation = $quotation->with('purchaser');
            }
            if (isset($_GET['getCustomer']) && $_GET['getCustomer'] == '1') {
                $quotation = $quotation->with('customer');
            }
            if (isset($_GET['getWarehouse']) && $_GET['getWarehouse'] == '1') {
                $quotation = $quotation->with('warehouse');
            }

            if (isset($_GET['getQuotationDetail']) && $_GET['getQuotationDetail'] == '1') {
                $quotation = $quotation->with('quotation_detail');
            }
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['productDetail']) && $_GET['productDetail'] == '1') {
                $quotation = $quotation->getProductDetailByLanguageId($languageId);
            }
            if (isset($_GET['type']) && $_GET['type'] != '') {
                $quotation = $quotation->type($_GET['type']);
            }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id', 'discount_amount', 'shipping_cost', 'tax_amount', 'grand_total', 'type'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $quotation = $quotation->orderBy($_GET['sortBy'], $_GET['sortType']);
            }

            return $this->successResponse(QuotationResource::collection($quotation->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($quotation)
    {
        try {
            $quotation = Quotation::where('id', $quotation->id);
            if (isset($_GET['getBiller']) && $_GET['getBiller'] == '1') {
                $quotation = $quotation->with('biller');
            }
            if (isset($_GET['getPurchaser']) && $_GET['getPurchaser'] == '1') {
                $quotation = $quotation->with('purchaser');
            }
            if (isset($_GET['getCustomer']) && $_GET['getCustomer'] == '1') {
                $quotation = $quotation->with('customer');
            }
            if (isset($_GET['getWarehouse']) && $_GET['getWarehouse'] == '1') {
                $quotation = $quotation->with('warehouse');
            }
            if (isset($_GET['getTax']) && $_GET['getTax'] == '1') {
                $quotation = $quotation->with('tax');
            }
            if (isset($_GET['getGallary']) && $_GET['getGallary'] == '1') {
                $quotation = $quotation->with('gallary');
            }
            if (isset($_GET['getQuotationDetail']) && $_GET['getQuotationDetail'] == '1') {
                $quotation = $quotation->with('quotation_detail');
            }
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            if (isset($_GET['productDetail']) && $_GET['productDetail'] == '1') {
                $quotation = $quotation->getProductDetailByLanguageId($languageId);
            }
            if (isset($_GET['getProductCombinationDetail']) && $_GET['getProductCombinationDetail'] == '1') {
                $quotation = $quotation->with('quotation_detail.product_combination');
            }
            return $this->successResponse(new QuotationResource($quotation->firstOrFail()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            if (isset($parms['type']) && $parms['type'] == 'purchase') {
                $query = Quotation::type('purchase')->latest()->first();
                if (isset($query->id)) {
                    $parms['uuid'] = $query->uuid + 1;
                } else {
                    $parms['uuid'] = 1;
                }
            } else {
                $query = Quotation::type('sale')->latest()->first();
                if (isset($query->id)) {
                    $parms['uuid'] = $query->uuid + 1;
                } else {
                    $parms['uuid'] = 1;
                }
            }
            // return $parms;
            $sql = new Quotation;
            $sql = $sql->create($parms);
            $quotation = $sql;
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            $data['quotation_id'] = $sql->id;
            foreach ($parms['product_id'] as $i => $product_id) {
                $data['product_id'] = $product_id;
                $data['product_combination_id'] = (isset($parms['product_combination_id'][$i])) ? $parms['product_combination_id'][$i] : null;
                $data['price'] = (isset($parms['price'][$i])) ? $parms['price'][$i] : '0';
                $data['qty'] = (isset($parms['qty'][$i])) ? $parms['qty'][$i] : '0';
                $data['subtotal'] = (isset($parms['subtotal'][$i])) ? $parms['subtotal'][$i] : '0';
                try {
                    $sql = QuotationDetail::updateOrCreate(['quotation_id' => $data['quotation_id'], 'product_id' => $product_id, 'product_combination_id' => $data['product_combination_id']], $data);
                } catch (Exception $e) {
                    DB::rollBack();
                    return $this->errorResponse();
                }
            }
        }

        if ($sql) {
            DB::commit();
            $sql = Quotation::find($quotation->id);
            return $this->successResponse(new QuotationResource($sql), 'Quotation Save Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function update(array $parms, $quotation)
    {
        DB::beginTransaction();
        try {
            $sql = $quotation->update($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            foreach ($parms['product_id'] as $i => $product_id) {
                $data['quotation_id'] = $quotation->id;
                $data['product_id'] = $product_id;
                $data['product_combination_id'] = (isset($parms['product_combination_id'][$i])) ? $parms['product_combination_id'][$i] : null;
                $data['price'] = (isset($parms['price'][$i])) ? $parms['price'][$i] : '0';
                $data['qty'] = (isset($parms['qty'][$i])) ? $parms['qty'][$i] : '0';
                $data['tax_amount'] = (isset($parms['tax_amount'][$i])) ? $parms['tax_amount'][$i] : '0';
                $data['subtotal'] = (isset($parms['subtotal'][$i])) ? $parms['subtotal'][$i] : '0';
                try {
                    $sql = QuotationDetail::updateOrCreate(['quotation_id' => $data['quotation_id'], 'product_id' => $product_id, 'product_combination_id' => $data['product_combination_id']], $data);
                } catch (Exception $e) {
                    DB::rollBack();
                    return $this->errorResponse();
                }
            }
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new QuotationResource($quotation), 'Quotation Update Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($quotation)
    {
        try {
            $sql = Quotation::findOrFail($quotation);
            $sql->delete();
        } catch (Exception $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'Quotation Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
