<?php

namespace kundd\ConfiguratorBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use kundd\ConfiguratorBundle\KunddConfiguratorBundle;
use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Andreas Schempp <https://github.com/aschempp>
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(KunddConfiguratorBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['configurator']),
        ];
    }
}
