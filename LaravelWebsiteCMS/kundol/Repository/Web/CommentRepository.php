<?php

namespace App\Repository\Web;

use App\Contract\Web\CommentInterface;
use App\Traits\ApiResponser;
use App\Services\Admin\CommentService;
use App\Models\Web\Comment;
use App\Http\Resources\Web\Comment as CommentResource;

class CommentRepository implements CommentInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            $comment = new Comment;
            if (isset($_GET['product']) && $_GET['product'] == 1) {
                $comment = $comment->with('product');
            }

            if (isset($_GET['customer']) && $_GET['customer'] == 1) {
                $comment = $comment->with('customer');
            }

            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            
            return $this->successResponse(CommentResource::collection($comment->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (Exception $e) {
            return $this->errorResponse();
        }
    }

    public function store(array $parms)
    {
        try {
            $parms['customer_id'] = \Auth::id();
            $sql = Comment::create($parms);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CommentResource($sql), 'Comment Save Successfully!');
        } else {
            return $this->errorResponse();
        }

    }

    public function reply(array $parms)
    {
        try {
            $CommentServiceValidation = new CommentService;
            $CommentServiceValidation = $CommentServiceValidation->replyServiceValidation();
            if(!$CommentServiceValidation)
                return $this->errorResponse("You Don't Allow to Reply this Product!");

            $sql = Comment::findOrFail($parms['id']);
            $data['parent_id'] = $parms['id'];
            $data['comment'] = $parms['comment'];
            $data['customer_id'] = $sql->customer_id;
            $data['product_id'] = $sql->product_id;
            $sql = Comment::create($data);
        } catch (Exception $e) {
            return $this->errorResponse();
        }
        if ($sql) {
            return $this->successResponse(new CommentResource($sql), 'Comment Status Update Successfully!');
        } else {
            return $this->errorResponse();
        }

    }

}
