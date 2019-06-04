<?php
declare(strict_types=1);

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/../FormstackAPI/FormstackApi.php';

use \PHPUnit\Framework\TestCase;
/*
 * @coversDefaultClass \FormstackApi
*/
final class HappyPathTests extends TestCase {
    /**
     * @covers  ::getForms
     */
    public function testGetAllForms(Type $var = null) {
        $this->assertTrue(true);
    }

    /**
     * @covers  ::getForms
     */
    public function testGetSpecificform(Type $var = null) {
        $this->assertTrue(true);
    }

    /**
     * @covers  ::copyForm
     */
    public function testCopyForm(Type $var = null) {
        $this->assertTrue(true);
    }

    /**
     * @covers  ::deleteForm
     */
    public function testDeleteForm(Type $var = null) {
        $this->assertTrue(true);
    }
}