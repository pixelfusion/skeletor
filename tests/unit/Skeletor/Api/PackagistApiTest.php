<?php
namespace Skeletor\Api;


class PackagistApiTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAvailablePackagesVersionsReturnsEmptyArrayIfThereAreNoPackages()
    {
        $api = new PackagistApi();
        $versions = $api->getAvailablePackasgeVersions([]);

        $this->assertInternalType('array', $versions);
        $this->assertCount(0, $versions);
    }
}