<?php

/**
 * CAO Max Products
 *
 * @author  Jay Trees
 * @link    https://github.com/grandeljay/modified-cao-max-products
 */

use Grandeljay\CaoMaxProducts\Constants;
use Grandeljay\CaoMaxProducts\Installer;
use RobinTheHood\ModifiedStdModule\Classes\StdModule;

class grandeljay_cao_max_products extends StdModule
{
    public const VERSION = '0.1.2';

    public function __construct()
    {
        parent::__construct(Constants::MODULE_NAME);

        $this->checkForUpdate(true);
    }

    public function install(): void
    {
        parent::install();

        Installer::install();
    }

    protected function updateSteps(): int
    {
        if (version_compare($this->getVersion(), self::VERSION, '<')) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }

    public function remove(): void
    {
        parent::remove();

        $this->removeConfigurationAll();
    }

    public function display()
    {
        return $this->displaySaveButton();
    }
}
