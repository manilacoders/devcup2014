<?php 

class Report
{
  private $data;

  public function setData($data)
  {
    $this->data = $data;
  }

  public function arrangeData($template)
  {
    $trimmed_data = array();

    $index = 0;
    foreach ($template as $key => $value) {
      
      if (is_numeric($key)) {
        $key = $value;
      }

      foreach($this->data as $r_key => $data) {

        /**
         * If multiple dot is used, then it's an array with multiple dimensions, we need to loop each array
         */
        $x_key = explode('.', $key);
        if (count($x_key) >= 2) {

          for ($i = 0; $i < count($x_key); $i++) {
            $data = $data[$x_key[$i]];

            if ( $i == (count($x_key)-1) ) {
              $tmp_val = isset($data) ? $data : 'NULL';
              $trimmed_data[$index][$value] = $tmp_val;
            }
          }
        } 

        /**
         * If the key doesn't have a dot, then it's on the first dimension of the array
         */
        else {
          $tmp_val = isset($data[$key]) ? $data[$key] : 'NULL';
          $trimmed_data[$index][$value] = $tmp_val;
        }

        $index++;
      }

      $index = 0;
    }

    // exit;
    return $trimmed_data;
  }
}