<?php

namespace app\models;

use yii\base\Model;

class Test extends Model
{
    public $column;
    public $row;
    public $text;
    
    public function rules()
    {
        return [
            ['column', 'required', 'message' => 'Выберите количество столбцов'],
            ['row', 'required', 'message' => 'Выберите количество рядов'],
            [['column', 'row', 'text'], 'required'],
            [['column'], 'number','tooBig' => 'Количество столбцов не должно быть выше 40','max'=>400, ],
            [['row'], 'number','tooBig' => 'Количество рядов не должно быть выше 40','max'=>400, ],
        ];
    }
    public function getTable()
    {
        $array = $this->getArray();
        $result = $this->getResultTable($array);
        return $result;
    }
    public function getArray(){
        $row_start = 1;
        $col_start = 1;
        $row_end = $this->row;
        $col_end = $this->column;
        $index = 0;
        $summ = $this->getText();
        $arr = [];
        while($row_start <= $row_end && $col_start <= $col_end){
            for($i = $col_start; $i <= $col_end; $i++){
                $arr[$row_start][$i] = iconv_substr($summ , $index , 1 , 'UTF-8' ).' &#8594';
                $index++;
            }
            $row_start++;
            for($i = $row_start; $i <= $row_end; $i++ ){
                $arr[$i][$col_end] = iconv_substr($summ , $index , 1 , 'UTF-8' ).' &#8595';
                $index++;
            }
            $col_end--;
            if($row_start <= $row_end){
                for($i = $col_end; $i >= $col_start; $i--){
                    $arr[$row_end][$i] = iconv_substr($summ , $index , 1 , 'UTF-8' ).' &#8592';
                    $index++;
                }
                $row_end--;
            }
            if($col_start <= $col_end){
                for($i = $row_end; $i >= $row_start; $i--){
                    $arr[$i][$col_start] = iconv_substr($summ , $index , 1 , 'UTF-8' ).' &#8593';
                    $index++;
                }
                $col_start++;
            }
        }
        return $arr;
    }
    public function getText(){
        $text = $this->text;
        $total = $this->row * $this->column;
        $text = str_replace(' ', '', $text);
        $letters = iconv_strlen($text,'UTF-8');
        $summ = $text;
        while($total >= $letters){
            $summ .= $text;
            $letters = iconv_strlen($summ,'UTF-8');
        }
        return $summ;
    }
    public function getResultTable($array)
    {
        $table = '';
        $table .= '<table class="table">';
        $table .= '<thead>';
        $table .= '<tr>';
        for($i = 0; $i <= $this->column; $i++){
            if($i == 0){
                $table .= '<th class="bg-danger"></th>';
            } else {
                $table .= '<th class="bg-danger">'.$i.'</th>';
            }
        }
        $table .= '</tr>';
        $table .= '</thead>';
        $table .= '<tbody>';
        for($i = 1; $i <= $this->row; $i++){
            $table .= '<tr>';
            for($j = 0; $j <= $this->column; $j++){
                if($j == 0){
                    $table .= '<td class="bg-danger">'. $i .'</td>';
                } else {
                    $table .= '<td>'.$array[$i][$j].'</td>';
                }
            }
            $table .= '<tr>';
        }
        $table .= '</tbody>';
        $table .= '</table>';
        return $table;
    }
}