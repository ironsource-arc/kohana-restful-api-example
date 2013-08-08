<?php defined('SYSPATH') or die('No direct script access.');

/**
 * A list of actions and the roles assigned to each one.
 * Notice that each action can be assigned to multiple roles.
 */
return array(
	'view issues'		=> array('developer', 'manager'),
	'resolve issues'	=> array('developer'),
	'edit issues'		=> array('manager'),
);
