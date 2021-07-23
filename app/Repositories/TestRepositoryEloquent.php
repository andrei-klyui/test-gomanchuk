<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TestRepositoryEloquent implements TestRepository
{
    /**
     * Save a new entity in repository
     *
     */
    public function getResponse()
    {
        $http = new Client();
        $response = $http->post('https://apptest.wearepentagon.com/devInterview/API/en/access-token', [
            'form_params' => [
                'client_id' => 'devtask',
                'client_secret' => 'Ye97T%c!CGZ*7$52',
            ],
        ]);

        $response = json_decode((string) $response->getBody(), true);
        $token = $response['access_token'];

        $response = $http->post('https://apptest.wearepentagon.com/devInterview/API/en/get-random-test-feed', [
            'headers' => [
                'Authorization' => $token,
            ],
        ]);

        $new = json_decode((string) $response->getBody(), true);
        $new2 = explode( ':', $new);
        $new3 = explode('||', $new2[1]);
        $items = [];

        foreach ($new3 as $item) {
            preg_match('/(.*?)\{(.*)\}.*/i', $item, $match);
            $items[$match[1]] = $match[2];
        }
        $test = '';

        switch ($new2[0]) {
            case ($new2[0] == 'order'):
                $test = new Order(array(
                    'id' => $items['id'],
                    'total' => $items['total'],
                    'shipping_total' => $items['shipping_total'],
                    'create_time' => $items['create_time'],
                    'timezone' => $items['timezone'],
                ));
                break;
            case ($new2[0] == 'product'):
                $test = new Product(array(
                    'SKU' => $items['SKU'],
                    'title' => $items['title'],
                    'image' => $items['image\base64;jpeg'],
                ));
                break;
            default:
                echo "Error";
                break;
        }
        $test->save();

        $products = Product::all();
        $orders = Order::all();

        return [$products, $orders];
    }
}
