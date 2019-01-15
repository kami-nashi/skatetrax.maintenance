<?php

function maintenance_data(){
        $m_hours = 0;
        $m_cost = 0;
        $sql = 'select * from maintenance';
        $result = db_stuff($sql);

        while ($row = mysql_fetch_assoc($result)) {
                $m_hours += $row['m_hours_on'];
                $m_cost += $row['m_cost'];
         }

        $ice_time_total = add_ICETIME();
        $m_on = $ice_time_total[1] - $m_hours;
        $m_remaining = 21 - $m_on;
        return array($m_hours, $m_cost, $m_on, $m_remaining);
}

###
# build maintenance data and print the rows
###
function maintenance_json(){
        $sql = 'select * from maintenance, locations where maintenance.m_location = locations.id order by m_date desc';
        $result = db_stuff($sql);

        while ($row = mysql_fetch_assoc($result)) {
          if (isset($_GET['ice_time']))
          {       $total_ice += $_GET['ice_time'];      }
          if (isset($_GET['ice_cost']))
          {       $ice_cost += $_GET['ice_cost'];         }
    echo "<tr><td>" . $row['m_date'] . "</td><td>" . $row['m_hours_on'] . "</td><td>$" . $row['m_cost'] . "</td><td>" . $row['location_id'] . "</td><td>" . $row['location_city'] . "</td><td>" . $row['location_state'] . "</td></tr>";
          }
}


?>
