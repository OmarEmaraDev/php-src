--TEST--
ext/sockets - socket_send - test with incorrect parameters
--SKIPIF--
<?php
    if (!extension_loaded('sockets')) {
        die('skip sockets extension not available.');
    }
?>
--FILE--
<?php
    $s_c = socket_create_listen(0);
    try {
        $s_w = socket_send($s_c, "foo", -1, MSG_OOB);
    } catch (\ValueError $e) {
        echo $e->getMessage() . \PHP_EOL;
    }
    socket_close($s_c);
?>
--EXPECT--
socket_send(): Argument #3 ($len) must be greater than or equal to 0
