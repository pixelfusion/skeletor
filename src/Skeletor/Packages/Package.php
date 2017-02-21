<?php
namespace Skeletor\Packages;

use League\Flysystem\Filesystem;
use Skeletor\Manager\ComposerManager;

abstract class Package implements PackageInterface
{
    protected $composerManager;
    protected $filesystem
    protected $package;
    protected $name;
    protected $version;
    protected $installDefault;

    public function __construct(ComposerManager $composerManager, Filesystem $filesystem)
    {
        $this->composerManager = $composerManager;
        $this->filesystem = $filesystem;
    }

    public function getPackage()
    {
        return $this->package;
    }

    public function setPackage(string $package)
    {
        $this->package = $package;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    public function install()
    {
        $command = $this->composerManager->preparePackageCommand($this->getPackage(), $this->getVersion());
        $this->composerManager->runCommand($command);
    }
}