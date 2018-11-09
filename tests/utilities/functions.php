<?php

/**
 * Creates an Persisted Data of a $class
 *
 * @param $class
 * @param array $attributes
 * @return mixed
 */
function create($class, $attributes = [])
{
    return factory($class)->create($attributes);
}

/**
 * Creates an non-persistent data of a $class
 *
 * @param $class
 * @param array $attributes
 * @return mixed
 */
function make($class, $attributes = [])
{
    return factory($class)->make($attributes);
}
