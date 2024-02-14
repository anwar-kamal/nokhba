<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;

class ProductSystem extends Fieldtype
{
    /**
     * The blank/default value.
     *
     * @return array
     */
    public $var = '112233';

    protected function configFieldItems(): array
    {
        return [
            'placeholder' => [
                'display' => __('Placeholder'),
                'instructions' => __('statamic::fieldtypes.select.config.placeholder'),
                'type' => 'text',
                'default' => '',
                'width' => 50,
            ],
            'endpoint' => [
                'display' => __('Endpoint'),
                'type' => 'select',
                'options' => [
                    'Course' => 'Course',
                    'Package' => 'Package',
                    'InstallmentPackage' => 'InstallmentPackage',
                    'Offer' => 'Offer',

                ],

                'default' => 'product',
                'width' => 25,
                'required' => true,
            ],
            'options' => [
                'display' => __('Options'),
                'instructions' => __('statamic::fieldtypes.select.config.options'),
                'type' => 'array',
                'key_header' => __('Key'),
                'value_header' => __('Label').' ('.__('Optional').')',
                'add_button' => __('Add Option'),
            ],
        ];
    }
    public function defaultValue()
    {
        return null;
    }

    /**
     * Pre-process the data before it gets sent to the publish page.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function preProcess($data)
    {

        return $data;
    }

    /**
     * Process the data before it gets saved.
     *
     * @param mixed $data
     * @return array|mixed
     */
    public function process($data)
    {
        return $data;
    }
}
