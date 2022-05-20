<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\PageInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\PageRequest;
use App\Models\Admin\Page;

class PageController extends Controller
{
    private $PageRepository;

    public function __construct(PageInterface $PageRepository)
    {
        $this->PageRepository = $PageRepository;
    }

    public function index()
    {
        return $this->PageRepository->all();
    }

    public function show(Page $page)
    {
        return $this->PageRepository->show($page);
    }

    public function store(PageRequest $request)
    {
        $parms = $request->all();
        return $this->PageRepository->store($parms);
    }

    public function update(PageRequest $request, Page $page)
    {
        $parms = $request->all();
        return $this->PageRepository->update($parms, $page);
    }

    public function destroy($id)
    {
        return $this->PageRepository->destroy($id);
    }

}
