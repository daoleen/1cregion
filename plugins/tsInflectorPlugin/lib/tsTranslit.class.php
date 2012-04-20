<?php
/**
 * Класс для транслитерации
 *
 * @author Aliaksei Shytkin <e79eas@gmail.com>
 * @version $Id$
 * @package Util
 */
class tsTranslit
{
  /**
   * Русские буквы
   *
   * @var array
   */
  static $ru = array(
  #
        'А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е', 'Ё', 'ё', 'Ж', 'ж', 'З', 'з',
  #
        'И', 'и', 'Й', 'й', 'К', 'к', 'Л', 'л', 'М', 'м', 'Н', 'н', 'О', 'о', 'П', 'п', 'Р', 'р',
  #
        'С', 'с', 'Т', 'т', 'У', 'у', 'Ф', 'ф', 'Х', 'х', 'Ц', 'ц', 'Ч', 'ч', 'Ш', 'ш', 'Щ', 'щ',
  #
        'Ъ', 'ъ', 'Ы', 'ы', 'Ь', 'ь', 'Э', 'э', 'Ю', 'ю', 'Я', 'я'
  #
  );
  #


  /**
   * Соответствующие англиские
   *
   * @var array
   */
  static $en = array(
  #
        'A', 'a', 'B', 'b', 'V', 'v', 'G', 'g', 'D', 'd', 'E', 'e', 'E', 'e', 'Zh', 'zh', 'Z', 'z',
  #
        'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'R', 'r',
  #
        'S', 's', 'T', 't', 'U', 'u', 'F', 'f', 'H', 'h', 'C', 'c', 'Ch', 'ch', 'Sh', 'sh', 'Sch', 'sch',
  #
        '\'', '\'', 'Y', 'y',  '\'', '\'', 'E', 'e', 'Ju', 'ju', 'Ja', 'ja'
  #
  );
  #
  /**
  * Конвертим из русского в английский
  *
  * @param string $string Строка в русской раскладке
  * @return string Строка
  */
  static public function convert($string)
  {
    $string = str_replace(self::$ru, self::$en, $string);
    return $string;
  }
}
