<?php
      vx;
      exit;
      //$searchString = mb_strtoupper(Input::get('term'));

      $searchString = mb_strtoupper($_GET['term']);
      echo('<script>console.log('. $searchString . ')</script>');

      $table = 'nav';
      $sort = 'item_no';
      
      $searchedItemList = DB::table($table)->order_by($sort, 'asc')->where('item_no', 'LIKE', 'DMIR')->get();
      /*
      
      $searchedItemListJSON = json_encode($searchedItemList);
      
      echo($searchedItemListJSON);
      */