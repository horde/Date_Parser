<?php
/**
 * @category   Horde
 * @package    Date
 * @subpackage UnitTests
 */
namespace Horde\Date\Parser;
use Horde_Test_Case;
use \Horde_Date_Parser_Result;
use \Horde_Date_Span;
use \Horde_Date;

/**
 * @category   Horde
 * @package    Date
 * @subpackage UnitTests
 */
class ResultTest extends Horde_Test_Case
{
    public function testGuess()
    {
        $result = new Horde_Date_Parser_Result(null, null);

        $result->span = new Horde_Date_Span(new Horde_Date('2006-08-16 00:00:00'), new Horde_Date('2006-08-17 00:00:00'));
        $this->assertEquals(new Horde_Date('2006-08-16 12:00:00'), $result->guess());

        $result->span = new Horde_Date_Span(new Horde_Date('2006-08-16 00:00:00'), new Horde_Date('2006-08-17 00:00:01'));
        $this->assertEquals(new Horde_Date('2006-08-16 12:00:00'), $result->guess());

        $result->span = new Horde_Date_Span(new Horde_Date('2006-11-01 00:00:00'), new Horde_Date('2006-12-01 00:00:00'));
        $this->assertEquals(new Horde_Date('2006-11-16 00:00:00'), $result->guess());
    }
}
