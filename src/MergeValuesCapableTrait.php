<?php

namespace Dhii\Test;

/**
 * Functionality for merging.
 *
 * @since [*next-version*]
 */
trait MergeValuesCapableTrait
{
    /**
     * Merges the values of two string arrays.
     *
     * The resulting product will be a numeric array where the values of both inputs are present, without duplicates.
     *
     * @since [*next-version*]
     *
     * @param string[] $destination The base array.
     * @param string[] $source      The array with more keys.
     *
     * @return array The array which contains unique values of both arrays.
     */
    protected function _mergeValues($destination, $source)
    {
        return array_keys(array_merge(array_flip($destination), array_flip($source)));
    }
}
