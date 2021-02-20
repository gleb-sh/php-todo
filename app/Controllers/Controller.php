<?php

namespace App\Controllers;

class Controller
{

    public $answer = [
        'status' => 0,
        'mess' => null,
        'error' => null,
        'data' => [],
    ];

    public function answerJson() {

        if ($this->answer['status'] == 1) {
            unset($this->answer['error']);
        } else {
            //unset($this->answer['data']);
            if ($this->answer['mess'] == null) {
                $this->answer['mess'] = 'Неизвестная ошибка';
            }
        }

        echo json_encode($this->answer);

    }

}