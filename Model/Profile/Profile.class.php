<?php

/**
  * Class for managing profiles
  *
  */
class Profile
{
	public $profileMetadata;
	
	/**
	  * Build profile metadata
	  * 
	  * @param String $profile_name
	  * 
	  */
	function __construct($profile_name)
	{
		global $applicationId;
		
		include 'Uranus/Application/' . $applicationId . '/Model/Profiles/' . strtolower($profile_name) . '.php';
		
		$this->profileMetadata = $profiles[$profile_name];
	}
	
	/**
	  * Get data from database and update profile metadata
	  * 
	  * @param String $record_id
	  * 
	  */
	public function getData($record_id)
	{
		global $database;
		
		$sql = "SELECT * FROM {$this->profileMetadata['PROFILE_NAME']} ";
		
		if (isset($this->profileMetadata['TABLE_JOINS']))
		{
			foreach ($this->profileMetadata['TABLE_JOINS'] as $tableJoin)
			{
				$sql .= " $tableJoin ";
			}
		}
		
		$sql .= "WHERE {$this->profileMetadata['PRIMARY_KEY']} = '$record_id'";
		
		$res = $database->query($sql);

		$row = $database->fetchRow($res);
	
		if ($row)
		{
			foreach ($this->profileMetadata['DISPLAY_FIELDS'] as $fieldName => $fieldData)
			{
				$this->profileMetadata['DISPLAY_FIELDS'][$fieldName]['VALUE'] = $row[$fieldName];
			}
		}
		else
		{
			return false;
		}
	}
	
	/**
	  * Save data to database
	  * 
	  * @param Array $postData
	  * @return String recordId of data just  inserted
	  * 
	  */
	public function saveData($postData, $mode = true)
	{
		global $database;
		
		$queryArray = Array();
		$counter = 0;
		
		foreach ($postData as $parameter => $value)
		{
			$queryArray['FIELDS'][$counter] = $parameter;
			
			$queryArray['VALUES'][$parameter] = "'". addslashes($value) ."'";

			$counter++;
		}
		
		if ( !isset($postData[$this->profileMetadata['PRIMARY_KEY']]) )
		{
			$sql = "INSERT INTO {$this->profileMetadata['PROFILE_NAME']} (" . implode(", ", $queryArray['FIELDS']) . ") VALUES (" . implode(", ", $queryArray['VALUES']) . ")";
									
			$res = $database->query($sql);
			
			$record_id = $database->getLastId();
			
			if ($mode)
			{
				$this->getData($record_id);
			}
			else
			{
				return $record_id;
			}			
		}
		else
		{
			$sql = "UPDATE {$this->profileMetadata['PROFILE_NAME']} SET ";
			
			foreach ($queryArray['FIELDS'] as $parameter)
			{
				$sql .= "$parameter = " . $queryArray['VALUES'][$parameter] . ", ";
			}
			
			$sql = substr($sql, 0, strlen($sql) - 2);
			
			$sql .= " WHERE {$this->profileMetadata['PRIMARY_KEY']} = '". $postData[$this->profileMetadata['PRIMARY_KEY']] . "'";
			
			$res = $database->query($sql);
			
			$this->getData($inputData[$this->profileMetadata['PRIMARY_KEY']]);
		}
	}

