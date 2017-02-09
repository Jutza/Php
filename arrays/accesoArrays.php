<?php
//Este funciona

$shop = array( array( 'Title' => "rose",
                      'Price' => 1.25,
                      'Number' => 15
                    ),
               array( 'Title' => "daisy",
                      'Price' => 0.75,
                      'Number' => 25
                    ),
               array( 'Title' => "orchid",
                      'Price' => 1.15,
                      'Number' => 7
                    )
             );
$Otro = array_column($shop, 'Title');
$Nuevo = array_values($Otro)[0];
print_r($Nuevo);

?>
