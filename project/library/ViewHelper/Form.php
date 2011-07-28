<?php

class ViewHelper_Form 
{

    private $_object;

    protected $_dontRenderFields = array();
    protected $_labels = array();

    public function setObject(MappableObject $object)
    {
    	$this->_object = $object;
	return $this;
    }

    private function _getLabel($field)
    {
    	return $this->_labels[$field];
    }

    private function _getInput($field, $value)
    {
	$type = isset($this->_types[$field]) ? $this->_types[$field] : 'text';
    	switch ($type) {
	    case 'textarea':
		return '<textarea name="' . $field . '" value="" rows="15" cols="80" />' . htmlspecialchars($value) . '</textarea>';

	    case 'text':
	    default:
		return '<input name="' . $field . '" type="text" value="' . htmlspecialchars($value) . '"/>';

	}
    }

    public function render()
    {

	$ret = <<<HTML
	    <form action="" method="POST">
		<table>
HTML;

	foreach ($this->_object->getMappableData() as $field => $value) {
	    if (in_array($field, $this->_dontRenderFields)) continue;
	    $ret .= <<<HTML
		<tr>
		    <td><label for="$field">{$this->_getLabel($field)}:</label></td>
		    <td>{$this->_getInput($field, $value)}</td>
HTML;
	}

	$ret .= <<<HTML
		</table>
		<p><input type="submit" name="save" value="Save" /></p>
	    </form>
HTML;

	return $ret;
    }

}

