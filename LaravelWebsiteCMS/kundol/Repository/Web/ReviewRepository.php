<?php

namespace App\Repository\Web;

use App\Contract\Web\ReviewInterface;
use App\Http\Resources\Web\Review as ReviewResource;
use App\Models\Web\Review;
use App\Services\Admin\ReviewService;
use App\Traits\ApiResponser;
use Illuminate\Support\Collection;

class ReviewRepository implements ReviewInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $review = new Review;
            if (isset($_GET['product']) && $_GET['product'] == '1') {
                $review = $review->with(['product', 'product.detail']);
            }
            if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
                $review = $review->where('product_id', $_GET['product_id']);
            }

            if (isset($_GET['customer']) && $_GET['customer'] == '1') {
                $review = $review->with('customer');
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }

            return $this->successResponse(ReviewResource::collection($review->paginate($numOfResult)), 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $reviewServiceValidation = new ReviewService;
            $reviewServiceValidation = $reviewServiceValidation->reviewServiceValidation($parms);
            if (!$reviewServiceValidation) {
                return $this->errorResponse('Sorry! Order not Place! Or Already reviewed!',417);
            }

            $parms['customer_id'] = \Auth::id();
            $sql = Review::create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new ReviewResource($sql), 'Review Save Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function status(array $parms)
    {
        try {
            $sql = Review::where('id', $parms['id'])->update([
                'status' => $parms['status'],
            ]);
            $sql = Review::find($parms['id']);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new ReviewResource($sql), 'Review Status Update Successfully!');
        } else {
            return $this->errorResponse();
        }
    }
}
