<?php

use Jasamy\Validators\Email;

class EmailValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidator()
    {
        $message = 'bad email address';

        $v = new Email('field', $message);

        $this->assertEquals($message, $v->getErrorMessage());

        $this->assertFalse($v->execute(array('field' => 'Abc.example.com')));
        $this->assertFalse($v->execute(array('field' => 'A@b@c@example.com')));
        $this->assertFalse($v->execute(array('field' => 'john..doe@example.com')));
        $this->assertFalse($v->execute(array('field' => 'john.doe@example..com')));
        $this->assertFalse($v->execute(array('field' => '.john.doe@example.com')));

        $this->assertTrue($v->execute(array()));
        $this->assertTrue($v->execute(array('field' => '')));
        $this->assertTrue($v->execute(array('field' => null)));
        $this->assertTrue($v->execute(array('field' => 'prettyandsimple@example.com')));
        $this->assertTrue($v->execute(array('field' => 'very.common@example.com')));
        $this->assertTrue($v->execute(array('field' => 'disposable.style.email.with+symbol@example.com')));
        $this->assertTrue($v->execute(array('field' => 'other.email-with-dash@example.com')));
        $this->assertTrue($v->execute(array('field' => 'x@example.com')));
        $this->assertTrue($v->execute(array('field' => '"much.more unusual"@example.com')));
        $this->assertTrue($v->execute(array('field' => 'example-indeed@strange-example.com')));
        $this->assertTrue($v->execute(array('field' => 'admin@mailserver1')));
        $this->assertTrue($v->execute(array('field' => 'example@localhost')));
        $this->assertTrue($v->execute(array('field' => 'example+foobar@s.solutions')));
        $this->assertTrue($v->execute(array('field' => 'user@[IPv6:2001:db8::1]')));
    }
}
