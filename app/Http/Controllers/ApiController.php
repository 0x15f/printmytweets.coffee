<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Printful\PrintfulApiClient;
use Printful\PrintfulMockupGenerator;

use Printful\Structures\Generator\MockupGenerationParameters;
use Printful\Structures\Generator\MockupPositionItem;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use Braintree\Transaction;

use App\Product;
use App\Order;

use App\Mail\OrderCreated;
use App\Mail\OrderShipped;

class ApiController extends Controller
{
    public function generateMockup(Request $request)
    {
        $settings = [
            'oauth_access_token' => env('TWITTER_OAUTH_ACCESS_TOKEN'),
            'oauth_access_token_secret' => env('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
            'consumer_key' => env('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
        ];

        $id = @array_values(array_slice(explode('/', strtok($request->query('url'), '?')), -1))[0];
        if($id === null)
        {
            return response()->json([]);
        }

        $twitter = new \TwitterAPIExchange($settings);
        $response = $twitter->setGetfield('?id=' . $id)->buildOauth('https://api.twitter.com/1.1/statuses/show.json', 'GET')->performRequest(); 
        $response = json_decode($response, true);

		$product = Product::create([
			'url' => $request->query('url'),
		]);

    	$client = new PrintfulApiClient(env('PRINTFUL_API_KEY'));

    	$printful_product = $client->post('store/products', [
    		'sync_product' => [
    			'external_id' => $product->id,
    			'name' => 'Tweet ' . substr($request->input('url'), 0, 18),
    			'thumbnail' => route('api.thumbnail', ['url' => $request->query('url')]),
    		],
    		'sync_variants' => [
    			[
	    			'external_id' => $product->id,
	    			'variant_id' => 1320,
	    			'retail_price' => '15',
	    			'files' => [
		    			[
		    				'url' => isset($response['entities']['media']) ? route('api.thumbnail', ['url' => $request->query('url')]) : route('api.thumbnail', ['url' => $request->query('url'), 'padding' => 'yes']),
		    			],
		    		],
	    			'options' => [],
    			]
    		],
    	]);

    	$mockup_client = new PrintfulMockupGenerator($client);

    	$position = new MockupPositionItem;
    	$position->areaWidth = 9;
    	$position->areaHeight = 3.5;
    	$position->width = 9;
    	$position->height = 3.5;
    	$position->top = 0;
    	$position->left = 0.5;
		if(!isset($response['entities']['media']))
		{
			$position->top = 1;
		}

    	$mockup_params = new MockupGenerationParameters;
    	$mockup_params->productId = 19;
    	$mockup_params->variantIds[] = 1320;

    	$mockup_params->addImageUrl('default', route('api.thumbnail', ['url' => $request->query('url')]), $position);

        sleep(15);// lets avoid hitting that rate limit!

    	$print_files = $mockup_client->createGenerationTaskAndWaitForResult($mockup_params);

    	// dd($print_files); exit;

    	$image_string = file_get_contents($print_files->mockupList->mockups[0]->extraMockups[0]->url);

    	Storage::disk('public')->put($printful_product['id'] . '.png', $image_string);

		return response()->json([
			'base64' => base64_encode($image_string),
			'product' => $printful_product['id'],
		]);
    }

    public function generateThumbnail(Request $request)
    {
		return response()->stream(function() use ($request) {
            if($request->query('padding') !== null)
            {
                echo file_get_contents('https://s1.printmytweets.coffee/?id=' . @(array_values(array_slice(explode('/', strtok($request->query('url'), '?')), -1))[0]) . '&padding=yes&url=' . $request->query('url'));
            }
            else
            {
                echo file_get_contents('https://s1.printmytweets.coffee/?id=' . @(array_values(array_slice(explode('/', strtok($request->query('url'), '?')), -1))[0]) . '&url=' . $request->query('url'));
            }
		}, 200, ['Content-type' => 'image/png']);
    }

    public function calculateShippingRate(Request $request)
    {
    	$request->validate([
    		'product_id' => 'required|numeric',
    		'address1' => 'required|string',
    		'city' => 'required|string',
    		'country_code' => 'required|string',
    		'state_code' => 'required|string',
    		'zip' => 'required',
    	]);

    	$client = new PrintfulApiClient(env('PRINTFUL_API_KEY'));

    	$quotes = $client->post('shipping/rates', [
    		'recipient' => [
    			'address1' => $request->input('address1'),
    			'city' => $request->input('city'),
    			'country_code' => $request->input('country_code'),
    			'state_code' => $request->input('state_code'),
    			'zip' => $request->input('zip'),
    		],
    		'items' => [
    			[
	    			'variant_id' => 1320,
	    			'quantity' => 1,
    			],
    		],
    	]);

    	$cheapest_quote = null;
    	$lowest_price = null;
    	foreach($quotes as $key => $value)
    	{
    		if(!is_numeric($key))
    		{
    			$cheapest_quote = $quotes;
    			break;
    		}

    		if($lowest_price === null)
    		{
    			$lowest_price = $value['rate'];
    			$cheapest_quote = $value;
    			continue;
    		}

    		if($lowest_price > $value['rate'])
    		{
    			$lowest_price = $value['rate'];
    			$cheapest_quote = $value;
    		}
    	}

    	$product = Product::where('url', '=', $request->input('url'))->get()->first();

    	$printful_product = $client->get('store/products/' . $request->input('product_id'));

    	$est_cost = $client->post('orders/estimate-costs', [
    		'shipping' => $cheapest_quote['id'],
    		'recipient' => [
    			'address1' => $request->input('address1'),
    			'city' => $request->input('city'),
    			'country_code' => $request->input('country_code'),
    			'state_code' => $request->input('state_code'),
    			'zip' => $request->input('zip'),
    		],
    		'items' => [
    			[
    				'id' => 1,
    				'variant_id' => 1320,
    				'sync_variant_id' => $printful_product['sync_variants'][0]['id'],
    				'external_variant_id' => $printful_product['sync_product']['external_id'],
    				'quantity' => 1,
    				'price' => 15,
    				'retail_price' => 15,
    				'name' => 'Print My Tweets ~ 11oz Coffee Mug',
    				'product' => [
    					'variant_id' => 1320,
    					'product_id' => 19,
    					'image' => $printful_product['sync_variants'][0]['files'][1]['thumbnail_url'],
    					'name' => 'Print My Tweets ~ 11oz Coffee Mug',
    				],
    				'files' => $printful_product['sync_variants'][0]['files'],
    				'sku' => uniqid(),
    			],
    		],
    	]);

    	$request->session()->put('shipping.order.' . $request->input('product_id') . 'costs', $est_cost);
    	$request->session()->put('shipping.order.' . $request->input('product_id') . 'shipping', $cheapest_quote);

    	return response()->json([
    		'shipping' => $cheapest_quote,
    		'total' => $est_cost['retail_costs'],
    	]);
    }

    public function handlePurchase(Request $request, $id)
    {
    	$request->validate([
    		'email' => 'required|email',
    		'payment_method_nonce' => 'required',
    		'address1' => 'required|string',
    		'city' => 'required|string',
    		'country_code' => 'required|string',
    		'state_code' => 'required|string',
    		'zip' => 'required',
    	]);

    	if(!$request->session()->has('shipping.order.' . $id . 'costs') || !$request->session()->has('shipping.order.' . $id . 'shipping'))
    	{
    		return redirect()->back()->withErrors(['Your session has expired']);
    	}

    	$transaction = Transaction::sale([
    		'paymentMethodNonce' => $request->input('payment_method_nonce'),
    		'amount' => ($request->session()->get('shipping.order.' . $id . 'costs'))['retail_costs']['total'],
    	]);

    	if($transaction->success)
    	{
    		$client = new PrintfulApiClient(env('PRINTFUL_API_KEY'));
    		try 
    		{
    			$product = $client->get('store/products/' . $id);
    			$shipping = $request->session()->get('shipping.order.' . $id . 'shipping');

    			$order = $client->post('orders', [
    				'shipping' => $shipping['id'],
		    		'recipient' => [
		    			'address1' => $request->input('address1'),
		    			'city' => $request->input('city'),
		    			'country_code' => $request->input('country_code'),
		    			'state_code' => $request->input('state_code'),
		    			'zip' => $request->input('zip'),
		    		],
		    		'items' => [
		    			[
		    				'variant_id' => 1320,
		    				'sync_variant_id' => $product['sync_variants'][0]['id'],
		    				'name' => 'Print My Tweets ~ 11oz Coffee Mug',
		    				'retail_price' => '15.00',
		    				'quantity' => 1,
		    				'files' => $product['sync_variants'][0]['files'],
		    			],
		    		],
    			], ['confirm' => true]);

    			// replace product image with order image
    			Storage::disk('public')->move($id . '.png', $order['id'] . '.png');

    			Order::create([
    				'printful_id' => $order['id'],
    				'email' => $request->input('email'),
    			]);

    			Mail::to($request->input('email'))->send(new OrderCreated($order));

    			return redirect()->route('order', ['id' => $order['id']]);
    		}
    		catch(\Exception $e)
    		{
                Transaction::void([
                    'transactionId' => $transaction->id
                ]);

    			return redirect()->back()->withErrors(['Error occured while attempting to complete order']);
    		}
    	}
    	else
    	{
    		return redirect()->back()->withErrors(['Error occured while attempting to complete order']);
    	}
    }

    public function viewOrder(Request $request, $id)
    {
    	$client = new PrintfulApiClient(env('PRINTFUL_API_KEY'));

    	$order = $client->get('orders/' . $id);

    	switch($order['status'])
    	{
    		case 'pending';
    			$order['status'] = 'Waiting to be printed';
    		break;
    		case 'inprocess';
    			$order['status'] = 'Bring printed';
    		break;
    		case 'fulfilled';
    			$order['status'] = 'Shipped';
    		break;
    		default:
    			$order['status'] = ucfirst($order['status']);
    	}

    	return view('status', [
    		'order' => $order,
    	]);
    }

    public function handleWebhook(Request $request)
    {
    	if($request->input('type') !== 'package_shipped') // dont handle any other events for now
    	{
    		return response()->json(['success' => true]);
    	}

    	$order = Order::where('printful_id', '=', $request->input('data.order.id'))->get()->first();

    	Mail::to($order->email)->send(new OrderShipped($request->input('data')));

    	return response()->json(['success' => true]);
    }
}
