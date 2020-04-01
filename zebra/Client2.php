
<?php

/*

* File Allows printing from web interface, simply connects to the Zebra Printer and then pumps data

* into it which gets printed out.

*/


$print_data = 'prova';


// Open a telnet connection to the printer, then push all the data into it.


$print_data = str_replace('^XA^','^XA^^LT10^LS-5',$print_data); //this corrects the label top and label side properties to align the label correctly

try

{

    $fp=pfsockopen("192.168.4.103/ZDesigner TLP 2844",9100);

    fputs($fp,$print_data);

    fclose($fp);


    echo 'Successfully Printed';

}

catch (Exception $e)

{

echo 'Print Failed.';

}
