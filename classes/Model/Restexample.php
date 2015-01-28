<?php

defined('SYSPATH') or die('No direct access allowed.');

/**
 * An example REST model
 *
 * @package  RESTfulAPI
 * @category Model
 * @author   Alon Pe'er
 */
class Model_Restexample extends Model_RestAPI
{

    /**
     * @param $params
     * @return array
     */
    public function get($params)
    {
        // Process the request and fetch objects.
        // Returning a mock object.
        return [
            'restexample' => [
                ['id' => mt_rand(1, 100), 'name' => Text::random('alnum', 10)],
                ['id' => mt_rand(1, 100), 'name' => Text::random('alnum', 10)],
                ['id' => mt_rand(1, 100), 'name' => Text::random('alnum', 10)],
                ['id' => mt_rand(1, 100), 'name' => Text::random('alnum', 10)],
            ],
        ];
    }

    /**
     * @param $params
     * @return array
     * @throws HTTP_Exception
     */
    public function create($params)
    {
        // Enforce and validate some parameters.
        if (!isset($params['name'])) {
            throw HTTP_Exception::factory(400, 'Missing name');
        }

        if (!Valid::min_length($params['name'], 2) || !Valid::alpha_numeric($params['name'])) {
            throw HTTP_Exception::factory(400,
                                          'The name must contain at least 2 characters and have alpha-numeric characters only'
            );
        }

        // Process the request and create a new object.
        // Returning a mock object.
        return ['id' => mt_rand(1, 100), 'name' => $params['name']];
    }

    /**
     * @param $params
     * @return array
     * @throws HTTP_Exception
     */
    public function update($params)
    {
        // Enforce and validate some parameters.
        if (!isset($params['id'])) {
            throw HTTP_Exception::factory(400, 'Missing id');
        }
        if (!Valid::numeric($params['id'])) {
            throw HTTP_Exception::factory(400, 'Invalid id');
        }

        if (isset($params['name']) && (!Valid::min_length($params['name'], 2) || !Valid::alpha_numeric($params['name']))) {
            throw HTTP_Exception::factory(400, 'The name must contain at least 2 characters and have alpha-numeric characters only');
        }

        // Process the request and update object.
        // Returning a mock object.
        return ['id' => $params['id'], 'name' => isset($params['name']) ? $params['name'] : Text::random('alnum', 10)];
    }

    /**
     * @param $params
     * @return array
     * @throws HTTP_Exception
     */
    public function delete($params)
    {
        // Enforce and validate some parameters.
        if (!isset($params['id'])) {
            throw HTTP_Exception::factory(400, 'Missing id');
        }
        if (!Valid::numeric($params['id'])) {
            throw HTTP_Exception::factory(400, 'Invalid id');
        }

        // Process the request and delete object.

        return [
            'status' => __('Deleted'),
            'id'     => $params['id'],
        ];
    }

}
