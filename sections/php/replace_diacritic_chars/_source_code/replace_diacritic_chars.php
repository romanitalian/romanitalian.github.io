<?php
class Singleton
{
    protected static $instance;
    
    public static function getInstance(){
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}

/**
 * Заменяет диакретические знаки
 * how to use: $dia = Diacritic::getInstance(); $dia->translate('ёлка');
 */
class Diacritic extends Singleton
{
  public $dict;
  
  protected function __construct(){
    $this->init();
  }
  protected function init() {
    $this->dict = [
      'ё' => 'ио',
      'Ё' => 'Ио',
      'й' => 'и',
      'Й' => 'И',
      ];
  }
  public function translate($str) {
    $out = str_replace(array_keys($this->dict), $this->dict, $str);
    return $out;
  }
}

$words = [
'актёр',
'бёдра',
'берёза',
'бурёнка',
'варёный',
'вёдро',
'всё',
'вёрткий',
'вёсны',
'вёсла',
'взлёт',
'влёт',
'вразлёт',
'подённый',
'подъём',
'позёмка',
'полёт',
'полётный',
'приём',
'приёмка',
'свёкор',
'сгущёнка',
'сгущёный',
'сёгун',
'сёдла',
'сёмга',
'съёмка',
'таёжный',
'телёнок',
'тёмный',
'трёхъярусный',
'трёхколёсный',
'трёхзвёздочный',
'утёс',
'шофёр',
'четвёртый',
'чёлка',
'чёрствый',
'чёрт',
'чёрточка',


'йота',
'йотация',
'йод',
'йогурт',
'йети',
'йеменцы',
'йельский',
'йог',
  ];

$Diacritic = Diacritic::getInstance();
$out = [];
foreach($words as $w) {
  $out[$w] = $Diacritic->translate($w); 
}
var_dump($out);