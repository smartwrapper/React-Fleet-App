<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\TagInterface;
use App\Http\Controllers\Controller as Controller;
use App\Repository\Admin\TagRepository;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        return $this->tagRepository->all();
    }
}
