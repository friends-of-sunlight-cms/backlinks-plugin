<?php

use Sunlight\Database\Database as DB;
use Sunlight\Router;
use Sunlight\Template;
use Sunlight\WebState;

/**
 * Event to display page backlink, returns an interaction with the hierarchy.
 * This is a frequently requested remnant of Sunlight CMS 7.x.
 */
return function (array $args) {
    if ($this->getConfig()->offsetGet('page_show_backlinks')) {
        global $_index, $_page;

        // pages
        if (($_index->type === WebState::PAGE || $_index->type === WebState::PLUGIN)
            && $_index->backlink === null
            && (isset($_page) && $_page['node_parent'] !== null)
        ) {
            $parent = DB::queryRow("SELECT slug FROM " . DB::table('page') . " WHERE id=" . $_page['node_parent']);
            $_index->backlink = Router::page($_page['node_parent'], $parent['slug']);
        }

        // articles
        if (Template::currentIsArticle() && $_index->backlink === null) {
            $_index->backlink = Router::page($_page['id'], $_page['slug']);
        }
    }
};
