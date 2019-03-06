<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
			html,
			body {
				margin: 0;
				color: rgba(0,0,0,0.7);
				background-color: #e2dbd7;
				font-family: "PT Mono", monospace;
				font-size: 16px;
				-webkit-text-size-adjust: 100%;
				-webkit-overflow-scrolling: touch;
			}

			.info {
				margin-top: 0em;
			}

			header {
				padding: 40px;
				top: 0;
				right: 0;
				left: 0;
				margin-bottom: 40px;
				z-index: 1000;
				color: rgba(255, 255, 255, 0.7);
				background-color: #6f4e37;
				text-align: center;
			}

			#header-title {
				text-align: center;
			}

			#header-title a {
				color: rgba(0,0,0,0.7);
				text-decoration: none;
			}

			header h1 {
				margin-top: 0em;
				margin-bottom: 40px;
			}

			header a {
				color: rgba(255, 255, 255, 0.7);
				text-decoration: none;
			}

			header a:active {
				color: rgba(255, 255, 255, 0.2);
			}

			main {
				padding-left: 40px;
				padding-right: 40px;
			}

			table {
				width: 100%;
			}

			table td {
				width: 33.33%;
				max-width: 33.33%;
			}

			table td {
				padding-right: 20px !important;
			}

			.bx {
				vertical-align: middle;
				margin-top: -4px;
			}

			.grid img {
				max-width: 100%;
				height: auto;
				border-radius: 2px;
				display: block;
			}

			.section {
				margin-bottom: 40px;
			}

			.grid {
				clear: both;
				margin-bottom: 40px;
			}

			.grid-section h2 {
				margin-top: 20px;
			}

			.grid:after {
				content: "";
				display: table;
				clear: both;
			}

			.grid .grid-section {
				float: left;
				width: 100%;
				margin-bottom: 0px;
			}

			@media (min-width: 900px) {
				.grid {
					clear: both;
					margin-bottom: 40px;
				}
				.grid:after {
					content: "";
					display: table;
					clear: both;
				}
				.grid .grid-section {
					float: left;
					width: 50%;
					margin-bottom: 0px;
				}
				.grid.one .grid-section:not(last-child) p,
				.grid.one .grid-section:not(last-child) h2 {
					padding-left: 40px;
				}
				.grid.two .grid-section:first-child p,
				.grid.two .grid-section:first-child h2,
				.grid.two .grid-section:first-child form {
					padding-right: 40px;
				}
				.grid-section h2 {
					margin-top: 0px;
				}
			}

			::placeholder {
				color: #6f4e37;
			}

			:-ms-input-placeholder {
				color: #6f4e37;
			}

			::-ms-input-placeholder {
				color: #6f4e37;
			}

			input:focus,
			textarea:focus {
				outline: none;
			}

			a {
				border: 0;
				background-color: #6f4e37;
				color: rgba(255, 255, 255, 0.7);
				font-family: "PT Mono", monospace;
				cursor: pointer;
				font-size: 16px;
				outline: none;
				padding: 10px 20px;
				border-radius: 50px;
				box-sizing: border-box;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				-webkit-user-select: none;
				-moz-user-select: none;
				-ms-user-select: none;
				user-select: none;
				display: inline-block;
			}

			/* cyrillic-ext */
			@font-face {
			  font-family: 'PT Mono';
			  font-style: normal;
			  font-weight: 400;
			  src: local('PT Mono'), local('PTMono-Regular'), url(https://fonts.gstatic.com/s/ptmono/v6/9oRONYoBnWILk-9AnCIzM-Py.woff2) format('woff2');
			  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
			}
			/* cyrillic */
			@font-face {
			  font-family: 'PT Mono';
			  font-style: normal;
			  font-weight: 400;
			  src: local('PT Mono'), local('PTMono-Regular'), url(https://fonts.gstatic.com/s/ptmono/v6/9oRONYoBnWILk-9AnCszM-Py.woff2) format('woff2');
			  unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
			}
			/* latin-ext */
			@font-face {
			  font-family: 'PT Mono';
			  font-style: normal;
			  font-weight: 400;
			  src: local('PT Mono'), local('PTMono-Regular'), url(https://fonts.gstatic.com/s/ptmono/v6/9oRONYoBnWILk-9AnCEzM-Py.woff2) format('woff2');
			  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
			}
			/* latin */
			@font-face {
			  font-family: 'PT Mono';
			  font-style: normal;
			  font-weight: 400;
			  src: local('PT Mono'), local('PTMono-Regular'), url(https://fonts.gstatic.com/s/ptmono/v6/9oRONYoBnWILk-9AnC8zMw.woff2) format('woff2');
			  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
        </style>

        <style type="text/css">
			@font-face
			{
			    font-family: 'boxicons';
			    font-weight: normal;
			    font-style: normal;

			    src: url('../fonts/boxicons.eot');
			    src: url('../fonts/boxicons.eot') format('embedded-opentype'),
			    url('../fonts/boxicons.woff2') format('woff2'),
			    url('../fonts/boxicons.woff') format('woff'),
			    url('../fonts/boxicons.ttf') format('truetype'),
			    url('../fonts/boxicons.svg?#boxicons') format('svg');
			}
			.bx
			{
			    font-family: 'boxicons' !important;
			    font-weight: normal;
			    font-style: normal;
			    font-variant: normal;
			    line-height: 1;

			    display: inline-block;

			    text-transform: none;

			    speak: none;
			    -webkit-font-smoothing: antialiased;
			    -moz-osx-font-smoothing: grayscale;
			}
			.bx-ul
			{
			    margin-left: 2em;
			    padding-left: 0;

			    list-style: none;
			}
			.bx-ul > li
			{
			    position: relative;
			}
			.bx-ul .bx
			{
			    font-size: inherit;
			    line-height: inherit;

			    position: absolute;
			    left: -2em;

			    width: 2em;

			    text-align: center;
			}
			@-webkit-keyframes spin
			{
			    0%
			    {
			        -webkit-transform: rotate(0);
			                transform: rotate(0);
			    }
			    100%
			    {
			        -webkit-transform: rotate(359deg);
			                transform: rotate(359deg);
			    }
			}
			@keyframes spin
			{
			    0%
			    {
			        -webkit-transform: rotate(0);
			                transform: rotate(0);
			    }
			    100%
			    {
			        -webkit-transform: rotate(359deg);
			                transform: rotate(359deg);
			    }
			}
			@-webkit-keyframes burst
			{
			    0%
			    {
			        -webkit-transform: scale(1);
			                transform: scale(1);

			        opacity: 1;
			    }
			    90%
			    {
			        -webkit-transform: scale(1.5);
			                transform: scale(1.5);

			        opacity: 0;
			    }
			}
			@keyframes burst
			{
			    0%
			    {
			        -webkit-transform: scale(1);
			                transform: scale(1);

			        opacity: 1;
			    }
			    90%
			    {
			        -webkit-transform: scale(1.5);
			                transform: scale(1.5);

			        opacity: 0;
			    }
			}
			@-webkit-keyframes flashing
			{
			    0%
			    {
			        opacity: 1;
			    }
			    45%
			    {
			        opacity: 0;
			    }
			    90%
			    {
			        opacity: 1;
			    }
			}
			@keyframes flashing
			{
			    0%
			    {
			        opacity: 1;
			    }
			    45%
			    {
			        opacity: 0;
			    }
			    90%
			    {
			        opacity: 1;
			    }
			}
			@-webkit-keyframes fade-left
			{
			    0%
			    {
			        -webkit-transform: translateX(0);
			                transform: translateX(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateX(-20px);
			                transform: translateX(-20px);

			        opacity: 0;
			    }
			}
			@keyframes fade-left
			{
			    0%
			    {
			        -webkit-transform: translateX(0);
			                transform: translateX(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateX(-20px);
			                transform: translateX(-20px);

			        opacity: 0;
			    }
			}
			@-webkit-keyframes fade-right
			{
			    0%
			    {
			        -webkit-transform: translateX(0);
			                transform: translateX(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateX(20px);
			                transform: translateX(20px);

			        opacity: 0;
			    }
			}
			@keyframes fade-right
			{
			    0%
			    {
			        -webkit-transform: translateX(0);
			                transform: translateX(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateX(20px);
			                transform: translateX(20px);

			        opacity: 0;
			    }
			}
			@-webkit-keyframes fade-up
			{
			    0%
			    {
			        -webkit-transform: translateY(0);
			                transform: translateY(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateY(-20px);
			                transform: translateY(-20px);

			        opacity: 0;
			    }
			}
			@keyframes fade-up
			{
			    0%
			    {
			        -webkit-transform: translateY(0);
			                transform: translateY(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateY(-20px);
			                transform: translateY(-20px);

			        opacity: 0;
			    }
			}
			@-webkit-keyframes fade-down
			{
			    0%
			    {
			        -webkit-transform: translateY(0);
			                transform: translateY(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateY(20px);
			                transform: translateY(20px);

			        opacity: 0;
			    }
			}
			@keyframes fade-down
			{
			    0%
			    {
			        -webkit-transform: translateY(0);
			                transform: translateY(0);

			        opacity: 1;
			    }
			    75%
			    {
			        -webkit-transform: translateY(20px);
			                transform: translateY(20px);

			        opacity: 0;
			    }
			}
			@-webkit-keyframes tada
			{
			    from
			    {
			        -webkit-transform: scale3d(1, 1, 1);
			                transform: scale3d(1, 1, 1);
			    }

			    10%,
			    20%
			    {
			        -webkit-transform: scale3d(.95, .95, .95) rotate3d(0, 0, 1, -10deg);
			                transform: scale3d(.95, .95, .95) rotate3d(0, 0, 1, -10deg);
			    }

			    30%,
			    50%,
			    70%,
			    90%
			    {
			        -webkit-transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, 10deg);
			                transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, 10deg);
			    }

			    40%,
			    60%,
			    80%
			    {
			        -webkit-transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, -10deg);
			                transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, -10deg);
			    }

			    to
			    {
			        -webkit-transform: scale3d(1, 1, 1);
			                transform: scale3d(1, 1, 1);
			    }
			}

			@keyframes tada
			{
			    from
			    {
			        -webkit-transform: scale3d(1, 1, 1);
			                transform: scale3d(1, 1, 1);
			    }

			    10%,
			    20%
			    {
			        -webkit-transform: scale3d(.95, .95, .95) rotate3d(0, 0, 1, -10deg);
			                transform: scale3d(.95, .95, .95) rotate3d(0, 0, 1, -10deg);
			    }

			    30%,
			    50%,
			    70%,
			    90%
			    {
			        -webkit-transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, 10deg);
			                transform: scale3d(1, 1, 1) rotate3d(0, 0, 1, 10deg);
			    }

			    40%,
			    60%,
			    80%
			    {
			        -webkit-transform: rotate3d(0, 0, 1, -10deg);
			                transform: rotate3d(0, 0, 1, -10deg);
			    }

			    to
			    {
			        -webkit-transform: scale3d(1, 1, 1);
			                transform: scale3d(1, 1, 1);
			    }
			}
			.bx-spin
			{
			    -webkit-animation: spin 2s linear infinite;
			            animation: spin 2s linear infinite;
			}
			.bx-spin-hover:hover
			{
			    -webkit-animation: spin 2s linear infinite;
			            animation: spin 2s linear infinite;
			}

			.bx-tada
			{
			    -webkit-animation: tada 1.5s ease infinite;
			            animation: tada 1.5s ease infinite;
			}
			.bx-tada-hover:hover
			{
			    -webkit-animation: tada 1.5s ease infinite;
			            animation: tada 1.5s ease infinite;
			}

			.bx-flashing
			{
			    -webkit-animation: flashing 1.5s infinite linear;
			            animation: flashing 1.5s infinite linear;
			}
			.bx-flashing-hover:hover
			{
			    -webkit-animation: flashing 1.5s infinite linear;
			            animation: flashing 1.5s infinite linear;
			}

			.bx-burst
			{
			    -webkit-animation: burst 1.5s infinite linear;
			            animation: burst 1.5s infinite linear;
			}
			.bx-burst-hover:hover
			{
			    -webkit-animation: burst 1.5s infinite linear;
			            animation: burst 1.5s infinite linear;
			}
			.bx-fade-up
			{
			    -webkit-animation: fade-up 1.5s infinite linear;
			            animation: fade-up 1.5s infinite linear;
			}
			.bx-fade-up-hover:hover
			{
			    -webkit-animation: fade-up 1.5s infinite linear;
			            animation: fade-up 1.5s infinite linear;
			}
			.bx-fade-down
			{
			    -webkit-animation: fade-down 1.5s infinite linear;
			            animation: fade-down 1.5s infinite linear;
			}
			.bx-fade-down-hover:hover
			{
			    -webkit-animation: fade-down 1.5s infinite linear;
			            animation: fade-down 1.5s infinite linear;
			}
			.bx-fade-left
			{
			    -webkit-animation: fade-left 1.5s infinite linear;
			            animation: fade-left 1.5s infinite linear;
			}
			.bx-fade-left-hover:hover
			{
			    -webkit-animation: fade-left 1.5s infinite linear;
			            animation: fade-left 1.5s infinite linear;
			}
			.bx-fade-right
			{
			    -webkit-animation: fade-right 1.5s infinite linear;
			            animation: fade-right 1.5s infinite linear;
			}
			.bx-fade-right-hover:hover
			{
			    -webkit-animation: fade-right 1.5s infinite linear;
			            animation: fade-right 1.5s infinite linear;
			}
			.bx-xs
			{
			    font-size: 1rem!important;
			}
			.bx-sm
			{
			    font-size: 1.55rem!important;
			}
			.bx-md
			{
			    font-size: 2.25rem!important;
			}
			.bx-fw
			{
			    font-size: 1.2857142857em;
			    line-height: .8em;

			    width: 1.2857142857em;
			    height: .8em;
			    margin-top: -.2em!important;

			    vertical-align: middle;
			}

			.bx-lg
			{
			    font-size: 3.0rem!important;
			}
			.bx-pull-left
			{
			    float: left;

			    margin-right: .3em!important;
			}

			.bx-pull-right
			{
			    float: right;

			    margin-left: .3em!important;
			}
			.bx-rotate-90
			{
			    transform: rotate(90deg);

			    -ms-filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=1)';
			}
			.bx-rotate-180
			{
			    transform: rotate(180deg);

			    -ms-filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=2)';
			}
			.bx-rotate-270
			{
			    transform: rotate(270deg);

			    -ms-filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=3)';
			}
			.bx-flip-horizontal
			{
			    transform: scaleX(-1);

			    -ms-filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)';
			}
			.bx-flip-vertical
			{
			    transform: scaleY(-1);

			    -ms-filter: 'progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)';
			}
			.bx-border
			{
			    padding: .25em;

			    border: .07em solid rgba(0,0,0,.1);
			    border-radius: .25em;
			}
			.bx-border-circle
			{
			    padding: .25em;

			    border: .07em solid rgba(0,0,0,.1);
			    border-radius: 50%;
			}

			.bxs-t-shirt:before
			{
			    content: '\ea3e';
			}
			.bxl-500px:before
			{
			    content: '\e900';
			}
			.bxl-airbnb:before
			{
			    content: '\e901';
			}
			.bxl-amazon:before
			{
			    content: '\e902';
			}
			.bxl-android:before
			{
			    content: '\e903';
			}
			.bxl-angular:before
			{
			    content: '\e904';
			}
			.bxl-apple:before
			{
			    content: '\e905';
			}
			.bxl-baidu:before
			{
			    content: '\e906';
			}
			.bxl-behance:before
			{
			    content: '\e907';
			}
			.bxl-bing:before
			{
			    content: '\e908';
			}
			.bxl-bitcoin:before
			{
			    content: '\e909';
			}
			.bxl-blogger:before
			{
			    content: '\e90a';
			}
			.bxl-bootstrap:before
			{
			    content: '\e90b';
			}
			.bxl-chrome:before
			{
			    content: '\e90c';
			}
			.bxl-codepen:before
			{
			    content: '\e90d';
			}
			.bxl-creative-commons:before
			{
			    content: '\e90e';
			}
			.bxl-css3:before
			{
			    content: '\e90f';
			}
			.bxl-dailymotion:before
			{
			    content: '\e910';
			}
			.bxl-deviantart:before
			{
			    content: '\e911';
			}
			.bxl-digg:before
			{
			    content: '\e912';
			}
			.bxl-digitalocean:before
			{
			    content: '\e913';
			}
			.bxl-discord:before
			{
			    content: '\e914';
			}
			.bxl-discourse:before
			{
			    content: '\e915';
			}
			.bxl-dribbble:before
			{
			    content: '\e916';
			}
			.bxl-dropbox:before
			{
			    content: '\e917';
			}
			.bxl-drupal:before
			{
			    content: '\e918';
			}
			.bxl-ebay:before
			{
			    content: '\e919';
			}
			.bxl-edge:before
			{
			    content: '\e91a';
			}
			.bxl-facebook:before
			{
			    content: '\e91b';
			}
			.bxl-facebook-square:before
			{
			    content: '\e91c';
			}
			.bxl-firefox:before
			{
			    content: '\e91d';
			}
			.bxl-flickr:before
			{
			    content: '\e91e';
			}
			.bxl-flickr-square:before
			{
			    content: '\e91f';
			}
			.bxl-foursquare:before
			{
			    content: '\e920';
			}
			.bxl-git:before
			{
			    content: '\e921';
			}
			.bxl-github:before
			{
			    content: '\e922';
			}
			.bxl-google:before
			{
			    content: '\e923';
			}
			.bxl-google-plus:before
			{
			    content: '\e924';
			}
			.bxl-google-plus-circle:before
			{
			    content: '\e925';
			}
			.bxl-html5:before
			{
			    content: '\e926';
			}
			.bxl-instagram:before
			{
			    content: '\e927';
			}
			.bxl-internet-explorer:before
			{
			    content: '\e928';
			}
			.bxl-invision:before
			{
			    content: '\e929';
			}
			.bxl-javascript:before
			{
			    content: '\e92a';
			}
			.bxl-joomla:before
			{
			    content: '\e92b';
			}
			.bxl-jsfiddle:before
			{
			    content: '\e92c';
			}
			.bxl-kickstarter:before
			{
			    content: '\e92d';
			}
			.bxl-less:before
			{
			    content: '\e92e';
			}
			.bxl-linkedin:before
			{
			    content: '\e92f';
			}
			.bxl-linkedin-square:before
			{
			    content: '\e930';
			}
			.bxl-magento:before
			{
			    content: '\e931';
			}
			.bxl-mailchimp:before
			{
			    content: '\e932';
			}
			.bxl-mastercard:before
			{
			    content: '\e933';
			}
			.bxl-medium:before
			{
			    content: '\e934';
			}
			.bxl-medium-old:before
			{
			    content: '\e935';
			}
			.bxl-medium-square:before
			{
			    content: '\e936';
			}
			.bxl-messenger:before
			{
			    content: '\e937';
			}
			.bxl-microsoft:before
			{
			    content: '\e938';
			}
			.bxl-nodejs:before
			{
			    content: '\e939';
			}
			.bxl-opera:before
			{
			    content: '\e93a';
			}
			.bxl-paypal:before
			{
			    content: '\e93b';
			}
			.bxl-periscope:before
			{
			    content: '\e93c';
			}
			.bxl-pinterest:before
			{
			    content: '\e93d';
			}
			.bxl-play-store:before
			{
			    content: '\e93e';
			}
			.bxl-pocket:before
			{
			    content: '\e93f';
			}
			.bxl-product-hunt:before
			{
			    content: '\e940';
			}
			.bxl-quora:before
			{
			    content: '\e941';
			}
			.bxl-react:before
			{
			    content: '\e942';
			}
			.bxl-reddit:before
			{
			    content: '\e943';
			}
			.bxl-redux:before
			{
			    content: '\e944';
			}
			.bxl-sass:before
			{
			    content: '\e945';
			}
			.bxl-shopify:before
			{
			    content: '\e946';
			}
			.bxl-skype:before
			{
			    content: '\e947';
			}
			.bxl-slack:before
			{
			    content: '\e948';
			}
			.bxl-slack-old:before
			{
			    content: '\e949';
			}
			.bxl-snapchat:before
			{
			    content: '\e94a';
			}
			.bxl-soundcloud:before
			{
			    content: '\e94b';
			}
			.bxl-spotify:before
			{
			    content: '\e94c';
			}
			.bxl-squarespace:before
			{
			    content: '\e94d';
			}
			.bxl-stack-overflow:before
			{
			    content: '\e94e';
			}
			.bxl-stripe:before
			{
			    content: '\e94f';
			}
			.bxl-telegram:before
			{
			    content: '\e950';
			}
			.bxl-trello:before
			{
			    content: '\e951';
			}
			.bxl-tumblr:before
			{
			    content: '\e952';
			}
			.bxl-twitch:before
			{
			    content: '\e953';
			}
			.bxl-twitter:before
			{
			    content: '\e954';
			}
			.bxl-unsplash:before
			{
			    content: '\e955';
			}
			.bxl-vimeo:before
			{
			    content: '\e956';
			}
			.bxl-visa:before
			{
			    content: '\e957';
			}
			.bxl-vk:before
			{
			    content: '\e958';
			}
			.bxl-vuejs:before
			{
			    content: '\e959';
			}
			.bxl-whatsapp:before
			{
			    content: '\e95a';
			}
			.bxl-whatsapp-square:before
			{
			    content: '\e95b';
			}
			.bxl-wikipedia:before
			{
			    content: '\e95c';
			}
			.bxl-windows:before
			{
			    content: '\e95d';
			}
			.bxl-wix:before
			{
			    content: '\e95e';
			}
			.bxl-wordpress:before
			{
			    content: '\e95f';
			}
			.bxl-yahoo:before
			{
			    content: '\e960';
			}
			.bxl-yelp:before
			{
			    content: '\e961';
			}
			.bxl-youtube:before
			{
			    content: '\e962';
			}
			.bxs-adjust:before
			{
			    content: '\e963';
			}
			.bxs-album:before
			{
			    content: '\e964';
			}
			.bxs-ambulance:before
			{
			    content: '\e965';
			}
			.bxs-archive:before
			{
			    content: '\e966';
			}
			.bxs-area:before
			{
			    content: '\e967';
			}
			.bxs-award:before
			{
			    content: '\e968';
			}
			.bxs-badge:before
			{
			    content: '\e969';
			}
			.bxs-badge-check:before
			{
			    content: '\e96a';
			}
			.bxs-ball:before
			{
			    content: '\e96b';
			}
			.bxs-bar-chart-square:before
			{
			    content: '\e96c';
			}
			.bxs-barcode:before
			{
			    content: '\e96d';
			}
			.bxs-bath:before
			{
			    content: '\e96e';
			}
			.bxs-battery:before
			{
			    content: '\e96f';
			}
			.bxs-battery-charging:before
			{
			    content: '\e970';
			}
			.bxs-battery-full:before
			{
			    content: '\e971';
			}
			.bxs-battery-low:before
			{
			    content: '\e972';
			}
			.bxs-bed:before
			{
			    content: '\e973';
			}
			.bxs-bell:before
			{
			    content: '\e974';
			}
			.bxs-bell-off:before
			{
			    content: '\e975';
			}
			.bxs-bell-ring:before
			{
			    content: '\e976';
			}
			.bxs-bolt:before
			{
			    content: '\e977';
			}
			.bxs-book:before
			{
			    content: '\e978';
			}
			.bxs-book-bookmark:before
			{
			    content: '\e979';
			}
			.bxs-bookmark:before
			{
			    content: '\e97a';
			}
			.bxs-bookmark-plus:before
			{
			    content: '\e97b';
			}
			.bxs-bookmark-star:before
			{
			    content: '\e97c';
			}
			.bxs-book-open:before
			{
			    content: '\e97d';
			}
			.bxs-bot:before
			{
			    content: '\e97e';
			}
			.bxs-box:before
			{
			    content: '\e97f';
			}
			.bxs-briefcase:before
			{
			    content: '\e980';
			}
			.bxs-brush:before
			{
			    content: '\e981';
			}
			.bxs-bug:before
			{
			    content: '\e982';
			}
			.bxs-building:before
			{
			    content: '\e983';
			}
			.bxs-bulb:before
			{
			    content: '\e984';
			}
			.bxs-buoy:before
			{
			    content: '\e985';
			}
			.bxs-bus:before
			{
			    content: '\e986';
			}
			.bxs-calculator:before
			{
			    content: '\e987';
			}
			.bxs-camera:before
			{
			    content: '\e988';
			}
			.bxs-camera-off:before
			{
			    content: '\e989';
			}
			.bxs-capsule:before
			{
			    content: '\e98a';
			}
			.bxs-captions:before
			{
			    content: '\e98b';
			}
			.bxs-car:before
			{
			    content: '\e98c';
			}
			.bxs-card:before
			{
			    content: '\e98d';
			}
			.bxs-cart:before
			{
			    content: '\e98e';
			}
			.bxs-cart-alt:before
			{
			    content: '\e98f';
			}
			.bxs-categories:before
			{
			    content: '\e990';
			}
			.bxs-certification:before
			{
			    content: '\e991';
			}
			.bxs-chart:before
			{
			    content: '\e992';
			}
			.bxs-checkbox:before
			{
			    content: '\e993';
			}
			.bxs-checkbox-checked:before
			{
			    content: '\e994';
			}
			.bxs-check-circle:before
			{
			    content: '\e995';
			}
			.bxs-chip:before
			{
			    content: '\e996';
			}
			.bxs-cloud:before
			{
			    content: '\e997';
			}
			.bxs-cloud-download:before
			{
			    content: '\e998';
			}
			.bxs-cloud-upload:before
			{
			    content: '\e999';
			}
			.bxs-coffee:before
			{
			    content: '\e99a';
			}
			.bxs-coffee-alt:before
			{
			    content: '\e99b';
			}
			.bxs-cog:before
			{
			    content: '\e99c';
			}
			.bxs-collection:before
			{
			    content: '\e99d';
			}
			.bxs-color-fill:before
			{
			    content: '\e99e';
			}
			.bxs-contact:before
			{
			    content: '\e99f';
			}
			.bxs-conversation:before
			{
			    content: '\e9a0';
			}
			.bxs-copy:before
			{
			    content: '\e9a1';
			}
			.bxs-coupon:before
			{
			    content: '\e9a2';
			}
			.bxs-crown:before
			{
			    content: '\e9a3';
			}
			.bxs-cube:before
			{
			    content: '\e9a4';
			}
			.bxs-dashboard:before
			{
			    content: '\e9a5';
			}
			.bxs-detail:before
			{
			    content: '\e9a6';
			}
			.bxs-direction:before
			{
			    content: '\e9a7';
			}
			.bxs-directions:before
			{
			    content: '\e9a8';
			}
			.bxs-disc:before
			{
			    content: '\e9a9';
			}
			.bxs-discount:before
			{
			    content: '\e9aa';
			}
			.bxs-dislike:before
			{
			    content: '\e9ab';
			}
			.bxs-dock-bottom:before
			{
			    content: '\e9ac';
			}
			.bxs-dock-left:before
			{
			    content: '\e9ad';
			}
			.bxs-dock-right:before
			{
			    content: '\e9ae';
			}
			.bxs-dock-top:before
			{
			    content: '\e9af';
			}
			.bxs-dollar-circle:before
			{
			    content: '\e9b0';
			}
			.bxs-down-arrow-circle:before
			{
			    content: '\e9b1';
			}
			.bxs-down-arrow-square:before
			{
			    content: '\e9b2';
			}
			.bxs-download:before
			{
			    content: '\e9b3';
			}
			.bxs-downvote:before
			{
			    content: '\e9b4';
			}
			.bxs-drink:before
			{
			    content: '\e9b5';
			}
			.bxs-droplet:before
			{
			    content: '\e9b6';
			}
			.bxs-duplicate:before
			{
			    content: '\e9b7';
			}
			.bxs-edit:before
			{
			    content: '\e9b8';
			}
			.bxs-eject:before
			{
			    content: '\e9b9';
			}
			.bxs-envelope:before
			{
			    content: '\e9ba';
			}
			.bxs-eraser:before
			{
			    content: '\e9bb';
			}
			.bxs-error:before
			{
			    content: '\e9bc';
			}
			.bxs-error-circle:before
			{
			    content: '\e9bd';
			}
			.bxs-eyedropper:before
			{
			    content: '\e9be';
			}
			.bxs-factory:before
			{
			    content: '\e9bf';
			}
			.bxs-file:before
			{
			    content: '\e9c0';
			}
			.bxs-file-blank:before
			{
			    content: '\e9c1';
			}
			.bxs-file-image:before
			{
			    content: '\e9c2';
			}
			.bxs-file-plus:before
			{
			    content: '\e9c3';
			}
			.bxs-film:before
			{
			    content: '\e9c4';
			}
			.bxs-filter-alt:before
			{
			    content: '\e9c5';
			}
			.bxs-first-aid:before
			{
			    content: '\e9c6';
			}
			.bxs-flag:before
			{
			    content: '\e9c7';
			}
			.bxs-flag-alt:before
			{
			    content: '\e9c8';
			}
			.bxs-flame:before
			{
			    content: '\e9c9';
			}
			.bxs-flask:before
			{
			    content: '\e9ca';
			}
			.bxs-folder:before
			{
			    content: '\e9cb';
			}
			.bxs-folder-open:before
			{
			    content: '\e9cc';
			}
			.bxs-folder-plus:before
			{
			    content: '\e9cd';
			}
			.bxs-gas-pump:before
			{
			    content: '\e9ce';
			}
			.bxs-gift:before
			{
			    content: '\e9cf';
			}
			.bxs-grid-alt:before
			{
			    content: '\e9d0';
			}
			.bxs-group:before
			{
			    content: '\e9d1';
			}
			.bxs-hdd:before
			{
			    content: '\e9d2';
			}
			.bxs-heart:before
			{
			    content: '\e9d3';
			}
			.bxs-help-circle:before
			{
			    content: '\e9d4';
			}
			.bxs-hide:before
			{
			    content: '\e9d5';
			}
			.bxs-home:before
			{
			    content: '\e9d6';
			}
			.bxs-hot:before
			{
			    content: '\e9d7';
			}
			.bxs-hotel:before
			{
			    content: '\e9d8';
			}
			.bxs-hourglass:before
			{
			    content: '\e9d9';
			}
			.bxs-image:before
			{
			    content: '\e9da';
			}
			.bxs-image-alt:before
			{
			    content: '\e9db';
			}
			.bxs-inbox:before
			{
			    content: '\e9dc';
			}
			.bxs-info-circle:before
			{
			    content: '\e9dd';
			}
			.bxs-joystick:before
			{
			    content: '\e9de';
			}
			.bxs-joystick-alt:before
			{
			    content: '\e9df';
			}
			.bxs-joystick-button:before
			{
			    content: '\e9e0';
			}
			.bxs-key:before
			{
			    content: '\e9e1';
			}
			.bxs-keyboard:before
			{
			    content: '\e9e2';
			}
			.bxs-landmark:before
			{
			    content: '\e9e3';
			}
			.bxs-layer:before
			{
			    content: '\e9e4';
			}
			.bxs-left-arrow-circle:before
			{
			    content: '\e9e5';
			}
			.bxs-left-arrow-square:before
			{
			    content: '\e9e6';
			}
			.bxs-like:before
			{
			    content: '\e9e7';
			}
			.bxs-lock:before
			{
			    content: '\e9e8';
			}
			.bxs-lock-open:before
			{
			    content: '\e9e9';
			}
			.bxs-magic-wand:before
			{
			    content: '\e9ea';
			}
			.bxs-magnet:before
			{
			    content: '\e9eb';
			}
			.bxs-map:before
			{
			    content: '\e9ec';
			}
			.bxs-map-alt:before
			{
			    content: '\e9ed';
			}
			.bxs-megaphone:before
			{
			    content: '\e9ee';
			}
			.bxs-message:before
			{
			    content: '\e9ef';
			}
			.bxs-message-rounded:before
			{
			    content: '\e9f0';
			}
			.bxs-microphone:before
			{
			    content: '\e9f1';
			}
			.bxs-microphone-alt:before
			{
			    content: '\e9f2';
			}
			.bxs-microphone-off:before
			{
			    content: '\e9f3';
			}
			.bxs-minus-circle:before
			{
			    content: '\e9f4';
			}
			.bxs-minus-square:before
			{
			    content: '\e9f5';
			}
			.bxs-moon:before
			{
			    content: '\e9f6';
			}
			.bxs-mouse:before
			{
			    content: '\e9f7';
			}
			.bxs-movie:before
			{
			    content: '\e9f8';
			}
			.bxs-music:before
			{
			    content: '\e9f9';
			}
			.bxs-navigation:before
			{
			    content: '\e9fa';
			}
			.bxs-news:before
			{
			    content: '\e9fb';
			}
			.bxs-note:before
			{
			    content: '\e9fc';
			}
			.bxs-package:before
			{
			    content: '\e9fd';
			}
			.bxs-paper-plane:before
			{
			    content: '\e9fe';
			}
			.bxs-paste:before
			{
			    content: '\e9ff';
			}
			.bxs-pen:before
			{
			    content: '\ea00';
			}
			.bxs-pencil:before
			{
			    content: '\ea01';
			}
			.bxs-phone:before
			{
			    content: '\ea02';
			}
			.bxs-phone-call:before
			{
			    content: '\ea03';
			}
			.bxs-phone-incoming:before
			{
			    content: '\ea04';
			}
			.bxs-phone-outgoing:before
			{
			    content: '\ea05';
			}
			.bxs-photo-album:before
			{
			    content: '\ea06';
			}
			.bxs-pie-chart:before
			{
			    content: '\ea07';
			}
			.bxs-pin:before
			{
			    content: '\ea08';
			}
			.bxs-plane:before
			{
			    content: '\ea09';
			}
			.bxs-planet:before
			{
			    content: '\ea0a';
			}
			.bxs-playlist:before
			{
			    content: '\ea0b';
			}
			.bxs-plug:before
			{
			    content: '\ea0c';
			}
			.bxs-plus-circle:before
			{
			    content: '\ea0d';
			}
			.bxs-plus-square:before
			{
			    content: '\ea0e';
			}
			.bxs-printer:before
			{
			    content: '\ea0f';
			}
			.bxs-purchase-tag:before
			{
			    content: '\ea10';
			}
			.bxs-quote-left:before
			{
			    content: '\ea11';
			}
			.bxs-quote-right:before
			{
			    content: '\ea12';
			}
			.bxs-radio:before
			{
			    content: '\ea13';
			}
			.bxs-rename:before
			{
			    content: '\ea14';
			}
			.bxs-report:before
			{
			    content: '\ea15';
			}
			.bxs-right-arrow-circle:before
			{
			    content: '\ea16';
			}
			.bxs-right-arrow-square:before
			{
			    content: '\ea17';
			}
			.bxs-rocket:before
			{
			    content: '\ea18';
			}
			.bxs-ruler:before
			{
			    content: '\ea19';
			}
			.bxs-save:before
			{
			    content: '\ea1a';
			}
			.bxs-select-multiple:before
			{
			    content: '\ea1b';
			}
			.bxs-send:before
			{
			    content: '\ea1c';
			}
			.bxs-server:before
			{
			    content: '\ea1d';
			}
			.bxs-share:before
			{
			    content: '\ea1e';
			}
			.bxs-share-alt:before
			{
			    content: '\ea1f';
			}
			.bxs-shield:before
			{
			    content: '\ea20';
			}
			.bxs-ship:before
			{
			    content: '\ea21';
			}
			.bxs-shopping-bag:before
			{
			    content: '\ea22';
			}
			.bxs-shopping-bag-alt:before
			{
			    content: '\ea23';
			}
			.bxs-show:before
			{
			    content: '\ea24';
			}
			.bxs-skull:before
			{
			    content: '\ea25';
			}
			.bxs-smiley-happy:before
			{
			    content: '\ea26';
			}
			.bxs-smiley-meh:before
			{
			    content: '\ea27';
			}
			.bxs-smiley-sad:before
			{
			    content: '\ea28';
			}
			.bxs-sort-alt:before
			{
			    content: '\ea29';
			}
			.bxs-spreadsheet:before
			{
			    content: '\ea2a';
			}
			.bxs-star:before
			{
			    content: '\ea2b';
			}
			.bxs-star-half:before
			{
			    content: '\ea2c';
			}
			.bxs-sun:before
			{
			    content: '\ea2d';
			}
			.bxs-tag:before
			{
			    content: '\ea2e';
			}
			.bxs-tag-x:before
			{
			    content: '\ea2f';
			}
			.bxs-taxi:before
			{
			    content: '\ea30';
			}
			.bxs-tennis-ball:before
			{
			    content: '\ea31';
			}
			.bxs-terminal:before
			{
			    content: '\ea32';
			}
			.bxs-thermometer:before
			{
			    content: '\ea33';
			}
			.bxs-toggle-left:before
			{
			    content: '\ea34';
			}
			.bxs-toggle-right:before
			{
			    content: '\ea35';
			}
			.bxs-torch:before
			{
			    content: '\ea36';
			}
			.bxs-to-top:before
			{
			    content: '\ea37';
			}
			.bxs-train:before
			{
			    content: '\ea38';
			}
			.bxs-trash:before
			{
			    content: '\ea39';
			}
			.bxs-trash-alt:before
			{
			    content: '\ea3a';
			}
			.bxs-tree:before
			{
			    content: '\ea3b';
			}
			.bxs-trophy:before
			{
			    content: '\ea3c';
			}
			.bxs-truck:before
			{
			    content: '\ea3d';
			}
			.bxs-up-arrow-circle:before
			{
			    content: '\ea3f';
			}
			.bxs-up-arrow-square:before
			{
			    content: '\ea40';
			}
			.bxs-upvote:before
			{
			    content: '\ea41';
			}
			.bxs-user:before
			{
			    content: '\ea42';
			}
			.bxs-user-badge:before
			{
			    content: '\ea43';
			}
			.bxs-user-circle:before
			{
			    content: '\ea44';
			}
			.bxs-user-detail:before
			{
			    content: '\ea45';
			}
			.bxs-user-minus:before
			{
			    content: '\ea46';
			}
			.bxs-user-plus:before
			{
			    content: '\ea47';
			}
			.bxs-user-rectangle:before
			{
			    content: '\ea48';
			}
			.bxs-video:before
			{
			    content: '\ea49';
			}
			.bxs-video-off:before
			{
			    content: '\ea4a';
			}
			.bxs-video-plus:before
			{
			    content: '\ea4b';
			}
			.bxs-videos:before
			{
			    content: '\ea4c';
			}
			.bxs-volume:before
			{
			    content: '\ea4d';
			}
			.bxs-volume-full:before
			{
			    content: '\ea4e';
			}
			.bxs-volume-low:before
			{
			    content: '\ea4f';
			}
			.bxs-volume-mute:before
			{
			    content: '\ea50';
			}
			.bxs-wallet:before
			{
			    content: '\ea51';
			}
			.bxs-watch:before
			{
			    content: '\ea52';
			}
			.bxs-watch-alt:before
			{
			    content: '\ea53';
			}
			.bxs-widget:before
			{
			    content: '\ea54';
			}
			.bxs-wrench:before
			{
			    content: '\ea55';
			}
			.bxs-x-circle:before
			{
			    content: '\ea56';
			}
			.bxs-x-square:before
			{
			    content: '\ea57';
			}
			.bxs-yin-yang:before
			{
			    content: '\ea58';
			}
			.bxs-zap:before
			{
			    content: '\ea59';
			}
			.bx-alarm:before
			{
			    content: '\ea5a';
			}
			.bx-alarm-off:before
			{
			    content: '\ea5b';
			}
			.bx-align-justify:before
			{
			    content: '\ea5c';
			}
			.bx-align-left:before
			{
			    content: '\ea5d';
			}
			.bx-align-middle:before
			{
			    content: '\ea5e';
			}
			.bx-align-right:before
			{
			    content: '\ea5f';
			}
			.bx-analyse:before
			{
			    content: '\ea60';
			}
			.bx-anchor:before
			{
			    content: '\ea61';
			}
			.bx-aperture:before
			{
			    content: '\ea62';
			}
			.bx-area:before
			{
			    content: '\ea63';
			}
			.bx-arrow-back:before
			{
			    content: '\ea64';
			}
			.bx-at:before
			{
			    content: '\ea65';
			}
			.bx-award:before
			{
			    content: '\ea66';
			}
			.bx-bar-chart:before
			{
			    content: '\ea67';
			}
			.bx-bar-chart-square:before
			{
			    content: '\ea68';
			}
			.bx-basketball:before
			{
			    content: '\ea69';
			}
			.bx-bath:before
			{
			    content: '\ea6a';
			}
			.bx-battery:before
			{
			    content: '\ea6b';
			}
			.bx-bed:before
			{
			    content: '\ea6c';
			}
			.bx-bell:before
			{
			    content: '\ea6d';
			}
			.bx-bell-off:before
			{
			    content: '\ea6e';
			}
			.bx-bicycle:before
			{
			    content: '\ea6f';
			}
			.bx-block:before
			{
			    content: '\ea70';
			}
			.bx-bluetooth:before
			{
			    content: '\ea71';
			}
			.bx-body:before
			{
			    content: '\ea72';
			}
			.bx-bold:before
			{
			    content: '\ea73';
			}
			.bx-bookmark:before
			{
			    content: '\ea74';
			}
			.bx-bookmark-plus:before
			{
			    content: '\ea75';
			}
			.bx-broadcast:before
			{
			    content: '\ea76';
			}
			.bx-bulb:before
			{
			    content: '\ea77';
			}
			.bx-bullseye:before
			{
			    content: '\ea78';
			}
			.bx-calendar:before
			{
			    content: '\ea79';
			}
			.bx-calendar-check:before
			{
			    content: '\ea7a';
			}
			.bx-calendar-event:before
			{
			    content: '\ea7b';
			}
			.bx-calendar-minus:before
			{
			    content: '\ea7c';
			}
			.bx-calendar-plus:before
			{
			    content: '\ea7d';
			}
			.bx-calendar-x:before
			{
			    content: '\ea7e';
			}
			.bx-camera:before
			{
			    content: '\ea7f';
			}
			.bx-camera-off:before
			{
			    content: '\ea80';
			}
			.bx-captions:before
			{
			    content: '\ea81';
			}
			.bx-card:before
			{
			    content: '\ea82';
			}
			.bx-caret-down:before
			{
			    content: '\ea83';
			}
			.bx-caret-left:before
			{
			    content: '\ea84';
			}
			.bx-caret-right:before
			{
			    content: '\ea85';
			}
			.bx-caret-up:before
			{
			    content: '\ea86';
			}
			.bx-carousel:before
			{
			    content: '\ea87';
			}
			.bx-cart:before
			{
			    content: '\ea88';
			}
			.bx-cart-alt:before
			{
			    content: '\ea89';
			}
			.bx-cast:before
			{
			    content: '\ea8a';
			}
			.bx-chalkboard:before
			{
			    content: '\ea8b';
			}
			.bx-chart:before
			{
			    content: '\ea8c';
			}
			.bx-check:before
			{
			    content: '\ea8d';
			}
			.bx-check-circle:before
			{
			    content: '\ea8e';
			}
			.bx-check-double:before
			{
			    content: '\ea8f';
			}
			.bx-chevron-down:before
			{
			    content: '\ea90';
			}
			.bx-chevron-left:before
			{
			    content: '\ea91';
			}
			.bx-chevron-right:before
			{
			    content: '\ea92';
			}
			.bx-chevron-up:before
			{
			    content: '\ea93';
			}
			.bx-circle:before
			{
			    content: '\ea94';
			}
			.bx-clipboard:before
			{
			    content: '\ea95';
			}
			.bx-closet:before
			{
			    content: '\ea96';
			}
			.bx-cloud-drizzle:before
			{
			    content: '\ea97';
			}
			.bx-cloud-lightning:before
			{
			    content: '\ea98';
			}
			.bx-cloud-light-rain:before
			{
			    content: '\ea99';
			}
			.bx-cloud-rain:before
			{
			    content: '\ea9a';
			}
			.bx-cloud-snow:before
			{
			    content: '\ea9b';
			}
			.bx-code:before
			{
			    content: '\ea9c';
			}
			.bx-code-block:before
			{
			    content: '\ea9d';
			}
			.bx-code-curly:before
			{
			    content: '\ea9e';
			}
			.bx-coffee:before
			{
			    content: '\ea9f';
			}
			.bx-cog:before
			{
			    content: '\eaa0';
			}
			.bx-collapse:before
			{
			    content: '\eaa1';
			}
			.bx-collection:before
			{
			    content: '\eaa2';
			}
			.bx-columns:before
			{
			    content: '\eaa3';
			}
			.bx-command:before
			{
			    content: '\eaa4';
			}
			.bx-compass:before
			{
			    content: '\eaa5';
			}
			.bx-copy:before
			{
			    content: '\eaa6';
			}
			.bx-credit-card:before
			{
			    content: '\eaa7';
			}
			.bx-crop:before
			{
			    content: '\eaa8';
			}
			.bx-crosshair:before
			{
			    content: '\eaa9';
			}
			.bx-crown:before
			{
			    content: '\eaaa';
			}
			.bx-cube:before
			{
			    content: '\eaab';
			}
			.bx-cut:before
			{
			    content: '\eaac';
			}
			.bx-dashboard:before
			{
			    content: '\eaad';
			}
			.bx-data:before
			{
			    content: '\eaae';
			}
			.bx-desktop:before
			{
			    content: '\eaaf';
			}
			.bx-dialpad:before
			{
			    content: '\eab0';
			}
			.bx-diamond:before
			{
			    content: '\eab1';
			}
			.bx-dislike:before
			{
			    content: '\eab2';
			}
			.bx-dollar:before
			{
			    content: '\eab3';
			}
			.bx-dots-horizontal:before
			{
			    content: '\eab4';
			}
			.bx-dots-horizontal-rounded:before
			{
			    content: '\eab5';
			}
			.bx-dots-vertical:before
			{
			    content: '\eab6';
			}
			.bx-dots-vertical-rounded:before
			{
			    content: '\eab7';
			}
			.bx-down-arrow:before
			{
			    content: '\eab8';
			}
			.bx-down-arrow-circle:before
			{
			    content: '\eab9';
			}
			.bx-download:before
			{
			    content: '\eaba';
			}
			.bx-downvote:before
			{
			    content: '\eabb';
			}
			.bx-dumbbell:before
			{
			    content: '\eabc';
			}
			.bx-duplicate:before
			{
			    content: '\eabd';
			}
			.bx-envelope:before
			{
			    content: '\eabe';
			}
			.bx-equalizer:before
			{
			    content: '\eabf';
			}
			.bx-error:before
			{
			    content: '\eac0';
			}
			.bx-error-circle:before
			{
			    content: '\eac1';
			}
			.bx-exit-fullscreen:before
			{
			    content: '\eac2';
			}
			.bx-expand:before
			{
			    content: '\eac3';
			}
			.bx-export:before
			{
			    content: '\eac4';
			}
			.bx-fast-forward:before
			{
			    content: '\eac5';
			}
			.bx-female:before
			{
			    content: '\eac6';
			}
			.bx-file:before
			{
			    content: '\eac7';
			}
			.bx-file-blank:before
			{
			    content: '\eac8';
			}
			.bx-film:before
			{
			    content: '\eac9';
			}
			.bx-filter:before
			{
			    content: '\eaca';
			}
			.bx-fingerprint:before
			{
			    content: '\eacb';
			}
			.bx-first-page:before
			{
			    content: '\eacc';
			}
			.bx-flag:before
			{
			    content: '\eacd';
			}
			.bx-folder:before
			{
			    content: '\eace';
			}
			.bx-folder-plus:before
			{
			    content: '\eacf';
			}
			.bx-font:before
			{
			    content: '\ead0';
			}
			.bx-font-color:before
			{
			    content: '\ead1';
			}
			.bx-font-family:before
			{
			    content: '\ead2';
			}
			.bx-font-size:before
			{
			    content: '\ead3';
			}
			.bx-football:before
			{
			    content: '\ead4';
			}
			.bx-fullscreen:before
			{
			    content: '\ead5';
			}
			.bx-gift:before
			{
			    content: '\ead6';
			}
			.bx-git-branch:before
			{
			    content: '\ead7';
			}
			.bx-git-commit:before
			{
			    content: '\ead8';
			}
			.bx-git-compare:before
			{
			    content: '\ead9';
			}
			.bx-git-merge:before
			{
			    content: '\eada';
			}
			.bx-git-pull-request:before
			{
			    content: '\eadb';
			}
			.bx-git-repo-forked:before
			{
			    content: '\eadc';
			}
			.bx-globe:before
			{
			    content: '\eadd';
			}
			.bx-globe-alt:before
			{
			    content: '\eade';
			}
			.bx-grid:before
			{
			    content: '\eadf';
			}
			.bx-grid-alt:before
			{
			    content: '\eae0';
			}
			.bx-grid-horizontal:before
			{
			    content: '\eae1';
			}
			.bx-grid-small:before
			{
			    content: '\eae2';
			}
			.bx-grid-vertical:before
			{
			    content: '\eae3';
			}
			.bx-handicap:before
			{
			    content: '\eae4';
			}
			.bx-hash:before
			{
			    content: '\eae5';
			}
			.bx-heading:before
			{
			    content: '\eae6';
			}
			.bx-headphone:before
			{
			    content: '\eae7';
			}
			.bx-heart:before
			{
			    content: '\eae8';
			}
			.bx-help-circle:before
			{
			    content: '\eae9';
			}
			.bx-highlight:before
			{
			    content: '\eaea';
			}
			.bx-history:before
			{
			    content: '\eaeb';
			}
			.bx-home:before
			{
			    content: '\eaec';
			}
			.bx-hourglass:before
			{
			    content: '\eaed';
			}
			.bx-id-card:before
			{
			    content: '\eaee';
			}
			.bx-image:before
			{
			    content: '\eaef';
			}
			.bx-images:before
			{
			    content: '\eaf0';
			}
			.bx-import:before
			{
			    content: '\eaf1';
			}
			.bx-infinite:before
			{
			    content: '\eaf2';
			}
			.bx-info-circle:before
			{
			    content: '\eaf3';
			}
			.bx-italic:before
			{
			    content: '\eaf4';
			}
			.bx-key:before
			{
			    content: '\eaf5';
			}
			.bx-laptop:before
			{
			    content: '\eaf6';
			}
			.bx-last-page:before
			{
			    content: '\eaf7';
			}
			.bx-layer:before
			{
			    content: '\eaf8';
			}
			.bx-layout:before
			{
			    content: '\eaf9';
			}
			.bx-left-arrow:before
			{
			    content: '\eafa';
			}
			.bx-left-arrow-circle:before
			{
			    content: '\eafb';
			}
			.bx-left-indent:before
			{
			    content: '\eafc';
			}
			.bx-like:before
			{
			    content: '\eafd';
			}
			.bx-link:before
			{
			    content: '\eafe';
			}
			.bx-link-external:before
			{
			    content: '\eaff';
			}
			.bx-list:before
			{
			    content: '\eb00';
			}
			.bx-list-check:before
			{
			    content: '\eb01';
			}
			.bx-list-ol:before
			{
			    content: '\eb02';
			}
			.bx-list-plus:before
			{
			    content: '\eb03';
			}
			.bx-list-ul:before
			{
			    content: '\eb04';
			}
			.bx-list-x:before
			{
			    content: '\eb05';
			}
			.bx-loader:before
			{
			    content: '\eb06';
			}
			.bx-loader-alt:before
			{
			    content: '\eb07';
			}
			.bx-loader-circle:before
			{
			    content: '\eb08';
			}
			.bx-log-in:before
			{
			    content: '\eb09';
			}
			.bx-log-out:before
			{
			    content: '\eb0a';
			}
			.bx-male:before
			{
			    content: '\eb0b';
			}
			.bx-menu:before
			{
			    content: '\eb0c';
			}
			.bx-menu-alt-left:before
			{
			    content: '\eb0d';
			}
			.bx-menu-alt-right:before
			{
			    content: '\eb0e';
			}
			.bx-microphone:before
			{
			    content: '\eb0f';
			}
			.bx-microphone-off:before
			{
			    content: '\eb10';
			}
			.bx-minus:before
			{
			    content: '\eb11';
			}
			.bx-minus-circle:before
			{
			    content: '\eb12';
			}
			.bx-mobile:before
			{
			    content: '\eb13';
			}
			.bx-moon:before
			{
			    content: '\eb14';
			}
			.bx-mouse:before
			{
			    content: '\eb15';
			}
			.bx-move:before
			{
			    content: '\eb16';
			}
			.bx-move-horizontal:before
			{
			    content: '\eb17';
			}
			.bx-move-vertical:before
			{
			    content: '\eb18';
			}
			.bx-music:before
			{
			    content: '\eb19';
			}
			.bx-navigation:before
			{
			    content: '\eb1a';
			}
			.bx-note:before
			{
			    content: '\eb1b';
			}
			.bx-notification:before
			{
			    content: '\eb1c';
			}
			.bx-notification-off:before
			{
			    content: '\eb1d';
			}
			.bx-paint:before
			{
			    content: '\eb1e';
			}
			.bx-paperclip:before
			{
			    content: '\eb1f';
			}
			.bx-paper-plane:before
			{
			    content: '\eb20';
			}
			.bx-paragraph:before
			{
			    content: '\eb21';
			}
			.bx-paste:before
			{
			    content: '\eb22';
			}
			.bx-pause:before
			{
			    content: '\eb23';
			}
			.bx-pen:before
			{
			    content: '\eb24';
			}
			.bx-pin:before
			{
			    content: '\eb25';
			}
			.bx-play:before
			{
			    content: '\eb26';
			}
			.bx-plus:before
			{
			    content: '\eb27';
			}
			.bx-plus-circle:before
			{
			    content: '\eb28';
			}
			.bx-poll:before
			{
			    content: '\eb29';
			}
			.bx-power-off:before
			{
			    content: '\eb2a';
			}
			.bx-pulse:before
			{
			    content: '\eb2b';
			}
			.bx-question-mark:before
			{
			    content: '\eb2c';
			}
			.bx-radar:before
			{
			    content: '\eb2d';
			}
			.bx-radio-circle:before
			{
			    content: '\eb2e';
			}
			.bx-radio-circle-marked:before
			{
			    content: '\eb2f';
			}
			.bx-rectangle:before
			{
			    content: '\eb30';
			}
			.bx-redo:before
			{
			    content: '\eb31';
			}
			.bx-repeat:before
			{
			    content: '\eb32';
			}
			.bx-reply:before
			{
			    content: '\eb33';
			}
			.bx-reply-all:before
			{
			    content: '\eb34';
			}
			.bx-repost:before
			{
			    content: '\eb35';
			}
			.bx-reset:before
			{
			    content: '\eb36';
			}
			.bx-restaurant:before
			{
			    content: '\eb37';
			}
			.bx-revision:before
			{
			    content: '\eb38';
			}
			.bx-rewind:before
			{
			    content: '\eb39';
			}
			.bx-right-arrow:before
			{
			    content: '\eb3a';
			}
			.bx-right-arrow-circle:before
			{
			    content: '\eb3b';
			}
			.bx-right-indent:before
			{
			    content: '\eb3c';
			}
			.bx-rotate-left:before
			{
			    content: '\eb3d';
			}
			.bx-rotate-right:before
			{
			    content: '\eb3e';
			}
			.bx-rss:before
			{
			    content: '\eb3f';
			}
			.bx-ruler:before
			{
			    content: '\eb40';
			}
			.bx-screenshot:before
			{
			    content: '\eb41';
			}
			.bx-search:before
			{
			    content: '\eb42';
			}
			.bx-search-alt:before
			{
			    content: '\eb43';
			}
			.bx-selection:before
			{
			    content: '\eb44';
			}
			.bx-select-multiple:before
			{
			    content: '\eb45';
			}
			.bx-send:before
			{
			    content: '\eb46';
			}
			.bx-shield:before
			{
			    content: '\eb47';
			}
			.bx-shopping-bag:before
			{
			    content: '\eb48';
			}
			.bx-shuffle:before
			{
			    content: '\eb49';
			}
			.bx-sidebar:before
			{
			    content: '\eb4a';
			}
			.bx-sitemap:before
			{
			    content: '\eb4b';
			}
			.bx-skip-next:before
			{
			    content: '\eb4c';
			}
			.bx-skip-previous:before
			{
			    content: '\eb4d';
			}
			.bx-slider:before
			{
			    content: '\eb4e';
			}
			.bx-slider-alt:before
			{
			    content: '\eb4f';
			}
			.bx-sort:before
			{
			    content: '\eb50';
			}
			.bx-sort-down:before
			{
			    content: '\eb51';
			}
			.bx-sort-up:before
			{
			    content: '\eb52';
			}
			.bx-star:before
			{
			    content: '\eb53';
			}
			.bx-station:before
			{
			    content: '\eb54';
			}
			.bx-stats:before
			{
			    content: '\eb55';
			}
			.bx-stop:before
			{
			    content: '\eb56';
			}
			.bx-stopwatch:before
			{
			    content: '\eb57';
			}
			.bx-store:before
			{
			    content: '\eb58';
			}
			.bx-strikethrough:before
			{
			    content: '\eb59';
			}
			.bx-subdirectory-left:before
			{
			    content: '\eb5a';
			}
			.bx-subdirectory-right:before
			{
			    content: '\eb5b';
			}
			.bx-sun:before
			{
			    content: '\eb5c';
			}
			.bx-support:before
			{
			    content: '\eb5d';
			}
			.bx-sync:before
			{
			    content: '\eb5e';
			}
			.bx-tab:before
			{
			    content: '\eb5f';
			}
			.bx-table:before
			{
			    content: '\eb60';
			}
			.bx-tag:before
			{
			    content: '\eb61';
			}
			.bx-target-lock:before
			{
			    content: '\eb62';
			}
			.bx-task:before
			{
			    content: '\eb63';
			}
			.bx-test-tube:before
			{
			    content: '\eb64';
			}
			.bx-text:before
			{
			    content: '\eb65';
			}
			.bx-time:before
			{
			    content: '\eb66';
			}
			.bx-timer:before
			{
			    content: '\eb67';
			}
			.bx-transfer:before
			{
			    content: '\eb68';
			}
			.bx-trash-alt:before
			{
			    content: '\eb69';
			}
			.bx-trending-down:before
			{
			    content: '\eb6a';
			}
			.bx-trending-up:before
			{
			    content: '\eb6b';
			}
			.bx-tv:before
			{
			    content: '\eb6c';
			}
			.bx-underline:before
			{
			    content: '\eb6d';
			}
			.bx-undo:before
			{
			    content: '\eb6e';
			}
			.bx-unlink:before
			{
			    content: '\eb6f';
			}
			.bx-up-arrow:before
			{
			    content: '\eb70';
			}
			.bx-up-arrow-circle:before
			{
			    content: '\eb71';
			}
			.bx-upload:before
			{
			    content: '\eb72';
			}
			.bx-upvote:before
			{
			    content: '\eb73';
			}
			.bx-usb:before
			{
			    content: '\eb74';
			}
			.bx-video:before
			{
			    content: '\eb75';
			}
			.bx-video-off:before
			{
			    content: '\eb76';
			}
			.bx-video-plus:before
			{
			    content: '\eb77';
			}
			.bx-voicemail:before
			{
			    content: '\eb78';
			}
			.bx-volume:before
			{
			    content: '\eb79';
			}
			.bx-volume-full:before
			{
			    content: '\eb7a';
			}
			.bx-volume-low:before
			{
			    content: '\eb7b';
			}
			.bx-volume-mute:before
			{
			    content: '\eb7c';
			}
			.bx-walk:before
			{
			    content: '\eb7d';
			}
			.bx-wallet:before
			{
			    content: '\eb7e';
			}
			.bx-water:before
			{
			    content: '\eb7f';
			}
			.bx-wifi:before
			{
			    content: '\eb80';
			}
			.bx-wind:before
			{
			    content: '\eb81';
			}
			.bx-window:before
			{
			    content: '\eb82';
			}
			.bx-window-close:before
			{
			    content: '\eb83';
			}
			.bx-window-open:before
			{
			    content: '\eb84';
			}
			.bx-windows:before
			{
			    content: '\eb85';
			}
			.bx-world:before
			{
			    content: '\eb86';
			}
			.bx-wrench:before
			{
			    content: '\eb87';
			}
			.bx-x:before
			{
			    content: '\eb88';
			}
			.bx-x-circle:before
			{
			    content: '\eb89';
			}
			.bx-zoom-in:before
			{
			    content: '\eb8a';
			}
			.bx-zoom-out:before
			{
			    content: '\eb8b';
			}
        </style>
    </head>
    <body>
        <div id="header-title"><h1><a href="#"><i class="bx bxs-coffee"></i><br>Print My Tweets</a></h1></div>
        <main>
            <div class="grid two">
            	<p>
            		Hey,

            		Your order is being processed, your order id is <a href="{{ route('order', ['id' => $order['id']]) }}">#{{ $order['id'] }}</a>. We'll let you know when it ships!

            		Thank you,
            		Print My Tweets Team
            	</p>
            </div>
        </main>
        <br>
    </body>
</html>