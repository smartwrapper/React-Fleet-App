<?php 

return [ 
    'client_id' => 'AVM0Sb5TSOFE0NrCMXivq7ACOWCUPpv4Cr0k7qeYQj4GoGsrsZQnsx6UHOMJ3oCw5leErSLB7WuGfW7Q',
	'secret' => 'EBoVyRuCSJFVos7KtLjRLI5GPTHxhiHBOO9PcywwqsKeBZfu2QJhI9BxIG_VjudkR-_mD02-werfKr1b',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];