<?php

namespace SuiteCRM\Exception;

use Psr\Log\LogLevel;
use SuiteCRM\API\v8\Exception\ApiException;
use SuiteCRM\API\v8\Exception\NotImplementedException;

class NotImplementedTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**#
     * @var ApiException $exception
     */
    private static $exception;

    protected function _before()
    {
        if(self::$exception === null) {
            self::$exception = new NotImplementedException();
        }
    }

    protected function _after()
    {
    }

    public function testGetMessage()
    {
        $this->assertEquals('[SuiteCRM] [API] [NotImplementedException] ', self::$exception->getMessage());
    }

    public function testGetSetDetail()
    {
        self::$exception->setDetail('test');
        $this->assertEquals('test', self::$exception->getDetail());
    }

    public function testGetSetSource()
    {
        self::$exception->setSource('/data');
        $this->assertSame(array('pointer' => '/data'), self::$exception->getSource());
    }

    public function testGetHttpStatus()
    {
        $this->assertEquals(500, self::$exception->getHttpStatus());
    }
}