<?php

use Jasamy\Validators\Url;

class UrlValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $message = 'not a valid url';

        $v = new Url('field', $message);

        $this->assertEquals($message, $v->getErrorMessage());

        $this->assertFalse($v->execute(array('field' => 'google.com')));
        $this->assertFalse($v->execute(array('field' => 'www.google.com')));
        $this->assertFalse($v->execute(array('field' => 'http://www.google')));
        $this->assertFalse($v->execute(array('field' => null)));

        $this->assertTrue($v->execute(array('field' => 'http://www.google.com')));
        $this->assertTrue($v->execute(array('field' => 'https://www.google.com')));
        $this->assertTrue($v->execute(array('field' => 'http://google.com')));
    }
}
