<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ url('statistic') }}">
                    <button type="button" class="btn btn-success">Continue</button>
                </a>
            </div>
            <div>
                <div>
                    <div class="text">
                        Products
                    </div>
                    @foreach($products as $product)
                        <div class="test1">
                            <div class="test2">
                                {{$product->SKU}}
                            </div>
                            <div class="test2">
                                {{$product->title}}
                            </div>
                            <div class="test2">
                                {{$product->image}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <div class="text">
                        Orders
                    </div>
                    @foreach($orders as $order)
                        <div class="test1">
                            <div class="test2">
                                {{$order->id}}
                            </div>
                            <div class="test2">
                                {{$order->total}}
                            </div>
                            <div class="test2">
                                {{$order->shipping_total}}
                            </div>
                            <div class="test2">
                                {{$order->create_time}}
                            </div>
                            <div class="test2">
                                {{$order->timezone}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        .text {
            font-size: 25px;
            margin: 10px 10px;
        }
        .btn-success {
            margin: 10px;
        }
        .test1 {
            display: flex;
            border: 1px solid;
            padding: 5px;
            background-color: beige;
            margin: 5px;
            width: max-content;
        }
        .test2 {
            margin: 5px;
        }
    </style>
</x-app-layout>
