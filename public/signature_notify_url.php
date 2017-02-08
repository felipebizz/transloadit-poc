<?php

require_once __DIR__ . '/../src/bootstrap.php';

$authKey     = TRANSLOADIT_KEY;
$authSecret  = TRANSLOADIT_SECRET;
$time        = gmdate('Y/m/d H:i:s+00:00', strtotime('+1 hour'));
$template_id = TRANSLOADIT_TEMPLATE;
$notify_url  = TRANSLOADIT_NOTIFY;

$params = [
  'auth' => array(
    'key'     => $authKey,
    'expires' => $time
  ),
  'template_id'  => $template_id
];

$signature = hash_hmac('sha1', json_encode($params), $authSecret);

$form_params = htmlentities(json_encode($params));
?>
<html>
    <head>
    <title>Transloadit Signature</title>
    </head>
<body>

    <form id="upload-form" enctype="multipart/form-data" method="POST">
        <input type="file" name="file" multiple="multiple" />
        <input type="hidden" name="params" value="<?php echo $form_params; ?>" />
        <input type="hidden" name="signature" value="<?php echo $signature; ?>" />
        <input type="submit" value="Upload" />
    </form>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//assets.transloadit.com/js/jquery.transloadit2-v2-latest.js"></script>
    <script type="text/javascript">
    $(function() {

        var $el = $('#upload-form');
        $el.transloadit({
            formData:  true,
            wait:      false,
            locale:    'my_locale',
            onSuccess  : function(result){
                console.log(result);
                $.post('result.php', {json:result});
            },
            onError    : function(result){ console.log(result);}
        });

        $el.transloadit.i18n.my_locale = {
            'errors.BORED_INSTANCE_ERROR' : 'Could not find a bored instance.',
            'errors.CONNECTION_ERROR'     : 'There was a problem connecting to the upload server',
            'errors.unknown'              : 'There was an internal error.',
            'errors.tryAgain'             : 'Please try your upload again.',
            'errors.troubleshootDetails'  : 'If you would like our help to troubleshoot this, ' +
                                            'please email us this information:',
            cancel                        : 'Cancel',
            details                       : 'Details',
            startingUpload                : 'Starting upload ...',
            processingFiles               : 'Upload done, now processing files ...',
            uploadProgress                : '%s / %s MB at %s kB/s | %s left'
        }
    });
    </script>
</body>
</html>