	/**
	  * Parse profile metadata
	  * 
	  * @param Object $template
	  * 
	  */
	public function parse($template)
	{
		global $database;

		if (isset($this->profileMetadata['PROFILE_NAME']))
		{
			$template->parse("PROFILE_NAME", $this->profileMetadata['PROFILE_NAME']);
		}
		
		if (isset($this->profileMetadata['FORMS']))
		{
			foreach ($this->profileMetadata['FORMS'] as $formName => $formValue)
			{
				$template->parse($formName, $formValue['ACTION']);
				
			}
		}
		
		if (isset($this->profileMetadata['CANCEL_ACTION']))
		{
			$template->parse("CANCEL_ACTION", $this->profileMetadata['CANCEL_ACTION']);
		}
		
		if (isset($this->profileMetadata['CSS_INCLUDES']))
		{
			foreach ($this->profileMetadata['CSS_INCLUDES'] as $includeItem)
			{
				$template->parse("CSS_INCLUDES", "$includeItem\n", "w+"); 
			}
		}
		
		if (isset($this->profileMetadata['JS_INCLUDES']))
		{
			foreach ($this->profileMetadata['JS_INCLUDES'] as $includeItem)
			{
				$template->parse("JS_INCLUDES", "$includeItem\n", "w+"); 
			}
		}
		
		if (isset($this->profileMetadata['LOCALIZED_LABELS']))
		{
			foreach ($this->profileMetadata['LOCALIZED_LABELS'] as $label)
			{
				$template->parse($label, Locale::get($label));
			}
		}
		
		if (isset($this->profileMetadata['DISPLAY_FIELDS']))
		{
			foreach ($this->profileMetadata['DISPLAY_FIELDS'] as $fieldName => $fieldData)
			{
				switch ($fieldData['TYPE'])
				{
					case "TEXT":
						$parseField = new InputElement($fieldName);
						$parseField->type = "text";
						
						if (!empty($fieldData['VALUE'])) 
						{
							$parseField->value = $fieldData['VALUE'];
						}
					break;
					
					case "PASSWORD":
						$parseField = new InputElement($fieldName);
						$parseField->type = "password";
						
						if (!empty($fieldData['VALUE'])) 
						{
							$parseField->value = $fieldData['VALUE'];
						}
					break;
					
					case "HIDDEN":
						if (!empty($fieldData['ID'])) 
						{
							$parseField = new InputElement($fieldName, $fieldData['ID']);
							$parseField->type = "hidden";
						}
						else
						{
							$parseField = new InputElement($fieldName);
							$parseField->type = "hidden";
						}
						
						if (!empty($fieldData['VALUE'])) 
						{
							$parseField->value = $fieldData['VALUE'];
						}						
					break;
					
					case "OPTION":
						
						$parseField = new OptionElement($fieldName);
						$parseField->type = "radio";
						if( isset($fieldData['NEWLINE']) )
						{
							$parseField->newLine = $fieldData['NEWLINE'];
						}
						
						foreach ($fieldData['DATA'] as $id => $data)
						{						

							if( isset($data['CHECKED']) )
							{
								if( $data['CHECKED'] == true )
								{
									$checked = $data['CHECKED'];
								}
							}
							else
							{
								$checked = false;
							}

							$parseField->addElement($id, $data['VALUE'], $data['TEXT'], $checked);
						}
					break;
					
					case "CHECKBOX":
						$parseField = new OptionElement($fieldName);
						$parseField->type = "checkbox";
					break;
					
					case "DROPDOWN":
						$dropDownOptions = Array();
						$tmpDropDownTxt = Array();
						
						$sql = "SELECT {$fieldData['DROPDOWN_PRIMARY_KEY']}, {$fieldData['DROPDOWN_TEXT']} FROM {$fieldData['DROPDOWN_TABLE']} ";
						
						if (isset($fieldData['DROPDOWN_WHERE']))
						{
							if (count($fieldData['DROPDOWN_WHERE']) > 0)
							{
								$sql .= " WHERE (";
								foreach ($fieldData['DROPDOWN_WHERE'] as $whereClause)
								{
									$sql .= "($whereClause) AND ";
								}
								$sql = substr($sql, 0, strlen($sql) - 5);
								$sql .= ") ";
							}
						}
						
						$sql .= " ORDER BY {$fieldData['DROPDOWN_TEXT']}";
						
						$res = $database->query($sql);
						
						while ($row = $database->fetchRow($res))
						{
							$dropDownOptions[$row[$fieldData['DROPDOWN_PRIMARY_KEY']]] = $row[$fieldData['DROPDOWN_TEXT']];
						}
						
						$parseField = new ListElement($fieldName);
						
						foreach ($dropDownOptions as $id => $text)
						{
							$parseField->addElement($id, $text);
						}
					break;
					
					case "TEXTAREA":
						$parseField = new Textarea($fieldName);
						$parseField->type = "textarea";
						
						if (!empty($fieldData['VALUE'])) 
						{
							$parseField->value = $fieldData['VALUE'];
						}
					break;
					
				}
				
				if (!empty($fieldData['ID'])) 
				{
					$template->parse($fieldData['ID'], $parseField->render());
				}
				else
				{
					$template->parse($fieldName, $parseField->render());
				}
			}
		}
		
		if (isset($this->profileMetadata['DISPLAY_BUTTONS']))
		{
			foreach ($this->profileMetadata['DISPLAY_BUTTONS'] as $buttonName => $buttonData)
			{
				switch ($buttonData['TYPE'])
				{
					case 'SUBMIT':
						$parseButton = new Button($buttonName);
						$parseButton->type = "submit";
					break;
					
					case 'BUTTON':
						$parseButton = new Button($buttonName);
						$parseButton->type = "button";
					break;
					
					case 'RESET':
						$parseButton = new Button($buttonName);
						$parseButton->type = "reset";
					break;
				}
				
				if (!empty($buttonData['VALUE'])) 
				{
					$parseButton->value = $buttonData['VALUE'];
				}
				
				if (!empty($buttonData['CLASS'])) 
				{
					$parseButton->className = $buttonData['CLASS'];
				}
				
				if (!empty($buttonData['ACTION'])) 
				{
					$template->parse($buttonName . '_ACTION', $buttonData['ACTION']);
				}
				
				
				
		
				$template->parse($buttonName, $parseButton->render());
			}
		}
	}
	
}

?>