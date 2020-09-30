
<?php
                            function add_months($months, DateTime $dateObject) 
                            {
                                $next = new DateTime($dateObject->format('Y-m-d'));
                                $next->modify('last day of +'.$months.' month');

                                if($dateObject->format('d') > $next->format('d')) {
                                    return $dateObject->diff($next);
                                } else {
                                    return new DateInterval('P'.$months.'M');
                                }
                            }

                            function endCycle($d1, $months)
                            {
                                $date = new DateTime($d1);

                                // call second function to add the months
                                $newDate = $date->add(add_months($months, $date));

                                // goes back 1 day from date, remove if you want same day of month
                                $newDate->sub(new DateInterval('P1D')); 

                                //formats final date to Y-m-d form
                                $dateReturned = $newDate->format('Y-m-d'); 

                                return $dateReturned;
                            }
                             $date = date('Y-m-d', strtotime($show->created_at));
                            $startDate = $date; // select date in Y-m-d format
                            $nMonths = 1; // choose how many months you want to move ahead
                            $final = endCycle($startDate, $nMonths); // output: 2014-07-02
                            
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body onload="window.print()">
  <div class="invoice-box" style="max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, .15);font-size: 16px;line-height: 24px;font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;color: #555;">
        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
            <tr class="top">
                <td colspan="2" style="padding: 5px;vertical-align: top;">
                    <table style="width: 100%;line-height: inherit;text-align: left;">
                        <tr>
                            <td class="title" style="padding: 5px;vertical-align: top;padding-bottom: 20px;font-size: 45px;line-height: 45px;color: #333;">
                                <img src="{{asset('/images/smlog.png')}}" style="width:14%;">
                            </td>
                            
                            <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px;">
                                Invoice #: {{$show->id}}<br>
                                Created: {{date('Y-m-d', strtotime($show->created_at))}}<br>
                                Due: {{$final}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2" style="padding: 5px;vertical-align: top;">
                    <table style="width: 100%;line-height: inherit;text-align: left;">
                        <tr>
                            <td style="padding: 5px;vertical-align: top;padding-bottom: 40px;">
                                <strong>Client Information:</strong><br>
                                Address:<br>
                               NE:680 6th Road near dubai Islamic bank <br>
                               Rahmanabad, Rawalpindi
                            </td>
                            
                            <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 40px;">
                            <strong>Name:</strong>&nbsp{{$show->show_name}}.<br>
                            <strong>User ID:</strong>&nbsp123123<br>
                            <strong>Main IP:</strong>&nbsp23<br>
                            <strong>Mobile Number:</strong>&nbsp0302-0021212<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Payment Method
                </td>
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Connection Type
                </td>
                <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Amount 
                </td>
            </tr>
            
            <tr class="details">
                <td style="padding: 5px;vertical-align: top;padding-bottom: 20px;">
                    Cash
                </td>
                <td style="padding: 5px;vertical-align: top;padding-bottom: 20px;">
                    2MB
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px;">
                    1500
                </td>
            </tr>
            
            <tr class="heading">
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Connection
                </td>
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    1MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  1000.00
                </td>
            </tr>
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    2MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  1500.00
                </td>
            </tr>
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    3MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  2500.00
                </td>
            </tr>
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    4MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                   
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  3000.00
                </td>
            </tr>
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    5MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  4500.00
                </td>
            </tr>
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    6MB
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    
                </td>
                
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                  5000.00
                </td>
            </tr>
            
           
            
           
            
            <!-- <tr class="total">
                <td style="padding: 5px;vertical-align: top;"></td>
                <td style="padding: 5px;vertical-align: top;"></td>
                <td style="padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold;">
                   Total: $385.00
                </td>
            </tr> -->
        </table>
    </div>
    <script></script>
  </body>
</html>