--TEST--
JIT INC: 009
--INI--
opcache.enable=1
opcache.enable_cli=1
opcache.file_update_protection=0
opcache.jit_buffer_size=64M
opcache.protect_memory=1
;opcache.jit_debug=257
--EXTENSIONS--
opcache
--FILE--
<?php
function foo() {
    $x = 1.0;
    $x += 0;
    ++$x; // mem -> mem
    var_dump($x);
}
foo();
?>
--EXPECT--
float(2)
