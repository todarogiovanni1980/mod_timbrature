<?php
/**
 * Helper class for Ultime timbrature module
 * 
 * @package    cnritdpa.gespre
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_timbrature is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModTimbratureHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getHello($params)
    {
        // Obtain a database connection
        $db = JFactory::getDbo();
        // Retrieve the shout
        // $query = $db->getQuery(true)
        //             ->select($db->quoteName('data'),$db->quoteName('ora'),$db->quoteName('matricola'))
        //             ->from($db->quoteName('#__presenze_timbrature'))
        //             ->order($db->quoteName('id') . ' DESC');

        $query = "SELECT * FROM `#__presenze_timbrature` ORDER BY `id`  DESC";
        // Prepare the query
        $db->setQuery($query);
        // Load the row.
        $result = $db->loadResult();
        // Return the Hello
        return $result;
    }
}