<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface TestRepository.
 *
 * @package namespace App\Repositories;
 */
interface TestRepository
{
    /**
     * @param $request
     * @return mixed
     */
    public function getResponse();
}
