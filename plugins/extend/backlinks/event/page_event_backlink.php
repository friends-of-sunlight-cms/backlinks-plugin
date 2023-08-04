<?php

use Sunlight\Extend;
use Sunlight\Router;

/**
 * Creating a backlink to any page of the system.
 *
 * Usage: In the page editing, in the 'Plugins' field, fill in 'backlink:' and then the address of the page
 *        where the backlink is going.
 * Example: 'backlink:gallery' (without quotes)
 */
return function (array $args) {
    Extend::reg('tpl.backlink', function ($backlinkArgs) use ($args) {
        if (!isset($args['arg'])) {
            return;
        }
        $backlinkArgs['backlink'] = _e(Router::slug($args['arg']));
    });
};
