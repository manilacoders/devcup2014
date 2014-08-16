<?php

class Exporter
{
  const CSV_DEFAULT_DELIMITER = ",";
  const CSV_TAB_DELIMITER = "\t";

  private $data;
  private $delimiter = self::CSV_DEFAULT_DELIMITER;

  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  public function setDelimiter($delimiter)
  {
    $this->delimiter = $delimiter;
    return $this;
  }

  public function parseCsv($include_label = true)
  {
    $file = sfConfig::get('sf_upload_dir') . "/tmp.csv";
    $fp = fopen($file, 'w');

    /**
     * Create a label
     */
    if ($include_label) {

      $has_label = false;
      $label = array();

      foreach ($this->data as $fields) {
        if ($has_label == false) {
          foreach ($fields as $index => $field) {
            $label[] = $index;
          }
          fputcsv($fp, $label, $this->delimiter);
        }
        break;
      }
    }

    /**
     * Create the content
     */
    foreach ($this->data as $index => $fields) {

      $_content = array();
      foreach ($fields as $index => $field) {
        $_content[] = $field;
      }
      fputcsv($fp, $_content, $this->delimiter);
    }

    fclose($fp);

    return file_get_contents($file);
  }

  public function download($file_name)
  {
  }
}