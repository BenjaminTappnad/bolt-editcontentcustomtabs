<?php

namespace Bolt\Extension\SahAssar\Editcontentcustomtabs;

use Bolt\Extension\SimpleExtension;
use Silex\Application;

/**
 * Editcontentcustomtabs extension class.
 *
 * @author Svante Richter <svante.richter@gmail.com>
 */
class EditcontentcustomtabsExtension extends SimpleExtension
{
    /**
     * @inheritdoc
     */
    protected function registerServices(Application $app)
    {
        $app['storage.request.edit'] = $app->share(
            function ($app) {
                $ce = new ContentRequest\CustomEdit(
                    $app['storage'],
                    $app['config'],
                    $app['users'],
                    $app['filesystem'],
                    $app['logger.system'],
                    $app['logger.flash'],
                    $app['query']
                );

                return $ce;
            }
        );
    }

    /**
     * @inheritdoc
     */
    protected function registerTwigPaths()
    {
        return [
            'templates' => ['position' => 'prepend', 'namespace' => 'bolt']
        ];
    }
}
