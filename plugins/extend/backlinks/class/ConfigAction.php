<?php

namespace SunlightExtend\Backlinks;

use Sunlight\Plugin\Action\ConfigAction as BaseConfigAction;
use Sunlight\Util\Form;

class ConfigAction extends BaseConfigAction
{
    protected function getFields(): array
    {
        $config = $this->plugin->getConfig();

        return [
            'page_show_backlinks' => [
                'label' => _lang('backlinks.config.page_show_backlinks'),
                'input' => '<input type="checkbox" name="config[page_show_backlinks]" value="1"' . Form::activateCheckbox($config->offsetGet('page_show_backlinks')) . '>',
                'type' => 'checkbox',
            ],
        ];
    }
}
