<?php
namespace Craft;

class RestrictedAssetsPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Restricted Assets');
    }

    public function getVersion()
    {
        return '0.1';
    }

    public function getDeveloper()
    {
        return 'Bram Mittendorff';
    }

    public function getDeveloperUrl()
    {
        return 'http://itmundi.nl';
    }

}
