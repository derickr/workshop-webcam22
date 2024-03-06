<?php
xdebug_info();

//var_dump(xdebug_info('mode'));

//var_dump(xdebug_info('extension-flags'));

xdebug_notify(['mode' => join(', ', xdebug_info('mode') ), 'flags' => xdebug_info('extension-flags')]);

echo "Finished";
?>
