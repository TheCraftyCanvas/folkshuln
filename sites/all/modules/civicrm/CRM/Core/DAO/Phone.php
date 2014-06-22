<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.3                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2013                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Core_DAO_Phone extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   * @static
   */
  static $_tableName = 'civicrm_phone';
  /**
   * static instance to hold the field values
   *
   * @var array
   * @static
   */
  static $_fields = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   * @static
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   * @static
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   * @static
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   * @static
   */
  static $_log = true;
  /**
   * Unique Phone ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * FK to Contact ID
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * Which Location does this phone belong to.
   *
   * @var int unsigned
   */
  public $location_type_id;
  /**
   * Is this the primary phone for this contact and location.
   *
   * @var boolean
   */
  public $is_primary;
  /**
   * Is this the billing?
   *
   * @var boolean
   */
  public $is_billing;
  /**
   * Which Mobile Provider does this phone belong to.
   *
   * @var int unsigned
   */
  public $mobile_provider_id;
  /**
   * Complete phone number.
   *
   * @var string
   */
  public $phone;
  /**
   * Optional extension for a phone number.
   *
   * @var string
   */
  public $phone_ext;
  /**
   * Phone number stripped of all whitespace, letters, and punctuation.
   *
   * @var string
   */
  public $phone_numeric;
  /**
   * Which type of phone does this number belongs.
   *
   * @var int unsigned
   */
  public $phone_type_id;
  /**
   * class constructor
   *
   * @access public
   * @return civicrm_phone
   */
  function __construct()
  {
    $this->__table = 'civicrm_phone';
    parent::__construct();
  }
  /**
   * return foreign links
   *
   * @access public
   * @return array
   */
  function links()
  {
    if (!(self::$_links)) {
      self::$_links = array(
        'contact_id' => 'civicrm_contact:id',
      );
    }
    return self::$_links;
  }
  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
        ) ,
        'contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'location_type_id' => array(
          'name' => 'location_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Phone Location Type') ,
          'pseudoconstant' => array(
            'name' => 'locationType',
            'table' => 'civicrm_location_type',
            'keyColumn' => 'id',
            'labelColumn' => 'name',
          )
        ) ,
        'is_primary' => array(
          'name' => 'is_primary',
          'type' => CRM_Utils_Type::T_BOOLEAN,
          'title' => ts('Is Phone Primary?') ,
        ) ,
        'is_billing' => array(
          'name' => 'is_billing',
          'type' => CRM_Utils_Type::T_BOOLEAN,
        ) ,
        'mobile_provider_id' => array(
          'name' => 'mobile_provider_id',
          'type' => CRM_Utils_Type::T_INT,
        ) ,
        'phone' => array(
          'name' => 'phone',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Phone') ,
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
          'import' => true,
          'where' => 'civicrm_phone.phone',
          'headerPattern' => '/phone/i',
          'dataPattern' => '/^[\d\(\)\-\.\s]+$/',
          'export' => true,
        ) ,
        'phone_ext' => array(
          'name' => 'phone_ext',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Phone Extension') ,
          'maxlength' => 16,
          'size' => CRM_Utils_Type::FOUR,
          'import' => true,
          'where' => 'civicrm_phone.phone_ext',
          'headerPattern' => '/extension/i',
          'dataPattern' => '/^\d+$/',
          'export' => true,
        ) ,
        'phone_numeric' => array(
          'name' => 'phone_numeric',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Phone Numeric') ,
          'maxlength' => 32,
          'size' => CRM_Utils_Type::MEDIUM,
        ) ,
        'phone_type_id' => array(
          'name' => 'phone_type_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Phone Type') ,
          'pseudoconstant' => array(
            'name' => 'phoneType',
            'optionGroupName' => 'phoneType',
          )
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * returns the names of this table
   *
   * @access public
   * @static
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * returns if this table needs to be logged
   *
   * @access public
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * returns the list of fields that can be imported
   *
   * @access public
   * return array
   * @static
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['phone'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * returns the list of fields that can be exported
   *
   * @access public
   * return array
   * @static
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['phone'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}