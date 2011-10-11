<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/


require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButtonQuickCreate.php');
require_once('include/SubPanel/SubPanel.php');
require_once('include/SubPanel/SubPanelDefinitions.php');

class Bug44272Test extends PHPUnit_Framework_TestCase
{

var $account;
	
public function setUp()
{
	require('include/modules.php');
	$GLOBALS['beanList'] = $beanList;
	$GLOBALS['beanFiles'] = $beanFiles;		
	$GLOBALS['current_user'] = SugarTestUserUtilities::createAnonymousUser();
	$GLOBALS['current_user']->is_admin = true;
	$this->account = SugarTestAccountUtilities::createAccount();
}	

public function tearDown()
{
	SugarTestAccountUtilities::removeAllCreatedAccounts();
	SugarTestUserUtilities::removeAllCreatedAnonymousUsers();
}
	
public function testSugarWidgetSubpanelTopButtonQuickCreate()
{
	$defines = array();
	$defines['focus'] = $this->account;
	$defines['module'] = 'Accounts';
	$defines['action'] = 'DetailView';

	$subpanel_definitions = new SubPanelDefinitions(new Contact());
	$contactSubpanelDef = $subpanel_definitions->load_subpanel('contacts');
	
	$subpanel = new SubPanel('Accounts', $this->account->id, 'contacts', $contactSubpanelDef, 'Accounts');
	$defines['subpanel_definition'] = $subpanel->subpanel_defs;
	
	$button = new SugarWidgetSubPanelTopButtonQuickCreate();
	$code = $button->_get_form($defines);
	$this->assertRegExp('/\<input[^\>]*?name=\"return_name\"/', $code, "Assert that the hidden input field return_name was created");
}
	
}
