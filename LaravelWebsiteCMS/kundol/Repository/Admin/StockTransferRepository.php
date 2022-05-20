<?php

namespace App\Repository\Admin;

use App\Contract\Admin\StockTransferInterface;
use App\Http\Resources\Admin\StockTransfer as StockTransferResource;
use App\Models\Admin\Language;
use App\Models\Admin\StockTransfer;
use App\Services\Admin\StockTransferService;
use App\Traits\ApiResponser;
use DB;
use Illuminate\Support\Collection;

class StockTransferRepository implements StockTransferInterface
{
    use ApiResponser;
    /**
     * @return Collection
     */
    public function all()
    {
        try {
            $languageId = Language::defaultLanguage()->value('id');
            if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
                $language = Language::languageId($_GET['language_id'])->firstOrFail();
                $languageId = $language->id;
            }
            $stockTransfer = new StockTransfer;
            if (isset($_GET['getlocationFrom']) && $_GET['getlocationFrom'] == '1') {
                $stockTransfer = $stockTransfer->with('from_warehouse');
            }
            if (isset($_GET['getlocationTo']) && $_GET['getlocationTo'] == '1') {
                $stockTransfer = $stockTransfer->with('to_warehouse');
            }
            if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
                $stockTransfer = $stockTransfer->with('stock_transfer_detail');
                $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail');
                $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail', function ($querys) use ($languageId) {
                    $querys->where('language_id', $languageId);
                });

                $stockTransfer = $stockTransfer->with('stock_transfer_detail.product_combination');


        }
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            $sortBy = ['id', 'trasfer_date'];
            $sortType = ['ASC', 'DESC', 'asc', 'desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'], $sortBy) && in_array($_GET['sortType'], $sortType)) {
                $stockTransfer = $stockTransfer->orderBy($_GET['sortBy'], $_GET['sortType']);
            }
            return $this->successResponse(StockTransferResource::collection($stockTransfer->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function show($stockTransfer)
    {
        try {
            $stockTransfer = StockTransfer::where('id', $stockTransfer->id);
            if (isset($_GET['getlocationFrom']) && $_GET['getlocationFrom'] == '1') {
                $stockTransfer = $stockTransfer->with('from_warehouse');
            }
            if (isset($_GET['getlocationTo']) && $_GET['getlocationTo'] == '1') {
                $stockTransfer = $stockTransfer->with('to_warehouse');
            }
            // if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
            //     $stockTransfer = $stockTransfer->with('stock_transfer_detail');
            //     $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail');
            //     $stockTransfer = $stockTransfer->with('stock_transfer_detail.product_combination');
            // }

            // $languageId = Language::defaultLanguage()->value('id');
            // if (isset($_GET['language_id']) && $_GET['language_id'] != '') {
            //     $language = Language::languageId($_GET['language_id'])->firstOrFail();
            //     $languageId = $language->id;
            // }
            // if (isset($_GET['getDetail']) && $_GET['getDetail'] == '1') {
            //     // $stockTransfer = $stockTransfer->with('stock_transfer_detail');
            //     $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail');
            //     $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail', function ($querys) use ($languageId) {
            //         $querys->where('language_id', $languageId);
            //     });

               
            //     // $stockTransfer = $stockTransfer->with('stock_transfer_detail.product.detail');
            //     // $stockTransfer = $stockTransfer->with('stock_transfer_detail.product_combination');
            //     // return $stock->toSql();
            // }

            return $this->successResponse(new StockTransferResource($stockTransfer->first()), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        DB::beginTransaction();
        try {
            $sql = new StockTransfer;
            $stockTransfer = $sql->create($parms);
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            $stockTransferService = new StockTransferService;
            $sql = $stockTransferService->store($parms, $stockTransfer->id);
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new StockTransferResource($stockTransfer), 'Stock Transfer Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }

    public function destroy($stockTransfer)
    {
        DB::beginTransaction();
        $stockTransferService = new StockTransferService;
        $sql = $stockTransferService->destroyInventory($stockTransfer);

        try {
            $sql = StockTransfer::findOrFail($stockTransfer);
            $sql->delete();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse('', 'Stock Transfer Delete Successfully!');
        } else {
            DB::rollBack();
            return $this->errorResponse();
        }
    }
}
