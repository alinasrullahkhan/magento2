<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ali\Affliates\Model\Affliates\Source;

/**
 * Description of Status
 *
 * @author Ali
 */
class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $affliate;
 
    public function __construct(\Ali\Affliates\Model\Affliates $affliate)
    {
        $this->affliate = $affliate;
    }
 
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
 
    public static function getOptionArray()
    {
        return [1 => __('Enabled'), 0 => __('Disabled')];
    }
}
