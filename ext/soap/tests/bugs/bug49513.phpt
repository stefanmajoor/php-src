--TEST--
Bug #49513 (SoapServer->fault() shouldn't halt execution)
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
$server = new SoapServer(NULL, array('location' => 'http://example.com', 'uri' => 'http://example.com'));
$server->fault('foo', 'bar');
echo 'We are past $sever->fault()!'
?>
--EXPECT--
<?xml version="1.0" encoding="UTF-8"?><SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SOAP-ENV:Fault><faultcode>foo</faultcode><faultstring>bar</faultstring></SOAP-ENV:Fault></SOAP-ENV:Body></SOAP-ENV:Envelope>We are past $sever->fault()!r
