<?php
/**
 * Gekosale, Open Source E-Commerce Solution
 * http://www.gekosale.pl
 *
 * Copyright (c) 2008-2013 WellCommerce sp. z o.o.. Zabronione jest usuwanie informacji o licencji i autorach.
 *
 * This library is free software; you can redistribute it and/or 
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version. 
 * 
 * 
 * $Revision: 619 $
 * $Author: gekosale $
 * $Date: 2011-12-19 22:09:00 +0100 (Pn, 19 gru 2011) $
 * $Id: news.php 619 2011-12-19 21:09:00Z gekosale $ 
 */

namespace Gekosale;
use FormEngine;

class SitemapsForm extends Component\Form
{
	
	protected $populateData;

	public function setPopulateData ($Data)
	{
		$this->populateData = $Data;
	}

	public function initForm ()
	{
		$form = new FormEngine\Elements\Form(Array(
			'name' => 'sitemaps',
			'action' => '',
			'method' => 'post'
		));
		
		$requiredData = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
			'name' => 'required_data',
			'label' => _('TXT_MAIN_DATA')
		)));
		
		$requiredData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'name',
			'label' => _('TXT_SITEMAPS_NAME'),
			'rules' => Array(
				new FormEngine\Rules\Required(_('ERR_EMPTY_SITEMAPS_NAME'))
			)
		)));
		
		$requiredData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'pingserver',
			'label' => _('TXT_SITEMAPS_PINGSERVER'),
			'rules' => Array(
				new FormEngine\Rules\Required(_('ERR_EMPTY_SITEMAPS_PINGSERVER')),
				new FormEngine\Rules\Format(_('ERR_WRONG_FORMAT'), '/http:\/\/[a-zA-Z0-9]+/')
			)
		)));
		
		$settingsData = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
			'name' => 'settings_data',
			'label' => _('TXT_SETTINGS')
		)));
		
		$publishforcategories = $settingsData->AddChild(new FormEngine\Elements\Checkbox(Array(
			'name' => 'publishforcategories',
			'label' => _('TXT_PUBLISH_FOR_CATEGORIES'),
			'default' => '1'
		)));
		
		$settingsData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'priorityforcategories',
			'label' => _('TXT_PRIORITY_FOR_CATEGORIES'),
			'rules' => Array(
				new FormEngine\Rules\Format(_('ERR_NUMERIC_INVALID'), '/[0-9]{1,}/'),
				new FormEngine\Rules\Required(_('ERR_EMPTY_TXT_PRIORITY_FOR_CATEGORIES'))
			),
			'filters' => Array(
				new FormEngine\Filters\CommaToDotChanger()
			),
			'default' => '0.5',
			'dependencies' => Array(
				new FormEngine\Dependency(FormEngine\Dependency::HIDE, $publishforcategories, new FormEngine\Conditions\Not(new FormEngine\Conditions\Equals('1')))
			)
		)));
		
		$publishforproducts = $settingsData->AddChild(new FormEngine\Elements\Checkbox(Array(
			'name' => 'publishforproducts',
			'label' => _('TXT_PUBLISH_FOR_PRODUCTS'),
			'default' => '1'
		)));
		
		$settingsData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'priorityforproducts',
			'label' => _('TXT_PRIORITY_FOR_PRODUCTS'),
			'rules' => Array(
				new FormEngine\Rules\Format(_('ERR_NUMERIC_INVALID'), '/[0-9]{1,}/'),
				new FormEngine\Rules\Required(_('ERR_EMPTY_PRIORITY_FOR_PRODUCTS'))
			),
			'filters' => Array(
				new FormEngine\Filters\CommaToDotChanger()
			),
			'default' => '0.5',
			'dependencies' => Array(
				new FormEngine\Dependency(FormEngine\Dependency::HIDE, $publishforproducts, new FormEngine\Conditions\Not(new FormEngine\Conditions\Equals('1')))
			)
		)));
		
		$publishforproducers = $settingsData->AddChild(new FormEngine\Elements\Checkbox(Array(
			'name' => 'publishforproducers',
			'label' => _('TXT_PUBLISH_FOR_PRODUCERS'),
			'default' => '1'
		)));
		
		$settingsData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'priorityforproducers',
			'label' => _('TXT_PRIORITY_FOR_PRODUCERS'),
			'rules' => Array(
				new FormEngine\Rules\Format(_('ERR_NUMERIC_INVALID'), '/[0-9]{1,}/'),
				new FormEngine\Rules\Required(_('ERR_EMPTY_PRIORITY_FOR_PRODUCERS'))
			),
			'filters' => Array(
				new FormEngine\Filters\CommaToDotChanger()
			),
			'default' => '0.5',
			'dependencies' => Array(
				new FormEngine\Dependency(FormEngine\Dependency::HIDE, $publishforproducers, new FormEngine\Conditions\Not(new FormEngine\Conditions\Equals('1')))
			)
		)));
		
		$publishfornews = $settingsData->AddChild(new FormEngine\Elements\Checkbox(Array(
			'name' => 'publishfornews',
			'label' => _('TXT_PUBLISH_FOR_NEWS'),
			'default' => '1'
		)));
		
		$settingsData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'priorityfornews',
			'label' => _('TXT_PRIORITY_FOR_NEWS'),
			'rules' => Array(
				new FormEngine\Rules\Format(_('ERR_NUMERIC_INVALID'), '/[0-9]{1,}/'),
				new FormEngine\Rules\Required(_('ERR_EMPTY_PRIORITY_FOR_NEWS'))
			),
			'filters' => Array(
				new FormEngine\Filters\CommaToDotChanger()
			),
			'default' => '0.5',
			'dependencies' => Array(
				new FormEngine\Dependency(FormEngine\Dependency::HIDE, $publishfornews, new FormEngine\Conditions\Not(new FormEngine\Conditions\Equals('1')))
			)
		)));
		
		$publishforpages = $settingsData->AddChild(new FormEngine\Elements\Checkbox(Array(
			'name' => 'publishforpages',
			'label' => _('TXT_PUBLISH_FOR_PAGES'),
			'default' => '1'
		)));
		
		$settingsData->AddChild(new FormEngine\Elements\TextField(Array(
			'name' => 'priorityforpages',
			'label' => _('TXT_PRIORITY_FOR_PAGES'),
			'rules' => Array(
				new FormEngine\Rules\Format(_('ERR_NUMERIC_INVALID'), '/[0-9]{1,}/'),
				new FormEngine\Rules\Required(_('ERR_EMPTY_PRIORITY_FOR_PAGES'))
			),
			'filters' => Array(
				new FormEngine\Filters\CommaToDotChanger()
			),
			'default' => '0.5',
			'dependencies' => Array(
				new FormEngine\Dependency(FormEngine\Dependency::HIDE, $publishforpages, new FormEngine\Conditions\Not(new FormEngine\Conditions\Equals('1')))
			)
		)));
		
		$Data = Event::dispatch($this, 'admin.sitemaps.initForm', Array(
			'form' => $form,
			'id' => (int) $this->registry->core->getParam(),
			'data' => $this->populateData
		));
		
		if (! empty($Data)){
			$form->Populate($Data);
		}
		
		$form->AddFilter(new FormEngine\Filters\NoCode());
		$form->AddFilter(new FormEngine\Filters\Trim());
		$form->AddFilter(new FormEngine\Filters\Secure());
		
		return $form;
	}

}