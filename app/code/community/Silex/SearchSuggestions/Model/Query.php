<?php

/**
 * Class Silex_SearchSuggestions_Block_Autocomplete
 *
 * Overridden to use new config fields limiting search suggestions.
 */
class Silex_SearchSuggestions_Model_Query extends Mage_CatalogSearch_Model_Query
{
    const XML_PATH_SUGGESTIONS_LIMIT = 'catalog/search/suggestions_limit';

    /**
     * @inheritDoc
     *
     * Add collection limit size
     */
    public function getSuggestCollection()
    {
        $collection = $this->getData('suggest_collection');

        if (is_null($collection)) {
            $collection = parent::getSuggestCollection();

            $limitSize = Mage::getStoreConfig(self::XML_PATH_SUGGESTIONS_LIMIT, $this->getStoreId());
            if (filter_var($limitSize, FILTER_VALIDATE_INT) !== false) {
                $collection->setPageSize($limitSize);
            }

            $this->setData('suggest_collection', $collection);
        }

        return $collection;
    }
}
