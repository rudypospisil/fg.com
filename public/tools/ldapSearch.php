<?php
  session_start();
  if($_SESSION['allowLdapSearch'] == true)
  {
    echo('<form method=post action="ldapSearch.php">' . "\n");
      echo('<label for=username>Enter SAM Account Name to search:</label><br>' . "\n");
      echo('<input type=text name=username />' . "\n");
      echo('<input type=submit />' . "\n");
    echo('</form>' . "\n");

    // Execute upon using hitting the submit button.
    if($_POST)
    {
      // For Debugging purposes.
  
      // Using my info to authenticate.
      $username = 'rpospisil@fgoldman.com';
      $password = 'Goldman1';
      
      // FG LDAP server.
      $ldapServer='fgidc2.fgoldman.com';
  
      // Set the base DN.
      $baseDn = "DC=fgoldman,DC=com";
            
      // Connect to LDAP server. Returns LDAP link identifier.  
      if($ldapConn = ldap_connect($ldapServer))
      {
        echo('Connection successful.<br>');
      }
      else
      {
        echo("Connection unsuccessful.<br>");
      }
            
      // These options MUST be set, otherwise search will fail.
      ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
      ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);
  
      // Bind.
      if(ldap_bind($ldapConn, $username, $password))
      {
        echo('Bind successful.<br>');
      }
      else
      {
        echo("Bind unsuccessful.<br>");
      }
  
      // User input.
      $filter = '(samaccountname=' . $_POST['username'] . ')';
  
      // Hard coded. Change this to whomever's info you are searching for.
      // Search by SAM Account Name (SAN).
      //$who = 'otrs';
      //$who = 'rpospisil';
      //$who = 'sschwartzberg';
      //$who = 'ttanner';
      //$who = 'cmichelle';
      //$who = 'jhelfgott';
      //$filter = '(samaccountname=' . $who . ')';
      // or...
      // Search by Common Name (CN).
      //$who = 'OTRS Search';
      //$who = 'Rudy Pospisil';
      //$who = 'Steven Schwartzberg';
      //$who = 'Thomas Tanner';
      //$who = 'Charly Michelle';
      //$filter = '(cn=' . $who . ')';
  
      echo("Searching for: " . $filter . "<br>");
  
      // Perform search on the authenticated user.
      $result = ldap_search($ldapConn, $baseDn, $filter);
      echo("Searching...<br>");
   
      // Get the entry of said user.
      $entry = ldap_get_entries($ldapConn, $result);
      if(count($entry) != 1) // A return of 1 indicates an empty array.
      {
        echo("Echoing complete entry.<br>");
        echo('<pre>');
          print_r($entry);
        echo('</pre>');
      }
      else
      {
        echo("No entry found.<br>");
      }
      
      // Return as utf-8. 
      // Need to walk through the array for this to work.
      //$entry = utf8_encode($entry);
      
      
      ldap_unbind($ldapConn);
      ldap_close($ldapConn);

    }
  }
  else
  {
    echo('ACCESS DENIED');
  }