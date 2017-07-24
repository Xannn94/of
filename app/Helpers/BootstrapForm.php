<?php
namespace App\Helpers;

use Watson\BootstrapForm\BootstrapForm as BootstrapFormParent;

class BootstrapForm extends BootstrapFormParent{
    public function checkbox($name, $label = null, $value = 1, $checked = null, array $options = [])
    {
        $inputElement   = $this->checkboxElement($name, $label, $value, $checked, false, $options);
        $wrapperOptions = $this->isHorizontal() ?
            [
                'class' => implode(
                    ' ',
                    [
                        $this->getLeftColumnOffsetClass(),
                        $this->getRightColumnClass()
                    ]
                )
            ] :
            [];

        $wrapperElement = '<div' .
            $this->html->attributes($wrapperOptions) .
            '>' .
            $inputElement .
            $this->getFieldError($name) .
            $this->getHelpText($name, $options) .
            '</div>';

        return $this->getFormGroup($name, $label, $wrapperElement);
    }

    public function checkboxElement($name, $label = null, $value = 1, $checked = null, $inline = false, array $options = [])
    {
        $label          = $label === false ? null : $this->getLabelTitle($label, $name);
        $labelOptions   = $inline ? ['class' => 'checkbox-inline'] : ['class' => 'control-label'];
        $inputElement   = $this->form->checkbox($name, $value, $checked, $options+['id'=>$name]);
        $labelElement   = '<label ' . $this->html->attributes($labelOptions) . '>' . $label . '</label>';

        return  '<div class="checkbox">' . $inputElement . '</div>';
    }
}

