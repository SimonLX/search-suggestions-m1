<?php

/**
 * Class Silex_SearchSuggestions_Helper_Data
 *
 * Default helper and translator
 */
class Silex_SearchSuggestions_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_SUGGESTIONS_ENABLED = 'catalog/search/suggestions_enabled';

    /**
     * Check if search suggestions are enabled for current store
     *
     * @return bool
     */
    public function isSuggestionsEnabled()
    {
        return Mage::getStoreConfig(self::XML_PATH_SUGGESTIONS_ENABLED);
    }
}