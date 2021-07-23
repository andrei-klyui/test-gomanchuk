<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\TestRepositoryEloquent;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Repositories\TestRepository;

class TestController extends Controller
{
    /**
     * @var TestRepository
     */
    protected $testRepository;

    public function __construct(
        TestRepository $testRepository
    ) {
        $this->testRepository = $testRepository;
    }

    public function statistic()
    {
        [$products, $orders] = $this->testRepository->getResponse();

        return view('statistic', compact('products', 'orders'));
    }
}
