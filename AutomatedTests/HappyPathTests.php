<?php
declare(strict_types=1);

require_once dirname(__FILE__) . '/config.php';
require_once dirname(__FILE__) . '/../FormstackAPI/FormstackApi.php';

use \PHPUnit\Framework\TestCase;
/*
 * @coversDefaultClass \FormstackApi
*/
final class HappyPathTests extends TestCase {
    private $copiedFormId = 0;

    /**
     * @covers  ::getForms
     */
    public function testGetAllForms() {
        $api = new FormstackApi(ACCESS_TOKEN);
        $forms = $api->getForms();
        $this->assertTrue(is_array($forms));
        $this->assertEquals(count($forms), 2);
    }

    /**
     * @covers  ::getForms
     */
    public function testGetSpecificform() {
        $api = new FormstackApi(ACCESS_TOKEN);
        $form = $api->getFormDetails(FORM_DETAILS_ID);
        $this->assertEquals($form->name, FORM_DETAILS_NAME);
    }

    /**
     * @covers  ::copyForm
     */
    public function testCopyForm() {
        $api = new FormstackApi(ACCESS_TOKEN);
        $originalForm = $api->getFormDetails(COPY_FORM_ID);
        $copiedForm = $api->copyForm(COPY_FORM_ID);
        $this->assertStringStartsWith($originalForm->name . ' - COPY', $copiedForm->name);
        $copiedFormId = $copiedForm->id;
        $this->assertTrue($copiedFormId>0);
    }

    /**
     * @covers  ::deleteForm
     */
    public function testDeleteForm() {
        $api = new FormstackApi(ACCESS_TOKEN);

        //Fail this test if the copy test failed
        $this->assertTrue($copiedFormId>0);
                
        $deletedForm = $api->deleteForm($copiedFormId);
        $this->assertEquals($deletedForm->success, 1);
        $this->assertEquals($deletedForm->id, $copiedFormId);
    }
}