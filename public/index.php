<?php

require_once __DIR__ . '/../src/bootstrap.php';

use transloadit\Transloadit;

$transloadit = new Transloadit([ 'key' => TRANSLOADIT_KEY,
                                 'secret' => TRANSLOADIT_SECRET]);

$response = Transloadit::response();
if ($response) {
    echo '<h1>Assembly status:</h1>';
    echo '<pre>';
    print_r($response);
    echo '</pre>';
    exit;
}

$redirectUrl = sprintf(
    'http://%s%s',
    $_SERVER['HTTP_HOST'],
    $_SERVER['REQUEST_URI']
);

echo $transloadit->createAssemblyForm([
    'params' => [
        'steps' => [
            'resize' => [
                'robot' => '/image/resize',
                'width' => 200,
                'height' => 100,
            ],
            'store' => [
                'robot' => '/s3/store',
                'key' => S3_KEY,
                'secret' => S3_SECRET,
                'bucket' => S3_BUCKET,
            ]

    ],
    'redirect_url' => $redirectUrl
    ]
]);

?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
var tlProtocol = (('https:' == document.location.protocol) ? 'https://' : 'http://');
document.write(unescape("%3Cscript src='" + tlProtocol + "assets.transloadit.com/js/jquery.transloadit2.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('form').transloadit();
    });
</script>

<h1>Pick an image to resize</h1>
<input name="example_upload" type="file">
<input type="submit" value="Upload">
</form>