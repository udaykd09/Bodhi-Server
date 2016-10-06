<?php 
  function moisture_level($moisture_value) {
    if ($moisture_value < 180) {
      return "low";
    } else if ($moisture_value < 250) {
      return "medium";
    } else {
      return "high";
    }
    return "high";
  }
?>
