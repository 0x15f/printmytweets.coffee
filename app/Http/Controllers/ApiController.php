<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Printful\PrintfulApiClient;
use Printful\PrintfulMockupGenerator;

use Printful\Structures\Generator\MockupGenerationParameters;

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

    	$mockup_params = new MockupGenerationParameters;
    	$mockup_params->variantIds[] = $printful_product['id'];

    	$print_files = $mockup_client->createGenerationTaskAndWaitForResult($mockup_params);

    	dd($printful_product, $print_files); exit;
    }

    public function generateThumbnail(Request $request)
    {
		$settings = [
		    'oauth_access_token' => env('TWITTER_OAUTH_ACCESS_TOKEN'),
		    'oauth_access_token_secret' => env('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
		    'consumer_key' => env('TWITTER_CONSUMER_KEY'),
		    'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
		];

		$id = @array_values(array_slice(explode('/', $request->query('url')), -1))[0];
		if($id === null)
		{
			return response()->stream(function() {
				echo error_message();
			}, 200, ['Content-type' => 'image/png']);
		}

		$twitter = new \TwitterAPIExchange($settings);
		$response = $twitter->setGetfield('?id=' . $id)->buildOauth('https://api.twitter.com/1.1/statuses/show.json', 'GET')->performRequest();   

		$response = json_decode($response, true);

		if(!isset($response['user']['name']))
		{
			return response()->stream(function() {
				echo error_message();
			}, 200, ['Content-type' => 'image/png']);
		}

		$info = [
			'name' => $response['user']['name'],
			'username' => $response['user']['screen_name'],
			'profile_image' => $response['user']['profile_image_url_https'],
			'content' => $response['text'],
			'retweets' => number_format_short($response['retweet_count'] + 1),
			'likes' => number_format_short($response['favorite_count']),
			'date' => date('M d, Y', strtotime($response['created_at'])),
			'comments' => 0,
		];

		putenv('GDFONTPATH=' . public_path() . '/generator/');
	
		$image  = imagecreatetruecolor(1400, 600);
		$black = imagecolorallocate($image, 0, 0, 0);
		imagecolortransparent($image, $black);
		
		$font_thin = public_path() . '/generator/HelveticaNeueLight.ttf';
		$font_regular = public_path() . '/generator/HelveticaNeue.ttf';
		$font_medium = public_path() . '/generator//HelveticaNeueMedium.ttf';
		$font_bold = public_path() . '/generator/HelveticaNeueBold.ttf';

		$blue = imagecolorallocate($image, 29, 161, 242);
		$green = imagecolorallocate($image, 23, 191, 99);
		$black = imagecolorallocate($image, 20, 23, 26);
		$grey = imagecolorallocate($image, 101, 119, 134);
		$light_grey = imagecolorallocate($image, 170, 184, 194);
		$extra_light_grey = imagecolorallocate($image, 225, 232, 237);
		$extra_extra_light_grey = imagecolorallocate($image, 245, 248, 250);
		$background = imagecolorallocate($image, 255, 255, 255);
		
		$content_length = mb_strlen($info['content']);
		$lines = ceil($content_length / 50);
	
		if(isset($info['image']))
		{
			$embedded_image = imagecreatefromjpeg($info['image']);
			$embedded_image = imagescale($embedded_image, 1300);
			$y = imagesy($embedded_image);
			$height = 280 + (70 * $lines) + $y + 50;
		}
		else
		{
			$height = 280 + (70 * $lines);
		}
		
		$image = imagescale($image, 1400, $height);
	
		imagefilledrectangle($image, 0, 0, 1400, $height, $background);
	
		$twitter_logo = imagecreatefrompng(public_path() . '/generator/twitter_logo.png');
		$twitter_logo = imagescale($twitter_logo, 100, 100);
		watermark($image, $twitter_logo);
	
		if(strpos($info['profile_image'], "normal") !== false)
		{
			$info['profile_image'] = str_replace("normal", "400x400", $info['profile_image']);
		}

		$img1 = imagecreatefromjpeg($info['profile_image']);
		$img1 = imagescale($img1, 100, 100);
		$x = imagesx($img1);
		$y = imagesy($img1);
		$img2 = imagecreatetruecolor($x, $y);
		$bg = imagecolorallocate($img2, 255, 255, 255);
		imagefill($img2, 0, 0, $bg);
		$e = imagecolorallocate($img2, 0, 0, 0);
		$r = $x <= $y ? $x : $y;
		imagefilledellipse ($img2, ($x / 2), ($y / 2), $r, $r, $e); 
		imagecolortransparent($img2, $e);
		imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);
		imagecolortransparent($img1, $bg);
		imagedestroy($img2);
		$profile_image = $img1;
		watermark($image, $profile_image, true);
	
		imagettftext($image, 28, 0, 160, 86, $black, $font_bold, $info['name']);
		// if(isset($info['verified']) && $info['verified'] === 'true')
		// {
		// 	$verified = imagecreatefrompng(public_path() . '/generator/twitter_verified.png');
		// 	$verified = imagescale($verified, 30, 30);
		// 	watermark($image, $verified, false, 160 + (18 * mb_strlen($info['name'])) + 10, 56);
		// }

		imagettftext($image, 20, 0, 160, 120, $grey, $font_thin, '@' . $info['username']);
		imagettftext($image, 40, 0, 50, 220, $black, $font_thin, wordwrap($info['content'], 50));
	
		// if(isset($info['image']) && !empty($info['image']))
		// {
		// 	$img1 = $embedded_image;
		// 	$x = imagesx($img1);
		// 	$y = imagesy($img1);
		// 	$img2 = imagecreatetruecolor($x, $y);
		// 	$bg = imagecolorallocate($img2, 255, 255, 255);
		// 	imagefill($img2, 0, 0, $bg);
		// 	$e = imagecolorallocate($img2, 0, 0, 0);
		// 	$r = $x <= $y ? $x : $y;
		// 	imagefilledellipse ($img2, 30, 30, 60, 60, $e);
		// 	imagefilledellipse ($img2, $x - 30, 30, 60, 60, $e);
		// 	imagefilledellipse ($img2, 30, $y - 30, 60, 60, $e);
		// 	imagefilledellipse ($img2, $x - 30, $y - 30, 60, 60, $e);
		// 	imagefilledrectangle ($img2, 30, 0, $x - 30, $y, $e);
		// 	imagefilledrectangle ($img2, 0, 30, $x, $y - 30, $e);
		// 	imagecolortransparent($img2, $e);
		// 	imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);
		// 	imagecolortransparent($img1, $bg);
		// 	imagedestroy($img2);
		// 	$embedded_image = $img1;
		// 	$y = imagesy($embedded_image);
		// 	watermark($image, $embedded_image, false, 50, $height - $y - 130);
		// 	imagedestroy($embedded_image);
		// }
	
		$comment = imagecreatefrompng(public_path() . '/generator/twitter_comment.png');
		$comment = imagescale($comment, 50, 50);
		watermark($image, $comment, false, 50, $height - 90);
		imagettftext($image, 32, 0, 110, $height - 50, $grey, $font_medium, $info['comments']);
		$retweet = imagecreatefrompng(public_path() . '/generator/twitter_retweet.png');
		$retweet = imagescale($retweet, 50, 50);
		watermark($image, $retweet, false, 280, $height - 90);
		imagettftext($image, 32, 0, 340, $height - 50, $green, $font_medium, $info['retweets']);
		$like = imagecreatefrompng(public_path() . '/generator/twitter_like.png');
		$like = imagescale($like, 50, 50);
		watermark($image, $like, false, 510, $height - 90);
		imagettftext($image, 32, 0, 580, $height - 50, $grey, $font_medium, $info['likes']);
	
		imagettftext($image, 32, 0, 1350 - (22 * mb_strlen($info['date'])), $height - 50, $grey, $font_bold, $info['date']);
		
		imagealphablending($image, false);
		ob_start();

		imagepng($image);

		$image_string = ob_get_contents();

		ob_end_clean();

		imagedestroy($image);
		imagedestroy($twitter_logo);
		imagedestroy($comment);
		imagedestroy($retweet);
		imagedestroy($like);

		return response()->stream(function() use ($image_string) {
			echo $image_string;
		}, 200, ['Content-type' => 'image/png']);
    }
}
