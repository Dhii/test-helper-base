<?php

namespace Dhii\Test\FuncTest;

use Xpmock\TestCase;
use Dhii\Test\MergeValuesCapableTrait as TestSubject;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * Tests {@see TestSubject}.
 *
 * @since [*next-version*]
 */
class MergeValuesCapableTraitTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\Test\MergeValuesCapableTrait';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return MockObject
     */
    public function createInstance()
    {
        $mock = $this->getMockBuilder(static::TEST_SUBJECT_CLASSNAME)
            ->getMockForTrait();

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInternalType(
            'object',
            $subject,
            'A valid instance of the test subject could not be created.'
        );
    }

    /**
     * Tests that `_mergeValues()` works correctly.
     *
     * @since [*next-version*]
     */
    public function testMergeValues()
    {
        $val1 = uniqid('val');
        $val2 = uniqid('val');
        $val3 = uniqid('val');
        $array1 = [$val1, $val2];
        $array2 = [$val3, $val2];

        $subject = $this->createInstance();
        $_subject = $this->reflect($subject);

        $result = $_subject->_mergeValues($array1, $array2);
        $this->assertArraySubset([$val1, $val2, $val3], $result, 'Resulting array does not contain all the right elements');
        $this->assertCount(3, $result, 'Resulting array has the wrong number of elements');
    }
}
