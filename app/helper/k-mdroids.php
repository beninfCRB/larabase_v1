<?php

trait math
{
    public function distance($data, $kluster)
    {
        $temp = [];
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                $temp[$i][$j] += sqrt($data[$i][$j] - $kluster[$i][$j]);
            }
        }
        return $temp;
    }

    public function familarity($data)
    {
        $temp = [];
        for ($i = 0; $i < count($data); $i++) {
            $temp[$i] = $temp[$i - 1] - $data[$i + 1];
        }
        return $temp;
    }
}
