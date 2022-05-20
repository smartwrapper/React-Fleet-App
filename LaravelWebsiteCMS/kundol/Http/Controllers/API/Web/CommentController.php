<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CommentInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CommentReplyRequest;

class CommentController extends Controller
{
    private $CommentRepository;

    public function __construct(CommentInterface $CommentRepository)
    {
        $this->CommentRepository = $CommentRepository;
    }

    public function index()
    {
        return $this->CommentRepository->all();
    }

    public function store(CommentRequest $request)
    {
        $parms = $request->all();
        return $this->CommentRepository->store($parms);
    }

    public function reply(CommentReplyRequest $request)
    {
        $parms = $request->all();
        return $this->CommentRepository->reply($parms);
    }
}
