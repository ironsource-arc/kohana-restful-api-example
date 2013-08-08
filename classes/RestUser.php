<?php defined('SYSPATH') or die('No direct script access.');

class RestUser extends Kohana_RestUser {

	/**
	 * A mock loading of a user object.
	 */
	protected function _find()
	{
		switch ($this->_api_key)
		{
			case 'alon':
				$this->_id = 1000;
				$this->_secret_key = 'abc';
				$this->_roles = array('developer', 'manager');
				break;

			case 'adi':
				$this->_id = 2000;
				$this->_secret_key = 'def';
				$this->_roles = array('developer');
				break;

			default:
				break;
		}
	}

} // END
