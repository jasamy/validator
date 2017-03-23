<?php

use Jasamy\Validators\Alpha;

class AlphaValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $message = 'not uppercase';

        $v = new Alpha('field', $message);

        $this->assertEquals($message, $v->getErrorMessage());

        $this->assertFalse($v->execute(array('field' => 'A123')));
        $this->assertFalse($v->execute(array('field' => 'a123')));
        $this->assertTrue($v->execute(array('field' => null)));
        $this->assertTrue($v->execute(array('field' => 'abc')));
        $this->assertTrue($v->execute(array('field' => 'ABC')));
    }
}
