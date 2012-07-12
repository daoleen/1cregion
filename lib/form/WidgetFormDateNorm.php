<?php

/**
 * Исправлена "ошибка" рендеринга пустых значений
 */

class WidgetFormDateNorm extends sfWidgetFormDate {
  /**
   * Renders the widget.
   *
   * @param  string $name        The element name
   * @param  string $value       The date displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    // convert value to an array
    $default = array('year' => null, 'month' => null, 'day' => null);
    if (is_array($value))
    {
      $value = array_merge($default, $value);
    }
    else
    {
      $value = (string) $value == (string) (integer) $value ? (integer) $value : strtotime($value);
      if (false === $value)
      {
        $value = $default;
      }
      else
      {
        $value = array('year' => date('Y', $value), 'month' => date('n', $value), 'day' => date('j', $value));
      }
    }

    $date = array();
    $emptyValues = $this->getOption('empty_values');

    $date['%day%'] = $this->renderDayWidget($name.'[day]', $value['day'], array('choices' => $this->getOption('can_be_empty') ? array($emptyValues['day'] => $emptyValues['day']) + $this->getOption('days') : $this->getOption('days'), 'id_format' => $this->getOption('id_format')), array_merge($this->attributes, $attributes));
    $date['%month%'] = $this->renderMonthWidget($name.'[month]', $value['month'], array('choices' => $this->getOption('can_be_empty') ? array($emptyValues['month'] => $emptyValues['month']) + $this->getOption('months') : $this->getOption('months'), 'id_format' => $this->getOption('id_format')), array_merge($this->attributes, $attributes));
    $date['%year%'] = $this->renderYearWidget($name.'[year]', $value['year'], array('choices' => $this->getOption('can_be_empty') ? array($emptyValues['year'] => $emptyValues['year']) + $this->getOption('years') : $this->getOption('years'), 'id_format' => $this->getOption('id_format')), array_merge($this->attributes, $attributes));

    return strtr($this->getOption('format'), $date);
  }
}
?>
