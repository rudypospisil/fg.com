<?php
    /* set out document type to text/javascript instead of text/html */
    header("Content-type: text/javascript");
    
    $result = DB::table('open_requests')
                          ->group_by('status')
                          ->get();
    
    $i = 0;
    foreach($result as $item)
    {
      $filterList[$i] = $item;
      $i++;
    }
    
    echo json_encode($filterList);