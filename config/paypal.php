<?php
return array(
    // set your paypal credential
    'client_id' => 'AVcBJWuxDlLLvB7zCNRelPaXgI0SK4De98hEi8bm-p_w5p_IqwXdQfm1CPZ3pQQylVgBeDiiRCRGX--6',
    'secret' => 'ELotsUF7BBGXfB9-F1oDCVwebWm6YCASuTe9TlGmrMSZ5BNJaTMBjKaI1NsI3TdpzGjaJcAADTgBmuDU',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);