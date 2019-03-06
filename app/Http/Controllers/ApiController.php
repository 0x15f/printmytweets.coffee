<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Printful\PrintfulApiClient;
use Printful\PrintfulMockupGenerator;

use Printful\Structures\Generator\MockupGenerationParameters;
use Printful\Structures\Generator\MockupPositionItem;

use App\Product;

class ApiController extends Controller
{
    public function generateMockup(Request $request)
    {
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
	    			'retail_price' => '12.99',
	    			'files' => [
		    			[
		    				'url' => route('api.thumbnail', ['url' => $request->query('url')]),
		    			],
		    		],
	    			'options' => [],
    			]
    		],
    	]);

    	$mockup_client = new PrintfulMockupGenerator($client);

		$settings = [
		    'oauth_access_token' => env('TWITTER_OAUTH_ACCESS_TOKEN'),
		    'oauth_access_token_secret' => env('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
		    'consumer_key' => env('TWITTER_CONSUMER_KEY'),
		    'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
		];

		$id = @array_values(array_slice(explode('/', $request->query('url')), -1))[0];
		if($id === null)
		{
			return response()->json([]);
		}

		$twitter = new \TwitterAPIExchange($settings);
		$response = $twitter->setGetfield('?id=' . $id)->buildOauth('https://api.twitter.com/1.1/statuses/show.json', 'GET')->performRequest(); 

		// TODO: SMART IMAGE PLACEMENT
		$position = null;
		if(!isset($result['entities']['media']))
		{
	    	$position = new MockupPositionItem;
	    	$position->areaWidth = 9;
	    	$position->areaHeight = 3.5;
	    	$position->width = 9;
	    	$position->height = 3.5;
	    	$position->top = 1;
	    	$position->left = 0;
		}

    	$mockup_params = new MockupGenerationParameters;
    	$mockup_params->productId = 19;
    	$mockup_params->variantIds[] = 1320;

    	$mockup_params->addImageUrl('default', route('api.thumbnail', ['url' => $request->query('url')]), $position);

    	$print_files = $mockup_client->createGenerationTaskAndWaitForResult($mockup_params);

    	$image_string = file_get_contents($print_files->mockupList->mockups[0]->extraMockups[2]->url);

		return response()->json([
			'base64' => base64_encode($image_string),
		]);
    }

    public function generateThumbnail(Request $request)
    {
		return response()->stream(function() use ($request) {
			echo file_get_contents('https://s1.printmytweets.coffee/?id=' . @(array_values(array_slice(explode('/', $request->query('url')), -1))[0]) . '&url=' . $request->query('url'));
		}, 200, ['Content-type' => 'image/png']);
    }
}
