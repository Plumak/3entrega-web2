<?php
    class ApiView {
        public function response($body, $status = 200) {
            header('Content-type: application/json');
            header('HTTP/1.1 '.$status." ".$this->_requestStatus($status));
            echo json_encode($body);
        }

        private function _requestStatus($code) {
            $status = array(
                200 => "OK",
                201 => "Created",
                400 => "Bad Request",
                404 => "Not found",
                500 => "Internal server error",
            );
            return (isset($status[$code])) ? $status[$code] : $status[500];
        }
    }
?>