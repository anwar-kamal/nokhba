<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;
use Illuminate\Support\Facades\File;

class PageEditor extends Fieldtype
{
    /**
     * The blank/default value.
     *
     * @return array
     */
    public function defaultValue()
    {
        return null;
    }

    protected function configFieldItems(): array
    {
        return [
            'file' => [
                'display' => __('File'),
                //'instructions' => __('statamic::fieldtypes.select.config.placeholder'),
                'type' => 'text',
                'default' => '',
                'width' => 50,
            ],
        ];
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {
        $config = $this->config();

        if (file_exists(base_path($config['file'])))
            return (File::get(base_path($config['file'])));
        return $data ;

    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        $config = $this->config();
        if (file_exists(base_path($config['file'])))
            File::put(base_path($config['file']),$data);
        return $data;
    }
}
