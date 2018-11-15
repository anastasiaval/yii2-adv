<?php namespace frontend\tests;

use frontend\models\ContactForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $true = true;
        $this->assertTrue($true);

        $a = 4;
        $b = 4;
        $this->assertEquals($a, $b);

        $c = 3;
        $this->assertLessThan($a, $c);

        $contact = new ContactForm([
            'name' => 'First', 'email' => 'first@mail.com', 'subject' => 'none', 'body' => 'text', 'verifyCode' => 123
        ]);
        $this->assertAttributeEquals('First', 'name', $contact);
        $this->assertAttributeEquals('first@mail.com', 'email', $contact);

        $arr = ['4' => '123'];
        $this->assertArrayHasKey(4, $arr);
    }
}