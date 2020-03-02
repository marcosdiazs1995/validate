<?php
namespace App\Validators;

use Carbon\Carbon;
use DateTime;

class MinorDateThat
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        if(count($parameters) === 0)
            throw new \Exception('Parameter name note reported');

        $param = $parameters[0];
        $format = $parameters[1];
        $data = $validator->getData();

        $minorDate = $this->parseDateTime($value,$format);
        $greaterDate = $this->parseDateTime($this->getParamValue($data,$param),$format);
        $bol = $this->isLessthanOrEqualTo($minorDate,$greaterDate);
        // var_dump($bol);
        // exit();
        // $this->isDateTimeInstance($minorDate) &&
        // $this->isDateTimeInstance($greaterDate) &&
        return $this->isLessThanOrEqualTo($minorDate, $greaterDate);

    }

    // retorna uma instancia de DateTime
    protected function isDateTimeInstance($datetime)
    {
        return $datetime instanceof DateTime;
    }
    // verifica as datas
    protected function isLessthanOrEqualTo($dateTime1,$dateTime2)
    {
        return $dateTime1 <= $dateTime2;
    }
    // Retorna uma instancia formatada
    protected function parseDateTime($value,$format = 'Y-m-d H:m:s')
    {
        return date($format,strtotime($value));
    }

    protected function getParamValue($data, $param)
    {
        if(in_array($param, array_keys($data)))
            return $data[$param];
        throw new \Exception('Not informed value');
    }

    // public function message()
    // {
    //     return [
    //         'DataInicial' => ':attribute precisa ser menor que a data final'
    //     ];
    // }
}
