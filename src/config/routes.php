<?php

return array(

	/**
	 * Determines whether to load the package routes. If you want to specify them yourself in your own `app/routes.php`
	 * file then set this to false.
	 */
	'use_package_routes' => true,

	/**
	 * Base URI of the package's pages, e.g. "places" in http://domain.com/places and http://domain.com/places/my-place
	 */
	'base_uri' => 'places',

	/**
	 * URI prefix of the events relationship filter
	 *
	 * @type mixed false | string
	 */
	'relationship_uri_prefix' => false,

);