<?php

use Sunlight\Router;
use Sunlight\Template;
use Sunlight\WebState;

return function (array $args) {
    if ($this->getConfig()['page_show_backlinks']) {
        global $_index, $_page;

        // pages
        if (($_index->type === WebState::PAGE || $_index->type === WebState::PLUGIN)
            && $_index->backlink === null
            && (isset($_page) && $_page['node_parent'] !== null)
        ) {
            $_index->backlink = Router::page($_page['node_parent']);
        }

        // articles
        if (Template::currentIsArticle() && $_index->backlink === null) {
            $_index->backlink = Router::page($_page['id'], $_page['slug']);
        }
    }
};
