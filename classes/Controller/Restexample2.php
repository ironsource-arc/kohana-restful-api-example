<?php defined('SYSPATH') or die('No direct script access.');

/**
 * An example controller that implements a RESTful API.
 *
 * @TODO Move all default action functions into the REST parent class.
 *
 * @package  RESTfulAPI
 * @category Controller
 * @author   Alon Pe'er
 */
class Controller_Restexample2 extends Controller_Rest {

	/**
	 * A Restexample model instance for all the business logic.
	 *
	 * @var Model_Restexample
	 */
	protected $_rest;

	protected $_auth_type = RestUser::AUTH_TYPE_SECRET;
	protected $_auth_source = RestUser::AUTH_SOURCE_GET;

	/**
	 * Initialize the example model.
	 */
	public function before()
	{
		parent::before();
		$this->_rest = Model_RestAPI::factory('Restexample', $this->_user);
	}

	/**
	 * Handle GET requests.
	 */
	public function action_index()
	{
		try
		{
			$this->rest_output( array(
				'action' => $this->_rest->get( $this->_params ),
				'userIsDeveloper' => $this->_user->is_a('developer'),
				'userIsManager' => $this->_user->is_a('manager'),
				'userCanView' => $this->_user->can('view issues'),
				'userCanEdit' => $this->_user->can('edit issues'),
				'userCanResolve' => $this->_user->can('resolve issues'),
			) );
		}
		catch (Kohana_HTTP_Exception $khe)
		{
			$this->_error($khe);
			return;
		}
		catch (Kohana_Exception $e)
		{
			$this->_error('An internal error has occurred', 500);
			throw $e;
		}
	}

	/**
	 * Handle POST requests.
	 */
	public function action_create()
	{
		try
		{
			$this->rest_output( $this->_rest->create( $this->_params ) );
		}
		catch (Kohana_HTTP_Exception $khe)
		{
			$this->_error($khe);
			return;
		}
		catch (Kohana_Exception $e)
		{
			$this->_error('An internal error has occurred', 500);
			throw $e;
		}
	}

	/**
	 * Handle PUT requests.
	 */
	public function action_update()
	{
		try
		{
			$this->rest_output( $this->_rest->update( $this->_params ) );
		}
		catch (Kohana_HTTP_Exception $khe)
		{
			$this->_error($khe);
			return;
		}
		catch (Kohana_Exception $e)
		{
			$this->_error('An internal error has occurred', 500);
			throw $e;
		}
	}

	/**
	 * Handle DELETE requests.
	 */
	public function action_delete()
	{
		try
		{
			$this->rest_output( $this->_rest->delete( $this->_params ) );
		}
		catch (Kohana_HTTP_Exception $khe)
		{
			$this->_error($khe);
			return;
		}
		catch (Kohana_Exception $e)
		{
			$this->_error('An internal error has occurred', 500);
			throw $e;
		}
	}

} // END
