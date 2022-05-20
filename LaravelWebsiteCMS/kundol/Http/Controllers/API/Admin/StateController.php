<?php

namespace App\Http\Controllers\API\Admin;

use App\Contract\Admin\StateInterface;
use App\Http\Controllers\Controller as Controller;
use App\Models\Admin\State;
use App\Repository\Admin\StateRepository;

class StateController extends Controller
{

    private $StateRepository;

    public function __construct(StateInterface $StateRepository)
    {
        $this->StateRepository = $StateRepository;
    }

    public function index()
    {
        return $this->StateRepository->all();
    }

    public function show(State $state)
    {
        return $this->StateRepository->show($state);
    }
}
